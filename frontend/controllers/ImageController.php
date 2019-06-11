<?php

namespace frontend\controllers;
use Yii;

use frontend\models\Image;

class ImageController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        $data = new Image();
        $data = $data->getOneImage($id);
        return $this->renderPartial('detail',['data'=>$data]);
    }
    public function actionDelete($id){
        $data = new Image();
        // echo '<pre>';
        // print_r($id);
        // die();
        $data = $data->deleteImage($id);
        return $this->goHome();
    }
    
    // public function actionDelete(){
    //     $request = Yii::$app->request;
    //     $id = $request->get("id");
    //     $model = Image::findOne($id);
    //     if ($model->delete()) {
    //     	$this->goHome();
    //     }
    // }

}
