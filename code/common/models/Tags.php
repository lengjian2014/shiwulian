<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $title
 * @property integer $classify_id
 * @property integer $uid
 * @property integer $count
 * @property integer $heat
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classify_id', 'uid', 'count', 'heat'], 'integer'],
            [['title'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', '标签'),
            'classify_id' => Yii::t('app', '所属分类'),
            'uid' => Yii::t('app', '所属会员'),
            'count' => Yii::t('app', '使用次数'),
            'heat' => Yii::t('app', '热度，搜索次数'),
        ];
    }
}
