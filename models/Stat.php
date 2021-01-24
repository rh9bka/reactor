<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stats".
 *
 * @property int $id
 * @property int $urlID
 * @property int $created_at
 * @property int $userID
 * @property string $userIP
 * @property string|null $userAgent
 *
 * @property Url $url
 */
class Stat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urlID', 'created_at', 'userIP'], 'required'],
            [['urlID', 'created_at', 'userID'], 'integer'],
            [['userAgent'], 'string'],
            [['userIP'], 'string', 'max' => 39],
            [['urlID'], 'exist', 'skipOnError' => true, 'targetClass' => Url::className(), 'targetAttribute' => ['urlID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'urlID' => Yii::t('app', 'Url ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'userID' => Yii::t('app', 'User ID'),
            'userIP' => Yii::t('app', 'User Ip'),
            'userAgent' => Yii::t('app', 'User Agent'),
        ];
    }

    /**
     * Gets query for [[Url]].
     *
     * @return \yii\db\ActiveQuery|UrlQuery
     */
    public function getUrl()
    {
        return $this->hasOne(Url::className(), ['id' => 'urlID']);
    }

    public static function add(Url $url){
        $s = new self();
        $s->urlID = $url->id;
        $s->created_at = time();
        $s->userID = (int)Yii::$app->user->id;
        $s->userAgent = Yii::$app->request->userAgent;
        $s->userIP = Yii::$app->request->userIP;
        try {
            $s->save();
        }catch (\Exception $exception){
            Yii::$app->session->addFlash('error','Ошибки добавления статистики: '.print_r($s->getErrors(),true));
        }
    }

    /**
     * {@inheritdoc}
     * @return StatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatQuery(get_called_class());
    }
}
