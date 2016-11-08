<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stores".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $body
 * @property string $title
 * @property string $summary
 * @property string $contacts
 * @property string $company
 * @property integer $type
 * @property string $credentials
 * @property string $apply
 * @property string $numbering
 * @property string $picture
 * @property string $logo
 * @property string $website
 * @property string $address
 * @property string $gps
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $zipcode
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class Stores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'body', 'type', 'status', 'addtime', 'updatetime'], 'integer'],
            [['title', 'company', 'credentials', 'numbering', 'picture', 'logo', 'website', 'address'], 'string', 'max' => 250],
            [['summary'], 'string', 'max' => 500],
            [['contacts', 'apply', 'gps', 'email'], 'string', 'max' => 150],
            [['phone', 'mobile', 'zipcode'], 'string', 'max' => 30],
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
            'body' => Yii::t('app', '店铺主体0个人1企业'),
            'title' => Yii::t('app', '店铺名称'),
            'summary' => Yii::t('app', '简介'),
            'contacts' => Yii::t('app', '联系人'),
            'company' => Yii::t('app', '公司名'),
            'type' => Yii::t('app', '证件类型'),
            'credentials' => Yii::t('app', '证件名'),
            'apply' => Yii::t('app', '申请人'),
            'numbering' => Yii::t('app', '证件编号'),
            'picture' => Yii::t('app', '证件照片'),
            'logo' => Yii::t('app', '企业logo'),
            'website' => Yii::t('app', '企业网址'),
            'address' => Yii::t('app', '地址'),
            'gps' => Yii::t('app', '地图定位'),
            'phone' => Yii::t('app', '固定电话'),
            'mobile' => Yii::t('app', '移动电话'),
            'email' => Yii::t('app', '邮箱'),
            'zipcode' => Yii::t('app', '邮编'),
            'status' => Yii::t('app', '状态0未审核1通过2未通过'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
