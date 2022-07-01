<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property string|null $import_time
 * @property string|null $created_at
 * @property int|null $created_by
 *
 * @property ImportData[] $importDatas
 */
class History extends \yii\db\ActiveRecord
{
    public $file;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'import_time',
                'updatedAtAttribute' => 'created_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['import_time', 'created_at'], 'safe'],
            [['created_by'], 'integer'],
            [['file'], 'file', 'extensions' => ['xls', 'xlsx']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'Excel файл',
            'import_time' => 'Дата и время импорта',
            'created_at' => 'Время импорта',
            'created_by' => 'Импортировал',
        ];
    }

    /**
     * Gets query for [[ImportDatas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImportDatas()
    {
        return $this->hasMany(ImportData::className(), ['history_id' => 'id']);
    }
}
