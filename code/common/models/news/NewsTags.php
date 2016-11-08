<?php

namespace common\models\news;

use Yii;

/**
 * This is the model class for table "news_tags".
 *
 * @property integer $id
 * @property integer $news_id
 * @property integer $tags_id
 */
class NewsTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'tags_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'news_id' => Yii::t('app', '资讯id'),
            'tags_id' => Yii::t('app', '标签id'),
        ];
    }
}
