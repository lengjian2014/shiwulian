<?php

namespace common\models\user;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $role
 * @property integer $type
 * @property string $number
 * @property string $content
 * @property string $picture
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'role', 'type', 'status', 'addtime', 'updatetime'], 'integer'],
            [['number'], 'string', 'max' => 150],
            [['content'], 'string', 'max' => 250],
            [['picture'], 'string', 'max' => 500],
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
            'role' => Yii::t('app', '角色类别'),
            'type' => Yii::t('app', '认证证件类型'),
            'number' => Yii::t('app', '证件编号'),
            'content' => Yii::t('app', '认证内容'),
            'picture' => Yii::t('app', '证件照片'),
            'status' => Yii::t('app', '审核，0未审核1通过2未通过'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
