<?php

namespace app\controllers;

use app\models\Stat;
use Yii;
use app\models\Url;
use app\models\UrlSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Class StatController
 * @package app\controllers
 */
class StatController extends Controller
{
    /**
     * Статистика.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UrlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Url model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $url =  $this->findModel($id);


        $query = Stat::find()->where(['urlID'=>$url->id]);

        $statDP = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('view', [
            'model' => $url,
            'statDP' => $statDP
        ]);
    }

    /**
     * Finds the Url model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Url the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($hash)
    {
        if (($model = Url::findOne(['minUrl'=>$hash])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
