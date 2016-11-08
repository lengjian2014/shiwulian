<?php

namespace common\models\goods;

use Yii;

/**
 * This is the model class for table "goods_evaluate".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $real
 * @property integer $fresh
 * @property integer $satisfied
 * @property integer $taste
 * @property integer $package
 * @property integer $addtime
 */
class GoodsEvaluate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_evaluate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'goods_id', 'real', 'fresh', 'satisfied', 'taste', 'package', 'addtime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', '评分人'),
            'goods_id' => Yii::t('app', '产品id'),
            'real' => Yii::t('app', '真实度'),
            'fresh' => Yii::t('app', '新鲜值'),
            'satisfied' => Yii::t('app', '满意度'),
            'taste' => Yii::t('app', '口感'),
            'package' => Yii::t('app', '包装'),
            'addtime' => Yii::t('app', 'Addtime'),
        ];
    }
}
