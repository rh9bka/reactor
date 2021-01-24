<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Url */
/* @var $statDP \yii\data\ActiveDataProvider */

$this->title = 'Статистика для ссылки - '.$model->minUrl;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статистика'), 'url' => ['/stat']];
$this->params['breadcrumbs'][] = $model->minUrl;
\yii\web\YiiAsset::register($this);
?>
<div class="url-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'minUrl',
            'fullUrl',
            [
                'attribute' => 'cntGo',
                'label' => 'Успешные переходы'
            ],
            [
                'attribute' => 'cntErr',
                'label' => 'Неуспешные переходы'
            ],
            [
                'attribute'=>'created_at',
                'label' => 'Создано',
                'value' => function(\app\models\Url $url){
                    return date("Y-m-d H:i",$url->created_at);
                }
            ],
            [
                'attribute'=>'expired_at',
                'label' => 'Истекает',
                'value' => function(\app\models\Url $url){
                    return date("Y-m-d H:i",$url->expired_at);
                }
            ],

            [
                'attribute'=>'userID',
                'label' => 'ID создателя',
                'value' => function(\app\models\Url $url){
                    return $url->userID > 0 ? $url->userID : 'Гость';
                }
            ],
        ],
    ]) ?>

    <h3>Подробная статистика</h3>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $statDP,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'userIP',
                'label' => 'User IP'
            ],
            [
                'attribute' => 'userAgent',
                'label' => 'User Agent'
            ],
            'userID',
            [
                'attribute' => 'created_at',
                'label' => 'Создано',
                'value' => function(\app\models\Stat $stat){
                    return date("Y-m-d H:i",$stat->created_at);
                }
            ],
        ],
    ]); ?>

</div>
