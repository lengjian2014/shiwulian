<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dynamic".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $series_id
 * @property integer $classify_id
 * @property string $content
 * @property string $file
 * @property integer $scan
 * @property integer $like
 * @property integer $comment
 * @property string $address
 * @property string $gps
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class Dynamic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dynamic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'goods_id', 'series_id', 'classify_id', 'scan', 'like', 'comment', 'status', 'addtime', 'updatetime'], 'integer'],
            [['content', 'file'], 'string'],
            [['address', 'gps'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', '发布动态人'),
            'goods_id' => Yii::t('app', '动态所属产品'),
            'series_id' => Yii::t('app', '系列id'),
            'classify_id' => Yii::t('app', '动态类别'),
            'content' => Yii::t('app', '内容'),
            'file' => Yii::t('app', '文件，图片或音频'),
            'scan' => Yii::t('app', '浏览'),
            'like' => Yii::t('app', '点赞'),
            'comment' => Yii::t('app', '评论数'),
            'address' => Yii::t('app', '发布位置'),
            'gps' => Yii::t('app', 'gsp'),
            'status' => Yii::t('app', '状态'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
