<?php
  // Compatible with sf_escaping_strategy: true
  $a_blog_post = isset($a_blog_post) ? $sf_data->getRaw('a_blog_post') : null;
  $edit = isset($edit) ? $sf_data->getRaw('edit') : null;
?>
<?php if ($sf_params->get('module') != 'aBlogAdmin'): ?>
<h3 class="a-blog-item-title">
  <?php echo link_to($a_blog_post->getTitle(), 'a_blog_post', $a_blog_post) ?>
</h3>
<ul class="a-blog-item-meta">
  <li class="date"><?php echo aDate::pretty($a_blog_post['published_at']); ?></li>
  <li class="author"><?php echo __('Posted By:', array(), 'apostrophe') ?> <?php echo $a_blog_post->getAuthor() ?></li>   
</ul>
<?php endif ?>

<?php a_area('blog-body', array(
  'edit' => $edit, 'toolbar' => 'basic', 'slug' => $a_blog_post->Page->slug,
  'allowed_types' => array('aRichText', 'aSlideshow', 'aVideo', 'aPDF'),
  'type_options' => array(
    'aRichText' => array('tool' => 'Main'),   
    'aSlideshow' => array("width" => 480, "flexHeight" => true, 'resizeType' => 's', 'constraints' => array('minimum-width' => 480)),
		'aVideo' => array('width' => 480, 'flexHeight' => true, 'resizeType' => 's'),
		'aPDF' => array('width' => 480, 'flexHeight' => true, 'resizeType' => 's'),		
))) ?>

<?php a_area('blog-sidebar', array(
  'edit' => $edit, 'toolbar' => 'basic', 'slug' => $a_blog_post->Page->slug,
  'allowed_types' => array('aRichText', 'aSlideshow', 'aVideo', 'aPDF'),
  'type_options' => array(
    'aRichText' => array('tool' => 'Sidebar'),   
    'aSlideshow' => array("width" => 180, "flexHeight" => true, 'resizeType' => 's', 'constraints' => array('minimum-width' => 180)),
		'aVideo' => array('width' => 180, 'flexHeight' => true, 'resizeType' => 's'), 
		'aPDF' => array('width' => 180, 'flexHeight' => true, 'resizeType' => 's'),				
))) ?>

<?php include_partial('aBlog/addThis', array('aBlogPost' => $a_blog_post)) ?>