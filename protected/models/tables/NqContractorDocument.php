<?php
/**
 * Description of FinanceContractorDocument
 *
 * @author ramon
 */
class NqContractorDocument  extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    public function relations(){
        return array(
                'documentType' => array (self::BELONGS_TO, 'NqContractorDocumentType', 'TypeId'),
                'uploadedBy' => array (self::BELONGS_TO, 'Login', 'UploadedBy'),
        );
    }

    public function tableName()
    {
        return 'nq_contractor_document';
    }
}
