<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class FruitController extends ActiveController
{
    public $modelClass = 'app\models\Fruit';

    public function actions(): array
    {
        Yii::info('this is a log message', '1214234234234234');
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'prepareDataProvider' => fn() => new ActiveDataProvider(
                [
                    'query' => $this->modelClass::find(),
                    'pagination' => false,
                ]
            ),
        ];

        $actions['update'] = [];

        return $actions;
    }

    public function favorite($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

//        return $this->render('update', [
//            'model' => $model,
//        ]);
    }
}
