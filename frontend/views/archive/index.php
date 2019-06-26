<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\headerdetailWidget;
use yii\widgets\ActiveForm;
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
    <link rel="stylesheet" href="<?php echo Yii::$app->homeUrl?>css/style.css">
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
            text-align: left;
            margin: 200px auto;
        }

        /*nút thêm ảnh*/

        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 100;
            top: 0;
            left: 0;
            background-color: black;
            background-color: #FFFFFF;
            overflow-x: hidden;
            transition: 0.5s;

        }

        .overlay-content {
            position: relative;
            width: 100%;        }

        .overlay a {
            text-decoration: none;
            font-size: 36px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .overlay a:hover, .overlay a:focus {
            color: black;
        }

        @media screen and (max-height: 450px) {
            .overlay a {
                font-size: 20px
            }
        }

        .overlay1 {
            position: absolute;
            top: 0;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.2);
            color: #f1f1f1;
            width: 100%;
            transition: .5s ease;
            opacity: 0;
            color: white;
            font-size: 20px;
            padding: 1%;
            text-align: left;
        }

        .container:hover .overlay1 {
            opacity: 1;
        }
        .contents{
            position: absolute;
            top: 20px;
            right: 45px;
        }
        .mdc-layout-grid__cell--span-1{
            width: 10px;
        }
        .mdc-typography--headline6{
            margin-left: -50px;
        }
        .button-xong{
            margin-left: 22px;
        }
        .bottom-left {
          position: absolute;
          bottom: 8px;
          left: 16px;
          font-size: 20px;
          color: white;
        }
        :root {
            --mdc-theme-primary: blue;
            --mdc-theme-secondary: blue;
        }

    </style>
</head>
<body>
<?php $this->beginBody() ?>
<?php $form = ActiveForm::begin(['action'=>'archive/remove']); ?> 
<header class="mdc-top-app-bar mdc-top-app-bar--fixed" style="background-color: black">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a class="demo-menu material-icons mdc-top-app-bar__navigation-icon" onclick="toggleMenu()">close</a>
            <span class="mdc-top-app-bar__title">1 ảnh được chọn</span>  
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">
    
            
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">  
            <!-- <a class="material-icons mdc-top-app-bar__action-item" aria-label="Delete_forever" onclick="myFunctionDelete()">delete_forever</a> -->
            <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunctionDelete()">delete_outline</a>
            <button id="add-to-favorites wist"
                    type="submit"
                    name="history"
                    class="mdc-icon-button wist"
                    aria-label="Add to favorites"
                    aria-hidden="true"
                    aria-pressed="false">
                <i name="name" class="material-icons mdc-icon-button__icon">history</i>
            </button>
            <button id="add-to-favorites wist"
                    type="submit"
                    name="download"
                    class="mdc-icon-button wist"
                    aria-label="Add to favorites"
                    aria-hidden="true"
                    aria-pressed="false">
                <i name="name" class="material-icons mdc-icon-button__icon">get_app</i>
            </button>
            <button id="add-to-favorites wist"
                    type="submit"
                    name="wistlist"
                    class="mdc-icon-button wist"
                    aria-label="Add to favorites"
                    aria-hidden="true"
                    aria-pressed="false">
                <i name="name" class="material-icons mdc-icon-button__icon">star_border</i>
            </button>
            <!-- <a class="material-icons mdc-top-app-bar__action-item" aria-label="User" onclick="myFunction()">more_vert</a> -->
        </section>
    </div>
</header>

<div class="content">
    <div class="row">    
        <?php foreach ($archive as $key => $value): ?>
            <div class="column " style="padding: 5px">
                <span class="mdc-typography--subtitle2">
                    <?php
                        echo $value["date_create"]." ".$value["location"];
                    ?>
                </span>
                <a href="<?php echo Yii::$app->homeUrl . "image/detail?id=".$value["image_id"]?>">
                    <div class="container">
                        <img class="image" src="<?php echo Yii::$app->homeUrl."frontend/web/".$value["path_image"]?>">
                        <div class="overlay1">
                            <div class="mdc-form-field" style="color: white">
                                <div class="mdc-checkbox">
                                    <input type="checkbox"
                                            name="select[]" 
                                            role="checkbox"
                                            value="<?php echo $value['image_id'] ?>" 
                                           class="mdc-checkbox__native-control"
                                           id="checkbox-1" onclick="toggleMenu()"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                             viewBox="0 0 24 24" stroke="white">
                                            <path class="mdc-checkbox__checkmark-path" fill="none"  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-left">
                                <?php 
                                    if ($value['wistlist'] == 1) {
                                ?>
                                    <i name="name" class="material-icons mdc-icon-button__icon">star_rate</i>
                                <?php
                                    }
                                ?>
                        </div>
                    </div>
                </a>
            </div>
            
        <?php endforeach ?>
    </div>   
