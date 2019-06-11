<?php

namespace frontend\controllers;
use frontend\models\Image;

class TrashController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = Image::find()->where('deleted = 1')->all();
        return $this->renderPartial('trash',['trash'=>$data]);
    }
}

?>