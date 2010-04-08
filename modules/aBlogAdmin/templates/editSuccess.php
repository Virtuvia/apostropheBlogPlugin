<?php slot('body_class') ?>a-blog <?php echo $sf_params->get('module'); ?> <?php echo $sf_params->get('action') ?><?php end_slot() ?>
<?php use_helper('I18N', 'Date', 'jQuery', 'a') ?>
<?php include_partial('aBlogAdmin/assets') ?>

<?php $blog_post_url = url_for('@a_blog_admin_update?slug='.$a_blog_post['slug']) ?>

<div class="a-admin-container <?php echo $sf_params->get('module') ?>">
	
  <?php // include_partial('aBlogAdmin/form_bar', array('title' => __('Edit Blog Post', array(), 'messages'))) ?>

	<?php slot('a-subnav') ?>
		<div class="a-subnav-wrapper blog">
			<div class="a-subnav-inner">	
				<ul class="a-admin-action-controls">
					<li><a href="<?php echo url_for('@a_blog_admin'); ?>"><?php echo __('All Posts', array(), 'messages') ?></a></li>
	         <?php include_partial('aBlogAdmin/list_actions', array('helper' => $helper)) ?>
				</ul>
			</div> 
	  </div>
	<?php end_slot() ?>
  
  <?php include_partial('aBlogAdmin/flashes') ?>
	
	<div class="a-admin-content main">	
		
		<div class="a-blog-post-title-interface">
			<input type="text" id="a_blog_post_title_interface" value="<?php echo ($a_blog_post->title == 'untitled')? '':$a_blog_post->title ?>" />
			<div id="a-blog-post-title-placeholder"><?php echo __('Title your post...', array(), 'messages') ?></div>
		</div>		
		
		<div id="a_blog_post_permalink_interface">http://site/blog/url/<?php echo $a_blog_post->slug ?></div>
  	<?php include_partial('aBlog/'.$a_blog_post->getTemplate(), array('a_blog_post' => $a_blog_post)) ?>
  </div>

  <div class="a-admin-sidebar">
    <div id='a-admin-blog-post-form'>
    <?php include_partial('aBlogAdmin/form', array('a_blog_post' => $a_blog_post, 'form' => $form)) ?>
    </div>
  </div>
  
  <div class="a-admin-footer">
    <?php include_partial('aBlogAdmin/form_footer', array('a_blog_post' => $a_blog_post, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
  </form>
<?php //include_partial('aBlogAdmin/form_actions', array('a_blog_post' => $a_blog_post, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>


<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){

		// If there are any conventional changes to the admin form
    $('#a-admin-form').change(function() {
			updateBlogForm('<?php echo $blog_post_url ?>'); 
    });
			
		// Title Interface Magic Label
		var titleInterface = $('#a_blog_post_title_interface');
		var titlePlaceholder = $('#a-blog-post-title-placeholder');
		
		titleInterface.change(function(){
			if ($(this).val() != '') { // If the input is not empty
				$('#a_blog_post_title').val($(this).val()); // Pass the value to the admin form and update
				updateBlogForm('<?php echo $blog_post_url ?>'); 
			};
		});
		
		titleInterface.blur(function(){
			if ($(this).val() == '') { 	// If the input is empty			
				$(this).next().show(); 		// Show the label on blur
			}
		});

		titleInterface.focus(function(){
			$(this).next().hide(); 	// Always hide the placeholder on focus
		});
		
		<?php if ($a_blog_post->title == 'untitled'): ?>
			titleInterface.focus(); // The blog post is 'Untitled' -- Focus the input
		<?php endif ?>
		
		titlePlaceholder.mousedown(function(){
			titleInterface.focus(); // If you click the placeholder text, focus the input (Mousedown is faster than click here)
		}).hide();

  });
</script>