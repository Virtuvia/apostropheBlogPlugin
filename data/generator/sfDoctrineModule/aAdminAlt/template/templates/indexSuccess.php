[?php use_helper('I18N', 'Date', 'jQuery') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]


<script type="text/javascript">
$(document).ready(function(){

  $("ul.topnav").click(function() {
		
    $(this).find("ul.subnav").slideDown('fast').show();

    $(this).parent().hover(function() {
    }, function(){
      $(this).parent().find("ul.subnav").slideUp('slow');
    });

  });
	
});	
</script>
<div id="a-admin-container" class="[?php echo $sf_params->get('module') ?]">

  [?php include_partial('<?php echo $this->getModuleName() ?>/list_bar', array('filters' => $filters, 'configuration' => $configuration)) ?]
  	
	<div id="a-admin-subnav" class="subnav">
		
		<ul class="a-controls a-admin-action-controls">
			<?php if ($this->configuration->hasFilterForm()): ?>
  			<li class="filters">[?php echo jq_link_to_function("Filters", "$('#a-admin-filters-container').slideToggle()" ,array('class' => 'a-btn icon a-settings', 'title'=>'Filter Data')) ?]</li>
			<?php endif; ?>
				<li>[?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]</li>
		</ul>
  </div>

	<div id="a-admin-content" class="main">
		<ul id="a-admin-list-actions" class="a-controls a-admin-action-controls">
  		[?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]		
		</ul>
		<?php if ($this->configuration->hasFilterForm()): ?>
		  [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
		<?php endif; ?>

		[?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
		<?php if ($this->configuration->getValue('list.batch_actions')): ?>
			<form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post" id="a-admin-batch-form">
		<?php endif; ?>
		[?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'form' => $filters)) ?]
				<ul class="a-admin-actions">
		      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
		    </ul>
		<?php if ($this->configuration->getValue('list.batch_actions')): ?>
		  </form>
		<?php endif; ?>
	</div>

  <div id="a-admin-footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>
  

</div>
