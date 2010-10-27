<?php
  // Compatible with sf_escaping_strategy: true
  $blogCategories = isset($blogCategories) ? $sf_data->getRaw('blogCategories') : null;
  $dateRange = isset($dateRange) ? $sf_data->getRaw('dateRange') : null;
  $pager = isset($pager) ? $sf_data->getRaw('pager') : null;
  $params = isset($params) ? $sf_data->getRaw('params') : null;
?>
<?php slot('body_class') ?>a-blog <?php echo $sf_params->get('module'); ?> <?php echo $sf_params->get('action') ?><?php end_slot() ?>

<?php slot('a-subnav') ?>
	<div class="a-subnav-wrapper blog">
		<div class="a-subnav-inner">
	    <?php include_component('aEvent', 'sidebar', array('params' => $params, 'dateRange' => $dateRange, 'categories' => $blogCategories, 'calendar' => $calendar, )) ?>
	  </div> 
	</div>
<?php end_slot() ?>

<div id="a-blog-main" class="a-blog-main">
  <?php if ($sf_params->get('year')): ?>
	<div class="a-blog-heading">
  	<h3><?php echo $sf_params->get('day') ?> <?php echo ($sf_params->get('month')) ? date('F', strtotime(date('Y').'-'.$sf_params->get('month').'-01')) : '' ?> <?php echo $sf_params->get('year') ?></h3>
	  <ul class="a-controls a-blog-browser-controls">
	    <li><?php echo link_to('<span class="icon"></span>'.a_('Previous'), 'aEvent/index?'.http_build_query($params['prev']), array('class' => 'a-arrow-btn icon a-arrow-left', )) ?></li>
	    <li><?php echo link_to('<span class="icon"></span>'.a_('Next'), 'aEvent/index?'.http_build_query($params['next']), array('class' => 'a-arrow-btn icon a-arrow-right', )) ?></li>
	  </ul>
	</div>
  <?php endif ?>

  <?php if (aBlogItemTable::userCanPost()): ?>
		<div class="a-ui">
		  <?php echo a_js_button(a_('New Event'), array('big', 'icon', 'a-add', 'a-blog-new-event-button'), 'a-blog-new-event-button') ?>
      <div class="a-options a-blog-admin-new-ajax dropshadow">
        <?php include_component('aEventAdmin', 'newEvent') ?>
      </div>
		</div>
  <?php endif ?>

  <?php foreach ($pager->getResults() as $a_event): ?>
  	<?php echo include_partial('aEvent/post', array('a_event' => $a_event, 'edit' => false, )) ?>
  	<hr />
  <?php endforeach ?>

    <?php if ($pager->haveToPaginate()): ?>
 		<?php echo include_partial('aPager/pager', array('pager' => $pager, 'pagerUrl' => url_for('aEvent/index?'. http_build_query($params['pagination'])))); ?>
  <?php endif ?>
</div>
  
<?php a_js_call('apostrophe.menuToggle(?)', array('button' => '.a-blog-new-event-button', 'classname' => 'a-options-open', 'overlay' => false)) ?>	
