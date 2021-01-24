<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Urls]].
 *
 * @see Urls
 */
class UrlQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Url[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Url|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
