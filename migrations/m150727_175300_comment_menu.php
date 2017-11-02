<?php

use yii\db\Migration;

class m150727_175300_comment_menu extends Migration
{

    public function up()
    {
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-comment', 'menu_id' => 'admin-menu', 'link' => '/comment/default/index', 'image' => 'comment', 'created_by' => 1, 'order' => 8]);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-comment', 'label' => 'Comments', 'language' => 'en-US']);
    }

    public function down()
    {
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-comment']);
    }

}
