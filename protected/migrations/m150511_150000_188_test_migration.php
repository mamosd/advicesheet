<?php

class m150511_150000_188_test_migration extends CDbMigration
{
	public function up()
	{
		$this->createTable('nq_contractor', array('ContractorId'=>'pk',
														'Code'=>'varchar(50) not null',
														'FirstName'=>'varchar(100) not null',
														'LastName'=>'varchar(100) not null',
														'ContractorTypeId'=>'int(11) not null',
														'IsLive'=>'tinyint(4) not null DEFAULT 1',
														'AccountNumber'=>'varchar(50) DEFAULT NULL',
														'Data'=>'varchar(50) DEFAULT null',
														'ApplicableTaxId'=>'int(11) not null DEFAULT 2',
														'Email'=>'varchar(100) DEFAULT NULL',
														'ParentContractorId'=>'int(11) DEFAULT NULL',
														'TelephoneNumber'=>'varchar(50) DEFAULT NULL',
														'VehicleRegNo01'=>'varchar(50) DEFAULT NULL',
														'MOTExpiryDate01'=>'date DEFAULT NULL',
														'InsExpiryDate01'=>'date DEFAULT NULL',
														'Comments01'=>'varchar(200) DEFAULT NULL',
														'VehicleRegNo02'=>'varchar(50) DEFAULT NULL',
														'MOTExpiryDate02'=>'date DEFAULT NULL',
														'InsExpiryDate02'=>'date DEFAULT NULL',
														'Comments02'=>'varchar(200) DEFAULT NULL',
														'VehicleRegNo03'=>'varchar(50) DEFAULT NULL',
														'MOTExpiryDate03'=>'date DEFAULT NULL',
														'InsExpiryDate03'=>'date DEFAULT NULL',
														'Comments03'=>'varchar(200) DEFAULT NULL',
														'ContractStartDate'=>'date DEFAULT NULL',
														'ContractFinishDate'=>'date DEFAULT NULL',
														'PassIssueDate'=>'date DEFAULT NULL',
														'PassCancelDate'=>'date DEFAULT NULL',
														'PassCancelBy'=>'varchar(50) DEFAULT NULL',
														'ImmigrationStatus'=>'varchar(50) DEFAULT NULL',
														'IDType'=>'varchar(50) DEFAULT NULL',
														'IDNumber'=>'varchar(50) DEFAULT NULL',
														'IDExpiryDate'=>'date DEFAULT NULL',
														'NationalInsuranceNumber'=>'varchar(50) DEFAULT NULL',
														'EmergencyContactNumber'=>'varchar(50) DEFAULT NULL',
														'AddressLine1'=>'varchar(100) DEFAULT NULL',
														'AddressLine2'=>'varchar(100) DEFAULT NULL',
														'AddressLine3'=>'varchar(100) DEFAULT NULL',
														'Town'=>'varchar(100) DEFAULT NULL',
														'County'=>'varchar(100) DEFAULT NULL',
														'Postcode'=>'varchar(100) DEFAULT NULL',
														'BankSortCode'=>'varchar(10) DEFAULT NULL',
														'BankAccountNumber'=>'varchar(10) DEFAULT NULL',
														'BankName'=>'varchar(50) DEFAULT NULL',
														'VATNo'=>'varchar(50) DEFAULT NULL'                 
												) );

		$this->createTable('nq_contractor_document', array( 'Id'=>'pk',
															'ContractorId'=>'int(11) not null',
															'TypeId'=>'int(11) not null',
															'FileName'=>'varchar(100) not null',
															'Comments'=>'text',
															'UploadedBy'=>'int(11) not null',
															'UploadedDate'=>'datetime not null',
															'deleteStatus'=>'smallint(6) not null'
												) );
		
		$this->createTable('nq_contractor_document_type', array('Id'=>'pk',
																'Description'=>'varchar(50) not null',
																'IsLive'=>'int(11) not null'
												) );
		
		$this->createTable('nq_contractor_type', array('Id'=>'pk',
														'Description'=>'varchar(50) not null'
												) );

		$this->execute("CREATE OR REPLACE VIEW `nq_contractor_details` AS select `c`.`ContractorId` AS `ContractorId`,`c`.`Code` AS `Code`,`c`.`FirstName` AS `FirstName`,`c`.`LastName` AS `LastName`,`c`.`ContractorTypeId` AS `ContractorTypeId`,`ct`.`Description` AS `ContractorType`,`c`.`IsLive` AS `IsLive`,`c`.`AccountNumber` AS `AccountNumber`,`c`.`Data` AS `Data`,`c`.`ApplicableTaxId` AS `ApplicableTaxId`,`tax`.`Code` AS `TaxCode`,`tax`.`Percentage` AS `TaxPercentage`,`tax`.`Description` AS `TaxDescription`,`c`.`ParentContractorId` AS `ParentContractorId`,`cp`.`Code` AS `ParentCode`,`cp`.`FirstName` AS `ParentFirstName`,`cp`.`LastName` AS `ParentLastName`,`cp`.`AccountNumber` AS `ParentAccountNumber`,`c`.`Email` AS `Email`,`c`.`MOTExpiryDate01` AS `MOTExpiryDate01`,`c`.`InsExpiryDate01` AS `InsExpiryDate01` from (((`nq_contractor` `c` left join `nq_contractor_type` `ct` on((`ct`.`Id` = `c`.`ContractorTypeId`))) left join `finance_tax` `tax` on((`tax`.`Id` = `c`.`ApplicableTaxId`))) left join `nq_contractor` `cp` on((`cp`.`ContractorId` = `c`.`ParentContractorId`)));");
	}

	public function down()
	{
		$this->dropTable('nq_contractor');
		$this->dropTable('nq_contractor_document');
		$this->dropTable('nq_contractor_document_type');
		$this->dropTable('nq_contractor_type');
	}
}

?>