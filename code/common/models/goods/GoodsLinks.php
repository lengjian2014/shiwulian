<?php

namespace common\models\goods;

use Yii;

/**
 * This is the model class for table "goods_links".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property string $title
 * @property string $url
 * @property integer $addtime
 * @property integer $updatetime
 */
class GoodsLinks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_links';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id'], 'required'],
            [['goods_id', 'addtime', 'updatetime'], 'integer'],
            [['title', 'url'], 'string', 'max' => 250],
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
            'title' => Yii::t('app', '链接题目'),
            'url' => Yii::t('app', '链接地址'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
