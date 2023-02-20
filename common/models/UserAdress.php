<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_addresses}}".
 *
 * @property int $id
 * @property int $us_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string|null $zipcode
 *
 * @property User $us
 */
class UserAdress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_addresses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['us_id', 'address', 'city', 'state', 'country'], 'required'],
            [['us_id'], 'integer'],
            [['address', 'city', 'state', 'country', 'zipcode'], 'string', 'max' => 255],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['us_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'us_id' => 'Us ID',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zipcode' => 'Zipcode',
        ];
    }

    /**
     * Gets query for [[Us]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUs()
    {
        return $this->hasOne(User::class, ['id' => 'us_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UserAdressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserAdressQuery(get_called_class());
    }
}
