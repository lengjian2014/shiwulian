<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $company
 * @property string $logo
 * @property string $introduction
 * @property string $website
 * @property string $address
 * @property string $gps
 * @property string $code
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property integer $addtime
 * @property integer $updatetime
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'addtime', 'updatetime'], 'integer'],
            [['introduction'], 'string'],
            [['company', 'logo', 'website', 'address'], 'string', 'max' => 250],
            [['gps', 'email'], 'string', 'max' => 150],
            [['code'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [['mobile'], 'string', 'max' => 20],
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
            'company' => Yii::t('app', '公司名称'),
            'logo' => Yii::t('app', '商标'),
            'introduction' => Yii::t('app', '公司简介'),
            'website' => Yii::t('app', '公司官网'),
            'address' => Yii::t('app', '公司地址'),
            'gps' => Yii::t('app', '公司所在地GPS'),
            'code' => Yii::t('app', '邮政编码'),
            'phone' => Yii::t('app', '电话'),
            'mobile' => Yii::t('app', '手机'),
            'email' => Yii::t('app', '邮箱'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
