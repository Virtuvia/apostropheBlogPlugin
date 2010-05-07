<?php

/**
 * aBlogPlugin configuration.
 * 
 * @package     apostropheBlogPlugin
 * @subpackage  config
 * @author      Your name here
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class apostropheBlogPluginConfiguration extends sfPluginConfiguration
{

  static $registered = false;
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    // Yes, this can get called twice. This is Fabien's workaround:
    // http://trac.symfony-project.org/ticket/8026
    
    if (!self::$registered)
    {
      $this->dispatcher->connect('a.getGlobalButtons', array('apostropheBlogPluginConfiguration', 
        'getGlobalButtons'));
      $this->dispatcher->connect('view.configure_format', array($this, 'configureFormat'));
      $this->dispatcher->connect('command.post_command', array('aBlogEvents',  'listenToCommandPostCommandEvent'));  
      self::$registered = true;
    }
  }

  public function configureFormat(sfEvent $event)
  {
    $params = $event->getParameters();
    $response = $params['response'];
    if(sfConfig::get('aBlog', true)) //TODO: Add Bundled layout config to app.yml
    {
      $response->addStylesheet('/apostropheBlogPlugin/css/aBlog.css');
      $response->addJavascript('/apostropheBlogPlugin/js/aBlog.js');
    }
  }
  
  static public function getGlobalButtons()
  {
    $user = sfContext::getInstance()->getUser();
 
    if ($user->hasCredential('blog_author') || $user->hasCredential('blog_admin'))
    {
      aTools::addGlobalButtons(array(
        new aGlobalButton('blog', 'Blog', '@a_blog_admin', 'a-blog-btn'),
        new aGlobalButton('events', '<span class="day"></span> Events', '@a_event_admin', 'a-events day-'.date('j'))
      ));
    }
  }
}
