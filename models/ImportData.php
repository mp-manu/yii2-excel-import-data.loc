<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "import_data".
 *
 * @property int $id
 * @property int $history_id
 * @property string $city
 * @property string|null $lat
 * @property string|null $lng
 * @property int|null $lighting
 * @property string|null $size
 * @property string|null $side_type
 * @property string|null $side
 * @property string|null $price_type
 * @property float|null $price_accommodation
 * @property string|null $nds_accommodation
 * @property string|null $kvant_accommodation
 * @property int|null $impression_per_day
 *
 * @property History $history
 */
class ImportData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'import_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['history_id', 'city'], 'required'],
            [['history_id', 'lighting', 'impression_per_day'], 'integer'],
            [['price_accommodation'], 'number'],
            [['city', 'lat', 'lng', 'size', 'side_type', 'side', 'price_type', 'nds_accommodation', 'kvant_accommodation'], 'string', 'max' => 255],
            [['history_id'], 'exist', 'skipOnError' => true, 'targetClass' => History::className(), 'targetAttribute' => ['history_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'history_id' => 'История',
            'city' => 'ГОРОД',
            'lat' => 'ШИРОТА',
            'lng' => 'ДОЛГОТА',
            'lighting' => 'ОСВЕЩЕНИЕ',
            'size' => 'ТИПОРАЗМЕР',
            'side_type' => 'ТИП СТОРОНЫ',
            'side' => 'СТОРОНА',
            'price_type' => 'ВИД ЦЕНЫ',
            'price_accommodation' => 'ПРАЙС РАЗМЕЩЕНИЕ',
            'nds_accommodation' => 'НДС РАЗМЕЩЕНИЕ',
            'kvant_accommodation' => 'КВАНТ РАЗМЕЩЕНИЯ',
            'impression_per_day' => 'ПОКАЗОВ В СУТКИ',
        ];
    }

    /**
     * Gets query for [[History]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistory()
    {
        return $this->hasOne(History::className(), ['id' => 'history_id']);
    }

    public static function addItem($history_id, $item){
        if(!empty($item) && !empty($history_id)){

            $importData = new ImportData();
            $importData->history_id = $history_id;
            $importData->city = $item['ГОРОД'];
            $importData->lat = $item['ШИРОТА'];
            $importData->lng =$item['ДОЛГОТА'];
            $importData->lighting = ($item['ОСВЕЩЕНИЕ']=='Да') ? 1 : 0;
            $importData->size = $item['ТИПОРАЗМЕР'];
            $importData->side_type = $item['ТИП СТОРОНЫ'];
            $importData->side = $item['СТОРОНА'];
            $importData->price_type = $item['ВИД ЦЕНЫ'];
            $importData->price_accommodation = $item['ПРАЙС РАЗМЕЩЕНИЕ'];
            $importData->nds_accommodation = $item['НДС РАЗМЕЩЕНИЕ'];
            $importData->kvant_accommodation = $item['КВАНТ РАЗМЕЩЕНИЯ'];
            $importData->impression_per_day = $item['ПОКАЗОВ В СУТКИ'];
            $importData->save();

            return true;
        }else{
            return false;
        }
    }
}
