<?php

use yii\widgets\ActiveForm;
use yeesoft\comments\models\Comment;
use yeesoft\usermanagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $model yeesoft\comments\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'comment-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'parent_id')->textInput() ?>

                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                            <span><?=  $model->id ?></span>
                        </div>

                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= GhostHtml::submitButton('<span class="glyphicon glyphicon-plus-sign"></span> Create',
                                    ['class' => 'btn btn-success'])
                                ?>
                                <?= GhostHtml::a('<span class="glyphicon glyphicon-remove"></span> Cancel',
                                    '../comment',
                                    ['class' => 'btn btn-default'])
                                ?>
                            <?php  else: ?>
                                <?= GhostHtml::submitButton('<span class="glyphicon glyphicon-ok"></span> Save',
                                    ['class' => 'btn btn-primary'])
                                ?>
                                <?= GhostHtml::a('<span class="glyphicon glyphicon-remove"></span> Delete',
                                    ['delete', 'id' => $model->id],
                                    [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ])
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php  ActiveForm::end(); ?>

</div>
