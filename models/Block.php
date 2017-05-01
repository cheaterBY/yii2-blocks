<?php

namespace profitcode\blocks\models;

use Yii;

/**
 * This is the model class for table "{{%block}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $content
 * @property integer $format
 * @property integer $active
 * @property integer $created_at
 * @property integer $updated_at
 */
class Block extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%block}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'format'], 'required'],
            [['content'], 'string'],
            [['format', 'active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('blocks', 'ID'),
            'name' => Yii::t('blocks', 'Name'),
            'title' => Yii::t('blocks', 'Title'),
            'content' => Yii::t('blocks', 'Content'),
            'format' => Yii::t('blocks', 'Format'),
            'active' => Yii::t('blocks', 'Active'),
            'created_at' => Yii::t('blocks', 'Created at'),
            'updated_at' => Yii::t('blocks', 'Updated at'),
        ];
    }

    /**
     * @inheritdoc
     * @return BlockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlockQuery(get_called_class());
    }
}
