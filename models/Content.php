<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property string $date
 * @property string $cathegory
 * @property string $title
 * @property string $text
 * @property string $metad
 * @property string $metak
 * @property integer $id
 *
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'cathegory', 'title', 'text', 'metad', 'metak'], 'required'],
            [['date'], 'safe'],
            [['text', 'metad', 'metak'], 'string'],
            [['cathegory', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'date' => Yii::t('app', 'Date'),
            'cathegory' => Yii::t('app', 'Cathegory'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'metad' => Yii::t('app', 'Metad'),
            'metak' => Yii::t('app', 'Metak'),
            'id' => Yii::t('app', 'ID'),
        ];
    }

}
