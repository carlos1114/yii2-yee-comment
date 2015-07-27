<?php

use yii\db\Schema;
use yii\db\Migration;

class m150727_175300_add_comments_menu_links extends Migration
{

    public function up()
    {

        $this->insert('menu_link',
            ['id' => 'comment', 'menu_id' => 'admin-main-menu', 'label' => 'Comments',
            'image' => 'comment', 'order' => 8]);
    }

    public function down()
    {
        $this->delete('menu_link', ['like', 'id', 'comment']);
    }
}