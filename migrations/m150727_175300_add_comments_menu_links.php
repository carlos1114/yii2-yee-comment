<?php

use yii\db\Migration;
use yii\db\Schema;

class m150727_175300_add_comments_menu_links extends Migration
{

    public function up()
    {
        $this->insert('menu_link', ['id' => 'comment', 'menu_id' => 'admin-main-menu', 'link' => '/comment/default/index', 'image' => 'comment', 'order' => 8]);
        $this->insert('menu_link_lang', ['link_id' => 'comment', 'label' => 'Comments', 'language' => 'en' ]);
    }

    public function down()
    {
        $this->delete('menu_link_lang', ['like', 'link_id', 'comment']);
        $this->delete('menu_link', ['like', 'id', 'comment']);
    }
}