<?php
/**
 * Description of FinanceContractor
 *
 * @author ramon
 */
class NqContractor extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'nq_contractor';
    }
    
    public function relations(){
        return array(
            'tax' => array (self::BELONGS_TO, 'FinanceTax', 'ApplicableTaxId'),
            'parent' => array (self::BELONGS_TO, 'NqContractor', 'ParentContractorId'),
        );
    }
}

?>