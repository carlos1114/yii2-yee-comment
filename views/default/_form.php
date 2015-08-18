<?php

use yeesoft\comments\models\Comment;
use yeesoft\helpers\Html;
use yii\widgets\ActiveForm;

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

                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">

                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['username'] ?> :
                            </label>
                            <span><?= $model->author ?></span>
                        </div>

                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['created_at'] ?> :
                            </label>
                            <span><?= $model->createdDateTime ?></span>
                        </div>

                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['updated_at'] ?> :
                            </label>
                            <span><?= $model->updatedDateTime ?></span>
                        </div>

                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['user_ip'] ?> :
                            </label>
                            <span><?= $model->user_ip ?></span>
                        </div>

                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['email'] ?> :
                            </label>
                            <span><?= $model->email ?></span>
                        </div>


                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?=
                                Html::submitButton('<span class="glyphicon glyphicon-plus-sign"></span> Create',
                                    ['class' => 'btn btn-success'])
                                ?>
                                <?=
                                Html::a('<span class="glyphicon glyphicon-remove"></span> Cancel',
                                    '../comment', ['class' => 'btn btn-default'])
                                ?>
                            <?php else: ?>
                                <?=
                                Html::submitButton('<span class="glyphicon glyphicon-ok"></span> Save',
                                    ['class' => 'btn btn-primary'])
                                ?>
                                <?=
                                Html::a('<span class="glyphicon glyphicon-remove"></span> Delete',
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

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="record-info">
                        
                        <?= $form->field($model, 'status')->dropDownList(Comment::getStatusList(), ['class' => '']) ?>

                        <?= $form->field($model, 'model')->textInput() ?>

                        <?= $form->field($model, 'model_id')->textInput() ?>

                        <?= $form->field($model, 'parent_id')->textInput() ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
