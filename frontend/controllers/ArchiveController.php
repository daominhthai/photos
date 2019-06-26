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
        $data1 =Image::find()->where(['user_id'=>Yii::$app->user->id,'deleted'=>0])->all();
        return $this->renderPartial('index',[
            'archive'=>$data,
            'select' =>$data1
        ]);
    }

    public function actionAdd(){
        if (isset($_POST['submitArchive'])) {
            if (isset($_POST['addArchive'])) {
                $archive = $_POST['addArchive'];
                foreach ($archive as $id) {
                    $data = new Image();
                    $data = $data->addArchive($id);
                }
                return $this->redirect(Yii::$app->homeUrl."archive");
            }
            else{
                return $this->redirect(Yii::$app->homeUrl."archive");
            }
        
    }
}

    public function actionRemove(){
        if (isset($_POST['history'])) {
            if (isset($_POST['select'])) {
                $select = $_POST['select'];
                foreach ($select as $id) {
                    $data = new Image();
                    $data = $data->historyArchive($id);
                }
                return $this->redirect(Yii::$app->homeUrl."archive");
            }
        }
        //chuyển vào thùng rác
        if (isset($_POST['delete'])) {
            if (isset($_POST['select'])) {
                $delete = $_POST['select'];
                foreach ($delete as $id) {
                    $data = new Image();
                    $data = $data->deleteImage($id);
                }
                return $this->redirect(Yii::$app->homeUrl."archive");
            }
        }
        //tải ảnh xuống
        if (isset($_POST['download'])) {
            if (isset($_POST['select'])) {
                $delete = $_POST['select'];
                foreach ($delete as $id) {
                    $data = Image::findOne($id);
                    header('Content-Type:'.pathinfo($data->path_image, PATHINFO_EXTENSION));
                    header('Content-Disposition: attachment; filename='.$data->image);
                    return readfile($data->path_image);
                }
                return $this->redirect(Yii::$app->homeUrl."archive");
            }
        }
        //thêm vào yêu thích
        if (isset($_POST['wistlist'])) {
            if (isset($_POST['select'])) {
                $wist = $_POST['select'];
                foreach ($wist as $id) {
                    $data = new Image();
                    $data = $data->wistlist($id);
                }
                return $this->redirect(Yii::$app->homeUrl."archive");
            }
        }
    }
}

 ?>