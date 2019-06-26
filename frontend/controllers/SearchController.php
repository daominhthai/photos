<?php

namespace frontend\controllers;
use frontend\models\Album;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
}

?>
