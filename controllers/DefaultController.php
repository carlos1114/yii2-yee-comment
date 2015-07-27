<?php

namespace yeesoft\comment\controllers;

use yeesoft\base\controllers\admin\BaseController;

/**
 * CommentController implements the CRUD actions for Post model.
 */
class CommentController extends BaseController
{
    public $modelClass       = 'yeesoft\comment\models\Comment';
    public $modelSearchClass = 'yeesoft\comment\models\search\CommentSearch';

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
}