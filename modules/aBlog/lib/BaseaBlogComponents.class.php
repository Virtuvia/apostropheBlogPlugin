<?php

/**
 * Base Components for the aBlogPlugin aBlog module.
 * 
 * @package     aBlogPlugin
 * @subpackage  aBlog
 * @author      Your name here
 * @version     SVN: $Id: BaseComponents.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BaseaBlogComponents extends sfComponents
{
  protected $modelClass = 'aBlogPost';
  
  public function executeSidebar()
  {
    if ($this->getRequestParameter('tag'))
    {
      $this->tag = TagTable::findOrCreateByTagname($this->getRequestParameter('tag'));
    }

    if(!count($this->categories) || $this->categories->isEmpty())
    {
      $this->categories = Doctrine::getTable('aBlogCategory')
        ->createQuery('c')
        ->addWhere('c.posts = ?', true)
        ->orderBy('c.name')
        ->execute();
    }
    
    $categoryIds = array();
    foreach($this->categories as $category)
    {
      $categoryIds[] = $category['id'];
    }

    $this->popular = Doctrine::getTable('aBlogCategory')->getTagsForCategories($categoryIds, 'aBlogPost', true, 10);
    $this->tags = Doctrine::getTable('aBlogCategory')->getTagsForCategories($categoryIds, 'aBlogPost');

    if($this->reset == true)
    {
      $this->params['cat'] = array();
      $this->params['tag'] = array();
    }
  }
  
}
