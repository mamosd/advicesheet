<?php
/**
 * Description of FinanceContractorDocumentType
 *
 * @author ramon
 */
class NqContractorDocumentType  extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'nq_contractor_document_type';
    }
}
