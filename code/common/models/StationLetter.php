<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "station_letter".
 *
 * @property integer $id
 * @property integer $from_uid
 * @property integer $to_uid
 * @property integer $pid
 * @property string $content
 * @property string $url
 * @property integer $type
 * @property integer $status
 * @property integer $sum
 * @property integer $addtime
 * @property integer $updatetime
 */
class StationLetter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station_letter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_uid', 'to_uid', 'pid', 'type', 'status', 'sum', 'addtime', 'updatetime'], 'integer'],
            [['content', 'url'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from_uid' => Yii::t('app', '发送人'),
            'to_uid' => Yii::t('app', '接收人'),
            'pid' => Yii::t('app', '父id，默认0为原邮件'),
            'content' => Yii::t('app', '内容'),
            'url' => Yii::t('app', '来源地址'),
            'type' => Yii::t('app', '消息类别0私信1系统消息'),
            'status' => Yii::t('app', '0未读1已读2已回复'),
            'sum' => Yii::t('app', '返回邮件数'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
