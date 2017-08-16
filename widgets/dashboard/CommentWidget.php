<?php

namespace yeesoft\comment\widgets\dashboard;

use yeesoft\helpers\FA;
use yeesoft\models\User;
use yeesoft\dashboard\widgets\DashboardWidget;
use Yii;

class CommentWidget extends DashboardWidget
{

    /**
     * @var integer most recent post limit 
     */
    public $limit = 5;

    /**
     * @var string model class name
     */
    public $modelClass = 'yeesoft\comments\models\Comment';

    /**
     * @var string search model class name
     */
    public $searchModelClass = 'yeesoft\comment\models\CommentSearch';

    /**
     * @var string index action
     */
    public $indexAction = '/comment/default/index';

    /**
     * @var string list view file
     */
    public $indexView = 'index';

    /**
     * @var string list view file
     */
    public $quickLinksView = 'quick-links';

    /**
     * @var array total post options
     */
    public $quickLinksOptions;

    public function init()
    {
        parent::init();
        $this->visible = User::hasPermission('viewComments');
    }

    public function renderContent()
    {
        $modelClass = $this->modelClass;
        $items = $modelClass::find()->active()->orderBy(['id' => SORT_DESC])->limit($this->limit)->all();
        return $this->render($this->indexView, compact('items'));
    }

    public function renderFooterContent()
    {
        if (!$this->quickLinksOptions) {
            $this->quickLinksOptions = $this->getDefaultQuickLinksOptions();
        }

        $links = [];
        $modelClass = $this->modelClass;
        $searchModelClass = $this->searchModelClass;
        $formName = (new $searchModelClass())->formName();

        foreach ($this->quickLinksOptions as $option) {
            $links[] = [
                'count' => $modelClass::find()->filterWhere($option['filter'])->count(),
                'label' => $option['label'],
                'url' => [$this->indexAction, $formName => $option['filter']],
            ];
        }

        return $this->render($this->quickLinksView, compact('links'));
    }

    public function getDefaultQuickLinksOptions()
    {
        $modelClass = $this->modelClass;

        return [
            ['label' => Yii::t('yee', 'Approved'), 'filter' => ['status' => $modelClass::STATUS_APPROVED]],
            ['label' => Yii::t('yee', 'Pending'), 'filter' => ['status' => $modelClass::STATUS_PENDING]],
            ['label' => Yii::t('yee', 'Spam'), 'filter' => ['status' => $modelClass::STATUS_SPAM]],
            ['label' => Yii::t('yee', 'Trash'), 'filter' => ['status' => $modelClass::STATUS_TRASH]],
        ];
    }

    public function getIcon()
    {
        return FA::_COMMENTS;
    }

    public function getTitle()
    {
        return Yii::t('yee', 'Comments Activity');
    }

}
