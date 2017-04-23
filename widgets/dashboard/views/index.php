<?php

use yeesoft\helpers\Html;
use yeesoft\comments\assets\CommentsAsset;
use yeesoft\comments\Comments;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */

$css = <<<CSS
.box .comment {
    border-bottom: 1px solid #eee;
    padding: 0 10px 10px 10px;
    margin-bottom: 5px;
}
.box .comment .comment-content {
    text-align: justify;
    margin: 0 0 5px 0;
}

CSS;

$this->registerCss($css);

$commentsAsset = CommentsAsset::register($this);
Comments::getInstance()->commentsAssetUrl = $commentsAsset->baseUrl;
?>

<?php if (count($items)): ?>
    <?php foreach ($items as $item) : ?>
        <div class="clearfix comment">
            <div class="avatar">
                <img src="<?= Comments::getInstance()->renderUserAvatar($item->user_id) ?>"/>
            </div>

            <div class="comment-content">
                <div class="comment-header">
                    <a class="author"><?= Html::encode($item->getAuthor()); ?></a>
                    <span class="time dot-left dot-right">
                        <?= "{$item->createdDate} {$item->createdTime}" ?>
                    </span>
                </div>
                <div class="comment-text">
                    <?= HtmlPurifier::process(mb_substr(Html::encode($item->content), 0, 128, "UTF-8")); ?>
                    <?= (strlen($item->content) > 128) ? '...' : '' ?>
                </div>
            </div>
        </div>


    <?php endforeach; ?>
<?php else: ?>
    <h4><em><?= Yii::t('yee/post', 'No posts found.') ?></em></h4>
<?php endif; ?>