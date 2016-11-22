<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%data}}".
 *
 * @property integer $id
 * @property integer $classify_id
 * @property string $title
 * @property string $url
 * @property string $tags
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classify_id'], 'integer'],
            [['title', 'url', 'tags'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'classify_id' => Yii::t('app', 'Classify ID'),
            'title' => Yii::t('app', 'Title'),
            'url' => Yii::t('app', 'Url'),
            'tags' => Yii::t('app', 'Tags'),
        ];
    }
}
