<?php

namespace common\models\goods;

use Yii;

/**
 * This is the model class for table "goods_series".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property string $number
 * @property integer $starttime
 * @property integer $endtime
 * @property integer $addtime
 * @property integer $updatetime
 */
class GoodsSeries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_series';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'goods_id', 'starttime', 'endtime', 'addtime', 'updatetime'], 'integer'],
            [['goods_id'], 'required'],
            [['number'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', 'Uid'),
            'goods_id' => Yii::t('app', '产品id'),
            'number' => Yii::t('app', '系列编号'),
            'starttime' => Yii::t('app', '开始时间'),
            'endtime' => Yii::t('app', '结束时间'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
