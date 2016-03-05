<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cathegories".
 *
 * @property integer $id
 * @property string $name
 * @property string $rusname
 *
 * @property Content[] $contents
 */
class Cathegories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cathegories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'rusname'], 'required'],
            [['name', 'rusname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'rusname' => Yii::t('app', 'Rusname'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['cathegory' => 'name']);
    }
}
