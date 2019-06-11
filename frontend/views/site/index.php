<style>
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
    * {box-sizing: border-box;}

    .container {
        position: relative;

    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
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

    .container:hover .overlay {
        opacity: 1;
    }
</style>
<!--style="overflow-x: hidden;"-->
<body >
<span class="mdc-typography mdc-typography--heading6" style="padding-left: 10px;color: blue"><b>DANH SÁCH ẢNH</b></span>
<div class="row">

    <?php
    $pss = date_default_timezone_set('Asia/Ho_Chi_Minh');
    //$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
    foreach ($image as $key =>$value) {
        ?>
        <div class="column " style="padding: 5px">
            <span class="mdc-typography--subtitle2"><?php
                echo $value["date_create"]." ".$value["location"];
                ?></span>
            <a href="<?php echo Yii::$app->homeUrl . "image/detail?id=".$value["image_id"]?>">
                <div class="container">
                    <img src="<?php echo Yii::$app->homeUrl."frontend/web/".$value["path_image"]?>" class="image">
                    <div class="overlay">
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

<script>
    const checkbox = new MDCCheckbox(document.querySelector('.mdc-checkbox'));
    const formField = new MDCFormField(document.querySelector('.mdc-form-field'));
    formField.input = checkbox;
</script>
</body>