<?php

use yii\db\Migration;
use yii\db\Schema;

class m150727_175300_add_comments_menu_links extends Migration
{

    public function up()
    {

        $this->insert('menu_link',
            ['id' => 'comment', 'menu_id' => 'admin-main-menu', 'label' => 'Comments',
                'link' => '/comment', 'image' => 'comment', 'order' => 8]);
    }

    public function down()
    {
        $this->delete('menu_link', ['like', 'id', 'comment']);
    }
}