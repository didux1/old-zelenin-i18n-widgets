<?php

namespace Zelenin\yii\widgets;

use Yii;
use yii\bootstrap\Widget;
use yii\db\ActiveRecord;

class Error extends Widget
{
    /** @var ActiveRecord */
    public $model;
    /** @var array */
    public $options = ['class' => 'alert-danger'];
    /** @var array */
    public $closeButton = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        foreach ($this->model->getErrors() as $attribute => $messages) {
            foreach ($messages as $key => $message) {
                $this->options['id'] = 'error-' . $attribute . '-' . $key;
                echo \yii\bootstrap\Alert::widget([
                    'body' => $message,
                    'closeButton' => $this->closeButton,
                    'options' => $this->options
                ]);
            }
        }
    }
}
