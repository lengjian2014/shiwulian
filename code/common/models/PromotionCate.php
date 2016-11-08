<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promotion_cate".
 *
 * @property integer $id
 * @property integer $classify_id
 * @property integer $type
 * @property string $name
 * @property integer $status
 */
class PromotionCate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promotion_cate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classify_id', 'type', 'status'], 'integer'],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'classify_id' => Yii::t('app', '分类'),
            'type' => Yii::t('app', '推广位类型0文章1图片2轮播图'),
            'name' => Yii::t('app', '广告位名称'),
            'status' => Yii::t('app', '0关闭1显示'),
        ];
    }
}
