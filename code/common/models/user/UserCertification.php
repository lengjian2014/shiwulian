<?php

namespace common\models\user;

use Yii;

/**
 * This is the model class for table "user_certification".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $type
 * @property string $name
 * @property integer $category
 * @property string $number
 * @property string $picture
 * @property integer $status
 * @property integer $admin_id
 * @property string $reason
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserCertification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_certification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'type', 'category', 'status', 'admin_id', 'addtime', 'updatetime'], 'integer'],
            [['name', 'reason'], 'string', 'max' => 250],
            [['number'], 'string', 'max' => 50],
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
            'type' => Yii::t('app', '认证方式0个人认证1企业认证2监管认证'),
            'name' => Yii::t('app', '名称'),
            'category' => Yii::t('app', '证件类别'),
            'number' => Yii::t('app', '证件号'),
            'picture' => Yii::t('app', '证件图'),
            'status' => Yii::t('app', '状态0未审核1通过2未通过'),
            'admin_id' => Yii::t('app', '管理员id'),
            'reason' => Yii::t('app', '未通过原因'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
