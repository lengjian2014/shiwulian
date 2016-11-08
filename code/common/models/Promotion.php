<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property integer $id
 * @property integer $cate_id
 * @property string $title
 * @property string $description
 * @property string $picture
 * @property integer $published
 * @property integer $sort
 * @property string $style
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_id', 'published', 'sort'], 'integer'],
            [['description'], 'string'],
            [['title', 'picture', 'style'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cate_id' => Yii::t('app', '广告位'),
            'title' => Yii::t('app', '标题'),
            'description' => Yii::t('app', '描述'),
            'picture' => Yii::t('app', '图片'),
            'published' => Yii::t('app', '发布时间'),
            'sort' => Yii::t('app', '排序'),
            'style' => Yii::t('app', '样式'),
        ];
    }
}
