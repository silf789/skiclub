<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property integer $id
 * @property string $album
 * @property string $ref
 *
 * @property Albums $album0
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album', 'ref'], 'required'],
            [['ref'], 'string'],
            [['album'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'album' => Yii::t('app', 'Album'),
            'ref' => Yii::t('app', 'Ref'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum0()
    {
        return $this->hasOne(Albums::className(), ['name' => 'album']);
    }
}
