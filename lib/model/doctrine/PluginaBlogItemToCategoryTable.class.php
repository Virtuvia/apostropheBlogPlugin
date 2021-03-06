<?php

/**
 * PluginaBlogItemToCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginaBlogItemToCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginaBlogItemToCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginaBlogItemToCategory');
    }
    
    public function mergeCategory($old_id, $new_id)
    {
      Doctrine::getTable('aCategory')->mergeCategory($old_id, $new_id, 'aBlogItemToCategory', 'category_id', true, 'blog_item_id');
    }
}