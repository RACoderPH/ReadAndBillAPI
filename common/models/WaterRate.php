<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "water_rate".
 *
 * @property int $id
 * @property string $code
 * @property string $size
 * @property int $mincm
 * @property float $minprice
 * @property int $blk1cm
 * @property float $blk1price
 * @property int $blk2cm
 * @property float $blk2price
 * @property int $blk3cm
 * @property float $blk3price
 * @property int $blk4cm
 * @property float $blk4price
 * @property int $blk5cm
 * @property float $blk5price
 * @property string|null $created_by
 * @property string $created_at
 * @property string|null $updated_by
 * @property string $updated_at
 */
class WaterRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'water_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'size', 'mincm', 'minprice', 'blk1cm', 'blk1price', 'blk2cm', 'blk2price', 'blk3cm', 'blk3price', 'blk4cm', 'blk4price', 'blk5cm', 'blk5price'], 'required'],
            [['mincm', 'blk1cm', 'blk2cm', 'blk3cm', 'blk4cm', 'blk5cm'], 'integer'],
            [['minprice', 'blk1price', 'blk2price', 'blk3price', 'blk4price', 'blk5price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['code', 'size'], 'string', 'max' => 15],
            [['created_by', 'updated_by'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'size' => 'Size',
            'mincm' => 'Mincm',
            'minprice' => 'Minprice',
            'blk1cm' => 'Blk1cm',
            'blk1price' => 'Blk1price',
            'blk2cm' => 'Blk2cm',
            'blk2price' => 'Blk2price',
            'blk3cm' => 'Blk3cm',
            'blk3price' => 'Blk3price',
            'blk4cm' => 'Blk4cm',
            'blk4price' => 'Blk4price',
            'blk5cm' => 'Blk5cm',
            'blk5price' => 'Blk5price',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
}
