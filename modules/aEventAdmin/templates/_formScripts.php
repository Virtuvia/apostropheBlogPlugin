<script type="text/javascript" charset="utf-8">
	
	function aBlogUpdateMulti() { aBlogUpdateForm('<?php echo url_for('a_event_admin_update',$a_event) ?>'); }

	$(document).ready(function(){
		
	    $('#a-admin-form').change(function(event) {
		    if (!( event.target.className == 'a-multiple-select-input' && event.target.options[0].selected == true || event.target.name == 'add-text' || event.target.name == 'a-ignored' ))
				{
		      aBlogUpdateForm('<?php echo url_for('a_event_admin_update', $a_event) ?>', event);
				}
	    });

      $('#<?php echo $form['start_date']->renderId() ?>-ui').bind('aTimeUpdated',function(event){
        aBlogUpdateForm('<?php echo url_for('a_event_admin_update', $a_event) ?>', event);
      });

      $('#<?php echo $form['end_date']->renderId() ?>-ui').bind('aTimeUpdated',function(event){
        aBlogUpdateForm('<?php echo url_for('a_event_admin_update', $a_event) ?>', event);
      });

			// Sidebar Toggle
			// =============================================
	    $('.a-sidebar-toggle').click(function(){
	      $(this).toggleClass('open').next().toggle();
	    })

			// Comments Toggle
			// =============================================
			$('.section.comments a.allow_comments_toggle').click(function(event){
				event.preventDefault();
				aBlogCheckboxToggle($('#a_blog_item_allow_comments'));
				aBlogUpdateForm('<?php echo url_for('a_event_admin_update',$a_event) ?>');
			});

			aPopularTags($('#a_blog_item_tags'), $('#blog-tag-list .recommended-tag'));
			aBlogTitle('<?php echo url_for('a_event_admin_update',$a_event) ?>');
			aBlogPermalink('<?php echo url_for('a_event_admin_update',$a_event) ?>');
	    aBlogPublishBtn('<?php echo $a_event->status  ?>','<?php echo url_for('a_event_admin_update',$a_event) ?>');
	    aMultipleSelect('#categories-section', { 'choose-one': '<?php echo __('Choose Categories', array(), 'apostrophe_blog') ?>' <?php if($sf_user->hasCredential('admin')): ?>, 'add': '<?php echo __('+ New Category', array(), 'apostrophe_blog') ?>'<?php endif ?>, 'onChange': aBlogUpdateMulti });
	    aMultipleSelect('#editors-section', { 'choose-one': '<?php echo __('Choose Editors', array(), 'apostrophe_blog') ?>','onChange': aBlogUpdateMulti  });
    
	 });

</script>