<?php

use yeesoft\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model yeesoft\comments\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>

    <div class="panel panel-default">
        <div class="panel-body">

            <p>
                <?= Html::a('Edit', ['/comment/default/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?=
                Html::a('Delete', ['/comment/default/delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-sm btn-default',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ])
                ?>
            </p>

            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'model',
                        'value' => $model->model .
                            (($model->model_id) ? '::' . $model->model_id : ''),
                    ],
                    [
                        'attribute' => 'username',
                        'value' => $model->getAuthor(),
                    ],
                    'email:email',
                    [
                        'attribute' => 'parent_id',
                        'value' => ($model->parent_id) ? Html::a('comment_' . $model->parent_id,
                            ['view', 'id' => $model->parent_id]) : NULL,
                        'format' => 'raw'
                    ],
                    [
                        'attribute' => 'status',
                        'value' => $model->getStatusList()[$model->status],
                    ],
                    [
                        'attribute' => 'created_at',
                        'value' => $model->createdDateTime,
                    ],
                    [
                        'attribute' => 'updated_at',
                        'value' => $model->updatedDateTime,
                    ],
                    'user_ip',
                ],
            ])
            ?>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <?= $model->content ?>
        </div>
    </div>

</div>
