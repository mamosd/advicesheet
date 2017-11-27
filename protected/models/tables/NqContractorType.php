<?php
/**
 * Description of FinanceContractorType
 *
 * @author ramon
 */
class NqContractorType extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'nq_contractor_type';
    }
}

?>