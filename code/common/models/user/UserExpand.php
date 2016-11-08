<?php

namespace common\models\user;
use Yii;

/**
 * This is the model class for table "user_expand".
 *
 * @property integer $uid
 * @property string $nickname
 * @property string $photo
 * @property integer $gender
 * @property integer $birthday
 * @property integer $hometown
 * @property string $telephone
 * @property string $qq
 * @property integer $province
 * @property integer $city
 * @property integer $county
 * @property string $address
 * @property integer $validemail
 * @property integer $validmobile
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserExpand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_expand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'gender', 'birthday', 'hometown', 'province', 'city', 'county', 'validemail', 'validmobile', 'addtime', 'updatetime'], 'integer'],
            [['nickname', 'photo', 'address'], 'string', 'max' => 250],
            [['telephone'], 'string', 'max' => 30],
            [['qq'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('app', 'Uid'),
            'nickname' => Yii::t('app', '昵称'),
            'photo' => Yii::t('app', '头像'),
            'gender' => Yii::t('app', '性别0男1女'),
            'birthday' => Yii::t('app', '出生年月'),
            'hometown' => Yii::t('app', '籍贯'),
            'telephone' => Yii::t('app', '电话'),
            'qq' => Yii::t('app', 'Qq'),
            'province' => Yii::t('app', '省'),
            'city' => Yii::t('app', '市'),
            'county' => Yii::t('app', '县、区'),
            'address' => Yii::t('app', '联系地址'),
            'validemail' => Yii::t('app', '邮箱是否有效，0没有1有效'),
            'validmobile' => Yii::t('app', '手机是否有效'),
            'addtime' => Yii::t('app', '添加时间'),
            'updatetime' => Yii::t('app', '更新时间'),
        ];
    }
}
