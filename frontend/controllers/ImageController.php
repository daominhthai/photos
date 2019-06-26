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
        $user_id = Yii::$app->user->id;
        $data2 = Image::find()->where('image_id!=:id AND user_id=:user_id',['id'=>$id,'user_id'=>$user_id])->all();
        return $this->renderPartial('detail',[
            'data'=>$data,
            'data2'=>$data2
        ]);
    }
    public function actionDelete($id){
        $data = new Image();
        // echo '<pre>';
        // print_r($id);
        // die();
        $data = $data->deleteImage($id);
        return $this->goHome();
    }
    
    public function actionDownload($id){
        $data = Image::findOne($id);
        header('Content-Type:'.pathinfo($data->path_image, PATHINFO_EXTENSION));
        header('Content-Disposition: attachment; filename='.$data->image);
        return readfile($data->path_image);
    } 
    // public function actionDelete(){
    //     $request = Yii::$app->request;
    //     $id = $request->get("id");
    //     $model = Image::findOne($id);
    //     if ($model->delete()) {
    //     	$this->goHome();
    //     }
    // }
    public function actionSend(){
        if (isset($_POST['submit'])){
            $name =$_POST['share'];
            $mes = $_POST['mes'];
            Yii::$app->mailer->compose()
                ->setFrom('dinhtranqt95@gmail.com')
                ->setTo($name)
                ->setSubject($mes)
                ->send();
            return $this->redirect(Yii::$app->homeUrl);
        }

    }
    public function actionArchive($id){
        $data = Image::findOne($id);
        $data->deleted = 2;
        $data->save();
        return $this->redirect(Yii::$app->homeUrl);
    }
}
