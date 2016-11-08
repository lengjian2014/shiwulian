<?php

namespace common\models\goods;

use Yii;

/**
 * This is the model class for table "goods_tags".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property integer $tags_id
 */
class GoodsTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'tags_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'goods_id' => Yii::t('app', '产品id'),
            'tags_id' => Yii::t('app', '标签表id'),
        ];
    }
}
