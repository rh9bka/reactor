<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Stat]].
 *
 * @see Stat
 */
class StatQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Stat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Stat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
