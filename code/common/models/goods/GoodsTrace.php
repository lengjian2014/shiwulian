<?php

namespace common\models\goods;

use Yii;

/**
 * This is the model class for table "goods_trace".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $series_id
 * @property string $gps
 * @property integer $addtime
 */
class GoodsTrace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_trace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'goods_id', 'series_id', 'addtime'], 'integer'],
            [['gps'], 'string', 'max' => 250],
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
            'series_id' => Yii::t('app', '系列id'),
            'gps' => Yii::t('app', '追溯人gps，用于统计'),
            'addtime' => Yii::t('app', 'Addtime'),
        ];
    }
}
