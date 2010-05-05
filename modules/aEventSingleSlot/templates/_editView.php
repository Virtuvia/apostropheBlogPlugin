<script type="text/javascript" src="/sfJqueryReloadedPlugin/js/plugins/jquery.autocomplete.min.js" />
<h4 class="a-slot-form-title">Choose an Event</h4>

<div class="a-form-row search">
  <?php echo $form->renderHiddenFields() ?>
	<?php echo $form['search']->renderLabel(__('Search by Title', array(), 'apostrophe_blog')) ?>
	<div class="a-form-field">
		<?php echo $form['search']->render() ?>
		<?php echo $form['search']->renderHelp() ?>
	</div>
	<div class="a-form-error"><?php echo $form['search']->renderError() ?></div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#a-<?php echo $form->getName() ?>').addClass('a-options dropshadow');
	  $('#<?php echo $form['search']->renderId() ?>').autocomplete('<?php echo url_for("@a_event_admin_autocomplete") ?>');
	  $('#<?php echo $form['search']->renderId() ?>').result(function(event, data, formatted){
	    if (data) {
	      $('#<?php echo $form['blog_item']->renderId() ?>').val(data[1]);
	      $('#<?php echo $form['search']->renderId() ?>').val(data[2]);
	    }
	  });
	});
</script>