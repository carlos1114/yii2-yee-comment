<?php

namespace yeesoft\comment\widgets\dashboard;

use yeesoft\comment\models\search\CommentSearch;
use yeesoft\comments\models\Comment;

class Comments extends \yii\base\Widget
{
    /**
     * Most recent comments limit
     */
    public $recentLimit = 5;

    /**
     * Comment index action
     */
    public $commentIndexAction = 'comment/default/index';

    /**
     * Total comments options
     *
     * @var array
     */
    public $options = [
        ['label' => 'Approved', 'icon' => 'ok', 'filterWhere' => ['status' => Comment::STATUS_APPROVED]],
        ['label' => 'Pending', 'icon' => 'search', 'filterWhere' => ['status' => Comment::STATUS_PENDING]],
        ['label' => 'Spam', 'icon' => 'ban-circle', 'filterWhere' => ['status' => Comment::STATUS_SPAM]],
        ['label' => 'Trash', 'icon' => 'trash', 'filterWhere' => ['status' => Comment::STATUS_TRASH]],
    ];

    public function run()
    {
        $searchModel = new CommentSearch();
        $formName = $searchModel->formName();

        $recentComments = Comment::find()->active()->orderBy(['id' => SORT_DESC])->limit($this->recentLimit)->all();

        foreach ($this->options as &$option) {
            $count = Comment::find()->filterWhere($option['filterWhere'])->count();
            $option['count'] = $count;
            $option['url'] = [$this->commentIndexAction, $formName => $option['filterWhere']];
        }

        return $this->render('comments',
            ['comments' => $this->options,
                'recentComments' => $recentComments]);
    }
}