<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "classify".
 *
 * @property integer $id
 * @property string $title
 * @property integer $pid
 * @property string $describe
 * @property integer $order
 */
class Classify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'order'], 'integer'],
            [['title', 'describe'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', '分类名称'),
            'pid' => Yii::t('app', '父分类id'),
            'describe' => Yii::t('app', '描述'),
            'order' => Yii::t('app', '排序'),
        ];
    }
}
