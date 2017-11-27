<?php
/**
 * Description of FinanceContractorDocumentsForm
 *
 * @author ramon
 */
class NqprmContractorDocumentsForm extends CFormModel
{
    public $contractorId;
    public $comments;
    public $fileToUpload;
    public $type;
    
    public function rules()
    {
        return array(
            array('fileToUpload, type', 'required'),
            //array('fileToUpload', 'file', 'types'=>'pdf, tiff'),
        );
    }
    
    public function saveFile()
    {
        $this->fileToUpload = CUploadedFile::getInstance($this, 'fileToUpload');
        $fileName = '_uploads/contractors-nq/'.date('Ymd-Hi').'-'.$this->contractorId.'-';
        $fileName .= $this->fileToUpload->getName();
        $this->fileToUpload->saveAs($fileName);
        
        $newFile = new NqContractorDocument();
        $newFile->ContractorId = $this->contractorId;
        $newFile->TypeId = $this->type;
        $newFile->FileName = $fileName;
        $newFile->Comments = $this->comments;
        $newFile->UploadedBy = Yii::app()->user->loginId;
        $newFile->UploadedDate = new CDbExpression('NOW()');
        $newFile->save();
    }
    
    public function getDocumentList()
    {
        return NqContractorDocument::model()->with('documentType','uploadedBy')->findAll(array(
            'alias' => 'doc',
            'condition' => 'ContractorId = :cid and deleteStatus=0',
            'params' => array(':cid' => $this->contractorId),
            'order' => 'doc.Id DESC'
        ));
    }
    
    public function getTypeOptions()
    {
        $all = NqContractorDocumentType::model()->findAll(array(
            'condition' => 'IsLive = 1',
            'order' => 'Description ASC'
        ));
        $result = array();
        foreach ($all as $i)
            $result[$i->Id] = $i->Description;
        return $result;
    }
}
