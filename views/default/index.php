<?php

use yii\helpers\Url;
use yii\widgets\Pjax;
use yeesoft\helpers\Html;
use yeesoft\grid\GridView;
use yeesoft\comments\Comments;
use yeesoft\comments\models\Comment;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\comments\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Comments::t('comments', 'Comments');
$this->params['description'] = 'YeeCMS 0.2.0';
$this->params['breadcrumbs'][] = $this->title;
$this->params['header-content'] = Html::a(Yii::t('yee', 'Add New'), ['/comment/default/index'], ['class' => 'btn btn-sm btn-primary']);
?>
<div class="box box-primary">
    <div class="box-body">
<?php $pjax = Pjax::begin() ?>
<?=
GridView::widget([
    'pjaxId' => $pjax->id,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'bulkActions' => [
        'actions' => [
            Url::to(['bulk-activate']) => Comments::t('comments', 'Approve'),
            Url::to(['bulk-deactivate']) => Comments::t('comments', 'Unapprove'),
            Url::to(['bulk-spam']) => Comments::t('comments', 'Mark as Spam'),
            Url::to(['bulk-trash']) => Comments::t('comments', 'Move to Trash'),
            Url::to(['bulk-delete']) => Yii::t('yee', 'Delete'),
        ]
    ],
    'quickFilters' => [
        'filters' => [
            //Yii::t('yee', 'All') => [],
            Yii::t('yee', 'Approved') => ['status' => Comment::STATUS_APPROVED],
            Yii::t('yee', 'Pending') => ['status' => Comment::STATUS_PENDING],
            Yii::t('yee', 'Spam') => ['status' => Comment::STATUS_SPAM],
            Yii::t('yee', 'Trash') => ['status' => Comment::STATUS_TRASH],
        ],
    ],
    'columns' => [
        ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px'], 'displayFilter' => false],
        [
            'class' => 'yeesoft\grid\columns\TitleActionColumn',
            'attribute' => 'content',
            'title' => function (Comment $model) {
                return Html::a(mb_substr($model->content, 0, 32) . '...', ['/comment/default/update', 'id' => $model->id], ['data-pjax' => 0]);
            },
            'buttonsTemplate' => '{update} {delete}',
            'filterOptions' => ['colspan' => 2],
        ],
        [
            'label' => Yii::t('yee', 'User'),
            'value' => function (Comment $model) {
                return $model->getAuthor();
            },
            'options' => ['style' => 'width:150px'],
        ],
        [
            'attribute' => 'model',
            'value' => function (Comment $model) {
                return $model->model . (($model->model_id) ? ' [' . $model->model_id . ']' : '');
            },
            'options' => ['style' => 'width:120px'],
        ],
        // 'email:email',
        // 'parent_id',
        [
            'class' => 'yeesoft\grid\columns\StatusColumn',
            'attribute' => 'status',
            'optionsArray' => Comment::getStatusOptionsList(),
            'options' => ['style' => 'width:60px'],
        ],
        [
            'class' => 'yeesoft\grid\columns\DateFilterColumn',
            'attribute' => 'created_at',
            'value' => function (Comment $model) {
                return '<span style="font-size:85%;" class="label label-'
                        . ((time() >= $model->created_at) ? 'primary' : 'default') . '">'
                        . $model->createdDate . ' ' . $model->createdTime . '</span>';
            },
            'format' => 'raw',
            'options' => ['style' => 'width:150px'],
        ],
        // 'updated_at',
        [
            'attribute' => 'user_ip',
            'options' => ['style' => 'width:100px'],
        ],
    ],
]);
?>
        <?php Pjax::end() ?>
    </div>
</div>