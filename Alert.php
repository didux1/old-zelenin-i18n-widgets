<?php

namespace Zelenin\yii\widgets;

use Yii;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;

class Alert extends Widget
{
    /** @var array */
    public $alertTypes = [
        'success' => 'alert-success',
        'info' => 'alert-info',
        'warning' => 'alert-warning',
        'danger' => 'alert-danger',
        'error' => 'alert-danger'
    ];
    /** @var array */
    public $closeButton = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $session = Yii::$app->getSession();
        foreach ($session->getAllFlashes() as $type => $message) {
            $this->options['class'] = ArrayHelper::getValue($this->alertTypes, $type, $this->alertTypes['info']);
            $this->options['id'] = $this->getId() . '-' . $type;
            echo \yii\bootstrap\Alert::widget([
                'body' => $message,
                'closeButton' => $this->closeButton,
                'options' => $this->options
            ]);
            $session->removeFlash($type);
        }
    }
}
