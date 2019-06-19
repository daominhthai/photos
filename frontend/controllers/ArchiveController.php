<?php 

namespace frontend\controllers;
use frontend\models\Image;
use Yii;
use frontend\models\ContactForm;


class ArchiveController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = Image::find()
            ->where(['user_id'=>Yii::$app->user->id,'deleted'=>2])
            ->all();
        return $this->renderPartial('index',['archive'=>$data]);
    }
}

 ?>