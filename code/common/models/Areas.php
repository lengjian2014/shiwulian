<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "areas".
 *
 * @property string $id
 * @property string $pid
 * @property string $name
 * @property string $sort
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'name'], 'required'],
            [['pid', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pid' => Yii::t('app', '上一级的id值'),
            'name' => Yii::t('app', '地区名称'),
            'sort' => Yii::t('app', '排序'),
        ];
    }
}
