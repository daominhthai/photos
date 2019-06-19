<?php

namespace frontend\controllers;

use frontend\models\Image;
use Yii;

class ShareController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Image();
        $data = Image::find()
            ->where(['user_id'=>Yii::$app->user->id,'deleted'=>1])
            ->all();
        return $this->render('index',[
            'image'=>$data,
            'model'=>$model
        ]);
    }

}
