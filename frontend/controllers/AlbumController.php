<?php

namespace frontend\controllers;

use frontend\models\Album;
use frontend\models\Image;
use Yii;
use frontend\models\ContactForm;
use yii\web\UploadedFile;

class AlbumController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $data = Album::find()->all();
        $model = new Image();
        if ($model->load(Yii::$app->request->post())) {
            $names = UploadedFile::getInstances($model, 'image');
            if (count($names) > 5) {
                return $this->redirect(Yii::$app->homeUrl);
            }
            foreach ($names as $name) {
                $path = 'uploads/' . md5($name->baseName) . '.' . $name->extension;
                if ($name->saveAs($path)) {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    $filename = $name->baseName . '.' . $name->extension;
                    $filepath = $path;
                    // $username = Yii::$app->user->identity->id;
                    Yii::$app->db->createCommand()->insert('image', ['user_id' => 3, 'image' => $filename, 'path_image' => $filepath, 'date_create' => $date, 'date_update' => $date])->execute();
                }

            }
            return $this->redirect(Yii::$app->homeUrl);
        } else {
            return $this->render('index', [
                'albums' => $data,
                'model' => $model
            ]);
        }
    }

    public function actionAddnew()
    {
//        $model = Image::find()
//            ->where(['user_id' => Yii::$app->user->id, 'deleted' => 0])
//            ->all();
//        return $this->renderPartial('addnew', [
//            'image' => $model
//        ]);
          //  add new album
        $model = new Album();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $username = Yii::$app->user->id;
        $model->user_id = $username;
        $model->date_create = $date;
        $model->date_update = $date;

        Yii::$app->db->createCommand()->insert('album', ['user_id' => $username
            ,'date_create' => $date
            ,'date_update' => $date])->execute();

            return $this->renderPartial('add', [
                'image' => $model
            ]);
    }

    public function actionAdd()
    {
        $data = Album::find()->all();
        if (isset($_POST['submit'])) {
            $tieude = $_POST['tieude'];
            $image = $_POST['checkimage'];
            $albumid = $_POST['albumid'];
            foreach ($image as $item) {
                print_r($item);
                echo '<pre>';
            }
            print_r($albumid);
            echo '<pre>';
            print_r($tieude);
            die();
        }
    }

    public function actionWistlist(){
        $user_id = Yii::$app->user->id;
        $like = Image::find()->where('wistlist = 1 AND user_id=:user_id',['user_id'=>$user_id])->all();
        return $this->renderPartial('wistlist', ['like' => $like]);
    }
}
