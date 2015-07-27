<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yeesoft\grid\GridView;
use yeesoft\comments\models\Comment;
use yeesoft\gridquicklinks\GridQuickLinks;
use yeesoft\usermanagement\components\GhostHtml;
use webvimark\extensions\GridPageSize\GridPageSize;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CommentPost */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?=  Html::encode($this->title) ?></h3>
            <?= GhostHtml::a('Add New', ['create'],
                ['class' => 'btn btn-sm btn-primary'])
            ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-6">
                    <?php
                    /* Uncomment this to activate GridQuickLinks */
                    /* echo GridQuickLinks::widget([
                        'model' => Comment::class,
                        'searchModel' => $searchModel,
                    ])*/
                    ?>
                </div>

                <div class="col-sm-6 text-right">
                    <?=  GridPageSize::widget(['pjaxId' => 'comment-grid-pjax']) ?>
                </div>
            </div>

            <?php 
            Pjax::begin([
                'id' => 'comment-grid-pjax',
            ])
            ?>

            <?= 
            GridView::widget([
                'id' => 'comment-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'comment-grid',
                    'actions' => [ Url::to(['bulk-delete']) => 'Delete'] //Configure here you bulk actions
                ],
                'columns' => [
                    ['class' => 'yii\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'class' => 'yeesoft\grid\columns\TitleActionColumn',
                        'title' => function(Comment $model) {
                        return Html::a($model->id,
                                ['view', 'id' => $model->id], ['data-pjax' => 0]);
                    },
                    ],

            'id',
            'model',
            'model_id',
            'user_id',
            'username',
            // 'email:email',
            // 'parent_id',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'content:ntext',
            // 'user_ip',

                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


