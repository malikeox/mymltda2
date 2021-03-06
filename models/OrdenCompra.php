<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_compra".
 *
 * @property integer $ORC_ID
 * @property integer $PROV_ID
 * @property integer $ORC_NUMERO_ORDEN
 * @property string $ORC_FECHA_PEDIDO
 * @property string $ORC_FECHA_PAGO
 * @property string $ORC_DESCRIPCION
 * @property integer $ORC_COSTO_ENVIO
 * @property integer $ORC_COSTO_TOTAL
 * @property string $ORC_ESTADO
 *
 * @property MatOrcAdquirido[] $matOrcAdquiridos
 * @property Proveedor $pROV
 */
class OrdenCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orden_compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROV_ID', 'OT_ID'], 'required'],
            [['PROV_ID', 'OT_ID', 'ORC_NUMERO_ORDEN', 'ORC_COSTO_ENVIO', 'ORC_COSTO_TOTAL'], 'integer'],
            [['ORC_FECHA_PEDIDO', 'ORC_FECHA_PAGO'], 'safe'],
            [['ORC_ESTADO'], 'string', 'max' => 20],
            [['ORC_DESCRIPCION'], 'string'],
            [['OT_ID'], 'exist', 'skipOnError' => true, 'targetClass' => OrdenTrabajo::className(), 'targetAttribute' => ['OT_ID' => 'OT_ID']],
            [['PROV_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['PROV_ID' => 'PROV_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ORC_ID' => 'Orc  ID',
            'OT_ID' => 'Orden de Trabajo',
            'PROV_ID' => 'Proveedor',
            'ORC_NUMERO_ORDEN' => 'Numero de Orden',
            'ORC_FECHA_PEDIDO' => 'Fecha de Pedido',
            'ORC_FECHA_PAGO' => 'Fecha de Pago',
            'ORC_DESCRIPCION' => 'Descripción',
            'ORC_COSTO_ENVIO' => 'Costo de Envio',
            'ORC_COSTO_TOTAL' => 'Costo Total',
            'ORC_ESTADO' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatOrcAdquiridos()
    {
        return $this->hasMany(MatOrcAdquirido::className(), ['ORC_ID' => 'ORC_ID']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getOT() 
    { 
       return $this->hasOne(OrdenTrabajo::className(), ['OT_ID' => 'OT_ID']); 
    } 
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPROV()
    {
        return $this->hasOne(Proveedor::className(), ['PROV_ID' => 'PROV_ID']);
    }
}
