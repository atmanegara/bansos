<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\crud\models\RefProv]].
 *
 * @see \app\modules\crud\models\RefProv
 */
class RefProvQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\crud\models\RefProv[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\crud\models\RefProv|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
