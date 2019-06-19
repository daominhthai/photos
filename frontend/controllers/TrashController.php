<?php

namespace frontend\controllers;
use frontend\models\Image;
use Yii;

class TrashController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = Image::find()
            ->where(['user_id'=>Yii::$app->user->id,'deleted'=>1])
            ->all();
        return $this->renderPartial('trash',['trash'=>$data]);
    }


    public function actionDeleteall(){
        $data = new Image();
        $data = $data->deleteAllTrash();
        return $this->redirect(Yii::$app->homeUrl.'trash');
    }

    public function actionDeleteselect(){
        if (isset($_POST['submit'])) {
        $imge = $_POST['hinhanh'];
        foreach ($imge as $id) {
            $data = new Image();
            $data = $data->deleteSelectTrash($id);
        }
     }
     //phục hồi ảnh
     if (isset($_POST['history'])) {
        $his = $_POST['hinhanh'];
        foreach ($his as $id) {
            $data = new Image();
            $data = $data->redeleteTrash($id);
        }
     }
     return $this->redirect(Yii::$app->homeUrl."trash");  
    }
}

?>