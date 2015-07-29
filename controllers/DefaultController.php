<?php

namespace yeesoft\comment\controllers;

use yeesoft\base\controllers\admin\BaseController;
use yeesoft\comments\models\Comment;
use Yii;

/**
 * CommentController implements the CRUD actions for Post model.
 */
class DefaultController extends BaseController
{
    public $modelClass = 'yeesoft\comments\models\Comment';
    public $modelSearchClass = 'yeesoft\comment\models\search\CommentSearch';
    public $disabledActions = ['create'];

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }

    /**
     * Mark as spam all selected grid items
     */
    public function actionBulkSpam()
    {
        if (Yii::$app->request->post('selection')) {
            $modelClass = $this->modelClass;

            $modelClass::updateAll(
                ['status' => Comment::STATUS_SPAM],
                ['id' => Yii::$app->request->post('selection', [])]
            );
        }
    }

    /**
     * Move to trash all selected grid items
     */
    public function actionBulkTrash()
    {
        if (Yii::$app->request->post('selection')) {
            $modelClass = $this->modelClass;

            $modelClass::updateAll(
                ['status' => Comment::STATUS_TRASH],
                ['id' => Yii::$app->request->post('selection', [])]
            );
        }
    }
}