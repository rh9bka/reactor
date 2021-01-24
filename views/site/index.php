<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $urlForm app\models\UrlForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $url \app\models\Url */

$this->title = 'Минимизатор URL';
?>
<div class="site-index">

    <div class="jumbotron">
        <?php if($url instanceof \app\models\Url){ ?>
            <h1>Ваша ссылка</h1>
            <p class="lead"><?=$url->getLink()?></p>
        <?php }else{ ?>
            <h1>Добро пожаловать!</h1>
            <p class="lead">Мы сервис по минимизации URL.</p>
        <?php } ?>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6">
                <h2>Добавьте URL</h2>
                <?=$this->render('/url/_form',['model'=>$urlForm])?>
            </div>
            <div class="col-lg-6">
                <h2>Последние 5 URLs: </h2>
                <?php if (empty($lastUrls)) { ?>
                    <p class="lead">Еще нет Urls!</p>
                <?php }else{ ?>
                    <div class="list-group">
                    <?php foreach ($lastUrls as $lastUrl){
                        /* @var $lastUrl \app\models\Url*/
                        ?>
                        <a href="<?=$lastUrl->getLink()?>" target="_blank" class="list-group-item list-group-item-action"><?=$lastUrl->minUrl?></a>
                    <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
