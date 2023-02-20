<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%oders}}".
 *
 * @property int $id
 * @property float $total_price
 * @property int $status
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $transaction_id
 * @property int $created_at
 * @property int|null $created_by
 */
class Oder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%oders}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_price', 'status', 'firstname', 'lastname', 'email', 'transaction_id', 'created_at'], 'required'],
            [['total_price'], 'number'],
            [['status', 'created_at', 'created_by'], 'integer'],
            [['firstname', 'lastname', 'email', 'transaction_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total_price' => 'Total Price',
            'status' => 'Status',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'transaction_id' => 'Transaction ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\OderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OderQuery(get_called_class());
    }
}
