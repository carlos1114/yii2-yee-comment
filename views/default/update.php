<?php

use yeesoft\comments\Comments;

/* @var $this yii\web\View */
/* @var $model yeesoft\comments\models\Comment */

$this->title = Yii::t('yee', 'Update "{item}"', ['item' => Comments::t('comments', 'Comment')]);
$this->params['breadcrumbs'][] = ['label' => Comments::t('comments', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Update');
?>
<?= $this->render('_form', compact('model')) ?>