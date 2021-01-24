<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class UrlForm
 * @package app\models
 */
class UrlForm extends Model
{
    public $url;
    public $expired;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // url and expired are both required
            [['url', 'expired'], 'required'],
            ['url', 'url'],
            ['url', 'string','min' => 9],
            // expired is validated by validatePassword()
            ['expired', 'time',
                'min' => time()+3600,
                'timestampAttribute' => 'expired',
                'format' => 'php:Y-m-d H:i',
                'tooSmall' => Yii::t('app',$this->attributeLabels()['expired'].' должна быть больше '.date("Y-m-d H:i",(time()+3600)))
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'expired' => Yii::t('app', 'Дата окончания срока жизни'),
            'url' => Yii::t('app', 'Ссылка'),
        ];
    }

    /**
     * @return Url|bool
     */
    public function save()
    {
        if ($this->validate()) {
            $u = new Url();
            $u->fullUrl = $this->url;
            $u->minUrl = Url::getHash($this->url);
            $u->created_at = time();
            $u->expired_at = $this->expired;
            $u->userID = (int)Yii::$app->user->id;
            if($u->save()) {
                return $u;
            }else{
                $err = $u->getErrors();
                $this->addError('url',array_shift($err)[0]);
            }
        }
        return false;
    }
}