</div>

<!--menu-->
<!-- <div class="mdc-menu mdc-menu1 mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Tải xuống </span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Yêu thích</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <span class="mdc-list-item__text">Chỉnh sửa ngày và giờ</span>
        </li>
    </ul>
</div> -->
<!-- menu delete -->
<div class="mdc-menu mdc-menu-delete mdc-menu-surface">
    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
        <li>
            <span class="mdc-typography mdc-typography--subtitle1" style="padding-left: 15px;">Bạn có muốn xóa hình ảnh này?</span>
        </li>
        <li class="mdc-list-item" role="menuitem">
            <button class="mdc-button" onclick="functionHuyDelete()">Hủy</button>
            <button class="mdc-button mdc-button--raised" type="submit" name="delete">
                Chuyển vào thùng rác
            </button>
        </li>
    </ul>
</div>
<?php ActiveForm::end(); ?>

<header class="mdc-top-app-bar mdc-top-app-bar--fixed" id="menu-box" style="display: block;">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a href="<?= Yii::$app->homeUrl ?>" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">keyboard_backspace</a>
            <span class="mdc-top-app-bar__title">Lưu trữ</span>  
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-content">
    
            
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">  
            <!-- <a class="material-icons mdc-top-app-bar__action-item" aria-label="Delete_forever" onclick="myFunctionDelete()">delete_forever</a> -->
            <button onclick="openNav()"  class="mdc-button mdc-button--raised" style="color: white; background-color: #651fff">Thêm ảnh</button>        
        </section>
    </div>
</header>
<!--cái sẽ hiện ra-->
 <?php $form = ActiveForm::begin(['action'=>'archive/add']); ?> 
<div id="myNav" class="overlay">
    <div class="header-add-luutru" style="height: 11%;background-color: blue;">
    <div class="mdc-layout-grid" style="color: white; margin-top: -10px;">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-1">
                <a href="javascript:void(0)" class="material-icons" style="font-size: 27px;color: white" onclick="closeNav()">close</a>
            </div>
            <div class="mdc-layout-grid__cell--span-10">
                <span class="mdc-typography--headline6">Chọn mục cần lưu trữ</span>
            </div>
            <div class="mdc-layout-grid__cell--span-1">
                <button class="mdc-button mdc-button--raised button-xong" type="submit" name="submitArchive" >Xong</button>
            </div>
           <!--  <div class="contents">
                <button class="mdc-button mdc-button--raised">Lưu</button>
            </div> -->
        </div>
    </div>
    </div>
    <div class="overlay-content" style="padding-left: 78px;padding-right: 78px">
        <div class="row">
          <?php
           foreach ($select as $key => $value) {
               ?>
                <div class="column " style="padding: 5px">
                <span class="mdc-typography--subtitle2"><?php
                   echo $value["date_create"] . " " . $value["location"];
                    ?></span>
                    <div class="container">
                        <img src="<?php echo Yii::$app->homeUrl . "frontend/web/" . $value["path_image"] ?>" class="image">
                     <div class="overlay1">
                            <div class="mdc-form-field" style="color: white">
                                <div class="mdc-checkbox">
                                    <input type="checkbox" name="addArchive[]" value="<?php echo $value['image_id'] ?>"
                                        class="mdc-checkbox__native-control"
                                          id="checkbox-1" style="color: white"/>
                                   <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                            viewBox="0 0 24 24">
                                          <path class="mdc-checkbox__checkmark-path" fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                       </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php
           }
            ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
<script>
    //menu header
    const MDCMenu = mdc.menu.MDCMenu;
        // const menu = new MDCMenu(document.querySelector('.mdc-menu1'));
        // menu.open = false;
        // menu.setAbsolutePosition(1330, 50);

        // function myFunction() {
        //     menu.open = !menu.open;
        // }

    //menu delete
    const menudelete = new MDCMenu(document.querySelector('.mdc-menu-delete'));
    menudelete.open = false;
    menudelete.setAbsolutePosition(1300, 50);

    function myFunctionDelete() {
        menudelete.open = !menudelete.open;
    }

    function functionHuyDelete() {
        menudelete.close = !menudelete.close;
    }

    
    const checkbox = new MDCCheckbox(document.querySelector('.mdc-checkbox'));
    const formField = new MDCFormField(document.querySelector('.mdc-form-field'));
    formField.input = checkbox;

    //
    function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
//menu hide
function toggleMenu() {
  var menuBox = document.getElementById('menu-box');    
  if(menuBox.style.display == "block") { // if is menuBox displayed, hide it
    menuBox.style.display = "none";
  }
  else { // if is menuBox hidden, display it
    menuBox.style.display = "block";
  }
}
</script>
<?php $this->endBody() ?>
</body>
</html>
