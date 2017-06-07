# Yii2 widgets

[Yii2](http://www.yiiframework.com) widgets

## Installation

### Composer

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run

```
php composer.phar require zelenin/yii2-widgets "dev-master"
```

or add

```
"zelenin/yii2-widgets": "dev-master"
```

to the require section of your composer.json

## Usage

### Alert widget

Insert to create and update views:
```
echo Zelenin\yii\widgets\Alert::widget();
```
Add flashes in controller actions like:
```
public function actionUpdate($id)
{
    $model = $this->findModel($id);
    if ($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
        Yii::$app->getSession()->setFlash('success', 'Updated');
        return $this->redirect(['update', 'id' => $model->id]);
    } else {
        return $this->render('update', ['model' => $model]);
    }
}
```

### Error widget

Insert to create and update views:
```
echo Zelenin\yii\widgets\Error::widget(['model' => $model]);
```

## Author

[Aleksandr Zelenin](https://github.com/zelenin/), e-mail: [aleksandr@zelenin.me](mailto:aleksandr@zelenin.me)
