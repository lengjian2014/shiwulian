<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dynamic_tags".
 *
 * @property integer $id
 * @property integer $dynamic_id
 * @property integer $tags_id
 */
class DynamicTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dynamic_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dynamic_id', 'tags_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dynamic_id' => Yii::t('app', 'Dynamic ID'),
            'tags_id' => Yii::t('app', 'Tags ID'),
        ];
    }
}
