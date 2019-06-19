<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\headerdetailWidget;

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl ?>css/style.css">
    <style>
        .content {
            padding-top: 65px;
            padding-left: 20px;
            padding-right: 20px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 0 4px;
        }

        /*/ Create four equal columns that sits next to each other /*/
        .column {
            -ms-flex: 25%;
            flex: 25%;
            max-width: 25%;
            padding: 0 4px;
        }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
        }

        /*/ Responsive layout - makes a two column-layout instead of four columns /*/
        @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
                float: left;
            }
        }

        /*/ Responsive layout - makes the two columns stack on top of each other instead of next to each other /*/
        @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        }

        * {
            box-sizing: border-box;
        }

        .container {
            position: relative;

        }

        .image {
            display: block;
            width: 100%;
            height: auto;
        }
        .container:hover .overlay {
            opacity: 1;
        }

        .chonanh {
            border-radius: 10px;
            text-align: center;
            margin: 200px auto;
        }

        /*nút thêm ảnh*/

        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: black;
            background-color: #FFFFFF;
            overflow-x: hidden;
            transition: 0.5s;
            z-index: 10000;

        }

        .overlay-content {
            position: relative;
            top: 15%;
            width: 100%;
        }

        .overlay a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: black;
            display: block;
            transition: 0.3s;
        }
    .overlay1 {
        position: absolute;
        top: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.2);
        color: #f1f1f1;
        width: 100%;
        transition: .5s ease;
        opacity:0;
        color: white;
        font-size: 20px;
        padding: 1%;
        text-align: left;
    }
        .overlay a:hover, .overlay a:focus {
            color: black;
        }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 40px;
        }

        @media screen and (max-height: 450px) {
            .overlay a {font-size: 20px}
            .overlay .closebtn {
                font-size: 40px;
                top: 15px;
                right: 35px;
            }
        }
        .container:hover .overlay1 {
            opacity: 1;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="app-bar">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a href="<?= Yii::$app->homeUrl ?>" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">keyboard_backspace</a>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">


        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
            <a class="material-icons mdc-top-app-bar__action-item" aria-label="ReDelete">share</a>
            <a class="material-icons mdc-top-app-bar__action-item" aria-label="ReDelete">more_vert</a>
        </section>
    </div>
</header>

<div class="content">
    <div class="mdc-text-field mdc-text-field--fullwidth" style="margin-top: 30px">
        <input class="mdc-text-field__input"
               type="text"
               placeholder="Thêm Tiêu Đề"
               aria-label="Thêm Tiêu Đề">
    </div>
    <!--    end input them tieu de-->
    <div class="chonanh">
        <button class="mdc-button">
            <i class="material-icons mdc-button__icon" aria-hidden="true">add</i>
            <span onclick="openNav()" class="mdc-button__label" style="color: black">Chọn ảnh</span>
        </button>
    </div>

</div>

<!--cái sẽ hiện ra-->
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <div class="row">
            <?php
            foreach ($image as $key =>$value) {
                ?>
                <div class="column " style="padding: 5px">
                <span class="mdc-typography--subtitle2"><?php
                    echo $value["date_create"]." ".$value["location"];
                    ?></span>
                        <div class="container">
                            <img src="<?php echo Yii::$app->homeUrl."frontend/web/".$value["path_image"]?>" class="image">
                            <div class="overlay1">
                                <div class="mdc-form-field" style="color: white">
                                    <div class="mdc-checkbox">
                                        <input type="checkbox"
                                               class="mdc-checkbox__native-control"
                                               id="checkbox-1" style="color: white" />
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark"
                                                 viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none"  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }

    const checkbox = new MDCCheckbox(document.querySelector('.mdc-checkbox'));
    const formField = new MDCFormField(document.querySelector('.mdc-form-field'));
    formField.input = checkbox;

</script>

<?php $this->endBody() ?>
</body>
</html>
