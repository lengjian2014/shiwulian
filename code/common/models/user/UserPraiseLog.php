<?php

namespace common\models\user;

use Yii;

/**
 * This is the model class for table "user_praise_log".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $gid
 * @property string $did
 * @property integer $score
 * @property integer $addtime
 */
class UserPraiseLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_praise_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'gid', 'did', 'score', 'addtime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', 'Uid'),
            'gid' => Yii::t('app', '产品id'),
            'did' => Yii::t('app', '动态id'),
            'score' => Yii::t('app', 'Score'),
            'addtime' => Yii::t('app', 'Addtime'),
        ];
    }
}
