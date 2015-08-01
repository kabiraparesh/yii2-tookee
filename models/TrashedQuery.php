<?php

namespace vendor\kabira\tookee\models;

/**
 * This is the ActiveQuery class for [[Trashed]].
 *
 * @see Trashed
 */
class TrashedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Trashed[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Trashed|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}