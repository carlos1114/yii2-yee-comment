<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
?>

<div class="col-lg-8 widget-height-3">
    <div class="panel panel-default" style="position:relative;">
        <div class="panel-heading">Comments Activity</div>
        <div class="panel-body">

            <h4 style="font-style: italic;">Most Recent Comments:</h4>

            <div class="clearfix">
                <?php foreach ($recentComments as $comment) : ?>
                    <div class="clearfix" style="border-bottom: 1px solid #eee; margin: 7px; padding: 0 0 5px 5px;">
                        <span style="font-size:80%; margin-right: 10px;"
                              class="label label-primary">[<?= $comment->createdDateTime ?>]</span>
                        <b><i><?= $comment->getAuthor() ?>:</i></b>
                        <?= mb_substr($comment->content, 0, 64, "UTF-8") ?>...<br/>
                    </div>
                <?php endforeach; ?>

            </div>

            <div style=" position: absolute; bottom:10px; left:0; right:0; text-align: center;"> |
                <?php foreach ($comments as $comment) : ?>
                    <?= Html::a('<b>' . $comment['count'] . '</b> ' . $comment['label'], $comment['url']); ?> &nbsp; | &nbsp;
                <?php endforeach; ?>
            </div>


        </div>
    </div>
</div>