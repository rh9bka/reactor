<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UrlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Статистика');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'minUrl',
                'label' => 'Hash'
            ],
            [
                'attribute' => 'fullUrl',
                'label' => 'Url'
            ],
            'userID',
            [
                'attribute' => 'cntGo',
                'label' => 'Успешные переходы'
            ],
            [
                'attribute' => 'cntErr',
                'label' => 'Неуспешные переходы'
            ],
            [
                'attribute' => 'created_at',
                'label' => 'Создано',
                'value' => function(\app\models\Url $url){
                    return date("Y-m-d H:i",$url->created_at);
                }
            ],
            [
                'attribute' => 'expired_at',
                'label' => 'Истекает',
                'value' => function(\app\models\Url $url){
                    return date("Y-m-d H:i",$url->expired_at);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{stat}',
                'buttons' => [
                    'stat' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            \yii\helpers\Url::to(['stat/view','id'=>$model->minUrl]),
                            ['title'=>'Смотреть статистику']);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
