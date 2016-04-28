<?php

use yii\db\Migration;
use yii\db\Schema;

class m150825_212941_add_comments_permissions extends Migration
{

    public function up()
    {
        $this->insert('auth_item_group', ['code' => 'commentsManagement', 'name' => 'Comments Management', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item', ['name' => '/admin/comment/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/bulk-activate', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/bulk-deactivate', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/bulk-delete', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/bulk-spam', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/bulk-trash', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/delete', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/grid-page-size', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/grid-sort', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/index', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/toggle-attribute', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/update', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/comment/default/view', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item', ['name' => 'editComments', 'type' => '2', 'description' => 'Edit comments', 'group_code' => 'commentsManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'deleteComments', 'type' => '2', 'description' => 'Delete comments', 'group_code' => 'commentsManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'viewComments', 'type' => '2', 'description' => 'View comments', 'group_code' => 'commentsManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-activate']);
        $this->insert('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-deactivate']);
        $this->insert('auth_item_child', ['parent' => 'deleteComments', 'child' => '/admin/comment/default/bulk-delete']);
        $this->insert('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-spam']);
        $this->insert('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-trash']);
        $this->insert('auth_item_child', ['parent' => 'deleteComments', 'child' => '/admin/comment/default/delete']);
        $this->insert('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/grid-page-size']);
        $this->insert('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/grid-sort']);
        $this->insert('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/index']);
        $this->insert('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/toggle-attribute']);
        $this->insert('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/update']);
        $this->insert('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/view']);

        $this->insert('auth_item_child', ['parent' => 'deleteComments', 'child' => 'viewComments']);
        $this->insert('auth_item_child', ['parent' => 'editComments', 'child' => 'viewComments']);

        $this->insert('auth_item_child', ['parent' => 'moderator', 'child' => 'deleteComments']);
        $this->insert('auth_item_child', ['parent' => 'moderator', 'child' => 'editComments']);
        $this->insert('auth_item_child', ['parent' => 'moderator', 'child' => 'viewComments']);
    }

    public function down()
    {
        $this->delete('auth_item', ['name' => '/admin/comment/*']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/*']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/bulk-activate']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/bulk-deactivate']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/bulk-delete']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/bulk-spam']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/bulk-trash']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/delete']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/grid-page-size']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/grid-sort']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/index']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/toggle-attribute']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/update']);
        $this->delete('auth_item', ['name' => '/admin/comment/default/view']);

        $this->delete('auth_item', ['name' => 'editComments']);
        $this->delete('auth_item', ['name' => 'deleteComments']);
        $this->delete('auth_item', ['name' => 'viewComments']);

        $this->delete('auth_item_child', ['parent' => 'moderator', 'child' => 'deleteComments']);
        $this->delete('auth_item_child', ['parent' => 'moderator', 'child' => 'editComments']);
        $this->delete('auth_item_child', ['parent' => 'moderator', 'child' => 'viewComments']);

        $this->delete('auth_item_child', ['parent' => 'deleteComments', 'child' => 'viewComments']);
        $this->delete('auth_item_child', ['parent' => 'editComments', 'child' => 'viewComments']);

        $this->delete('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-activate']);
        $this->delete('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-deactivate']);
        $this->delete('auth_item_child', ['parent' => 'deleteComments', 'child' => '/admin/comment/default/bulk-delete']);
        $this->delete('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-spam']);
        $this->delete('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/bulk-trash']);
        $this->delete('auth_item_child', ['parent' => 'deleteComments', 'child' => '/admin/comment/default/delete']);
        $this->delete('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/grid-page-size']);
        $this->delete('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/grid-sort']);
        $this->delete('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/index']);
        $this->delete('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/toggle-attribute']);
        $this->delete('auth_item_child', ['parent' => 'editComments', 'child' => '/admin/comment/default/update']);
        $this->delete('auth_item_child', ['parent' => 'viewComments', 'child' => '/admin/comment/default/view']);

        $this->delete('auth_item_group', ['code' => 'commentsManagement']);
    }
}