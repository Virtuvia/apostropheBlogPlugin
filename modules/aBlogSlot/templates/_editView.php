<?php // Just echo the form. You might want to render the form fields differently ?>

<?php echo $form->renderHiddenFields() ?>

<div class="a-form-row count">
<?php echo $form['count']->renderLabel() ?>
<div class="a-form-field"><?php echo $form['count']->render() ?></div>
<div class="a-form-error"><?php echo $form['count']->renderError() ?></div>
</div>

<div class="a-form-row categories">
<?php echo $form['categories_list']->renderLabel() ?>
<div class="a-form-field"><?php echo $form['categories_list']->render() ?></div>
<div class="a-form-error"><?php echo $form['categories_list']->renderError() ?></div>
</div>

<div class="a-form-row tags">
<?php echo $form['tags_list']->renderLabel() ?>
<div class="a-form-field"><?php echo $form['tags_list']->render() ?></div>
<div class="a-form-error"><?php echo $form['tags_list']->renderError() ?></div>
</div>

<script src='/sfDoctrineActAsTaggablePlugin/js/pkTagahead.js'></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    pkTagahead(<?php echo json_encode(url_for("taggableComplete/complete")) ?>);
    aMultipleSelect('#a-<?php echo $form->getName() ?>', { 'choose-one': 'Add Categories' });
		$('#a-<?php echo $form->getName() ?>').addClass('a-options dropshadow');			
  });
</script>

