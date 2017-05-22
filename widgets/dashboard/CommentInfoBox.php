<?php

namespace yeesoft\comment\widgets\dashboard;

use yeesoft\helpers\FA;
use yeesoft\models\User;
use yeesoft\dashboard\widgets\InfoBox;
use Yii;

class CommentInfoBox extends InfoBox
{

    /**
     * @var string model class name
     */
    public $modelClass = 'yeesoft\post\models\Post';

    public function getHasAccess()
    {
        return User::hasPermission('viewComments');
    }

    public function getTitle()
    {
        return Yii::t('yee/comment', 'Comments');
    }

    public function getIcon()
    {
        return FA::_COMMENTS;
    }

    public function getNumber()
    {
        return 1234;
    }

    public function getProgress()
    {
        return 75;
    }

    public function getDescription()
    {
        return '61% Increase in 30 Days';
    }

}
