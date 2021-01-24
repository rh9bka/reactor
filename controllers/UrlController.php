<?php

namespace app\controllers;

use app\models\Stat;
use Yii;
use app\models\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class UrlController
 * @package app\controllers
 */
class UrlController extends Controller
{
    /**
     * Переход по ссылке или ошибка.
     * @return mixed
     */
    public function actionIndex($hash)
    {
        $url = Url::findOne(['minUrl'=>$hash]);
        if(!empty($url)){
            // add stat
            Stat::add($url);
            if($url->isExpired() === false) {
                $url->plusGo();
                return Yii::$app->response->redirect($url->fullUrl);
            }
            $url->plusErr();
        }
        throw new NotFoundHttpException("Такой ссылки не найдено или истек срок жизни");
    }
}
