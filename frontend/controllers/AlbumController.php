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
            return $this->render('index', ['albums' => $data, 'model' => $model]);
        }
    }

    public function actionAddnew(){
        $data = Image::find()
            ->where(['user_id'=>Yii::$app->user->id,'deleted'=>0])
            ->all();
        return $this->renderPartial('addnew',[
            'image'=>$data,
        ]);
    }

    public function actionWistlist(){
        $user_id = Yii::$app->user->id;
        $like = Image::find()->where('wistlist = 1 AND user_id=:user_id',['user_id'=>$user_id])->all();
        return $this->renderPartial('wistlist', ['like' => $like]);
    }
}
