<?php
/**
 * Description of FinanceContractorDetails
 *
 * @author ramon
 */
class NqContractorDetails extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'nq_contractor_details';
    }
}

?>