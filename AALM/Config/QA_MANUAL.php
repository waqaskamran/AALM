<?php

require_once('Base.php');

/**
 * Execution Mode
 */
define('EXECUTION_MODE', 'QA_MANUAL');

/**
 * Enterprise - ENVIRONMENT SPECIFIC - Overrides General
 */
class AALM_Config_QA_MANUAL extends AALM_Config_Base
{
	protected function init()
 	{
 		parent::init();

		/**
		 * Mode - Used for the log file directory
		 */
		$this->configVariables['mode'] =  'aalm_qa_man';

		/**
		 * Common Library Directories
		 */
		if (!defined('COMMON_LIB_DIR')) define('COMMON_LIB_DIR', '/virtualhosts/lib/');
		if (!defined('COMMON_LIB_ALT_DIR')) define('COMMON_LIB_ALT_DIR', '/virtualhosts/lib5/');
		if (!defined('LIBOLUTION_DIR')) define('LIBOLUTION_DIR', '/virtualhosts/libolution/');

		/**
		 * Database connections
		 */
		$this->configVariables['DB_HOST'] = 'db1.qa.tss';
		$this->configVariables['DB_NAME'] = 'ldb_mls';
		$this->configVariables['DB_USER'] = 'ecash';
		$this->configVariables['DB_PASS'] = 'lacosanostra';
		$this->configVariables['DB_PORT'] = 3306;

		$this->configVariables['SLAVE_DB_HOST'] = 'db1.qa.tss';
		$this->configVariables['SLAVE_DB_NAME'] = 'ldb_mls';
		$this->configVariables['SLAVE_DB_USER'] = 'ecash';
		$this->configVariables['SLAVE_DB_PASS'] = 'lacosanostra';
		$this->configVariables['SLAVE_DB_PORT'] = 3306;

		$this->configVariables['API_DB_HOST'] = 'db1.qa.tss';
		$this->configVariables['API_DB_NAME'] = 'ldb_mls';
		$this->configVariables['API_DB_USER'] = 'ecash';
		$this->configVariables['API_DB_PASS'] = 'lacosanostra';
		$this->configVariables['API_DB_PORT'] = 3306;		

		$this->configVariables['APPSERVICE_DB_HOST'] = 'qadb.chasm.ept.tss';
		$this->configVariables['APPSERVICE_DB_NAME'] = 'aalm';
		$this->configVariables['APPSERVICE_DB_USER'] = 'aalm_readonly';
		$this->configVariables['APPSERVICE_DB_PASS'] = 'Pej42tAp';
		$this->configVariables['APPSERVICE_DB_PORT'] = 1433;

		$this->configVariables['STATEOBJECT_DB_HOST'] = 'qadb.chasm.ept.tss';
		$this->configVariables['STATEOBJECT_DB_NAME'] = 'aalm';
		$this->configVariables['STATEOBJECT_DB_USER'] = 'qa';
		$this->configVariables['STATEOBJECT_DB_PASS'] = 'sUg3PA3u';
		$this->configVariables['STATEOBJECT_DB_PORT'] = 1433;
		
		$this->configVariables['STATUNIQUE_DB_HOST'] = 'qadb.chasm.ept.tss';
		$this->configVariables['STATUNIQUE_DB_NAME'] = 'aalm';
		$this->configVariables['STATUNIQUE_DB_USER'] = 'stats_writer';
		$this->configVariables['STATUNIQUE_DB_PASS'] = 'da39swUbrut4';
		$this->configVariables['STATUNIQUE_DB_PORT'] = 1433;
				/**
                 * Database connections
                 */
		$this->configVariables['DB_MASTER_CONFIG'] =  new ECash_DB_CachedConfig(new DB_MySQLConfig_1(
                        $this->configVariables['DB_HOST'],
                        $this->configVariables['DB_USER'] ,
                        $this->configVariables['DB_PASS'],
                        $this->configVariables['DB_NAME'],
                        $this->configVariables['DB_PORT']
                        ));
		 $this->configVariables['DB_SLAVE_CONFIG'] =  new ECash_DB_CachedConfig(new DB_MySQLConfig_1(
                        $this->configVariables['SLAVE_DB_HOST'],
                        $this->configVariables['SLAVE_DB_USER'] ,
                        $this->configVariables['SLAVE_DB_PASS'],
                        $this->configVariables['SLAVE_DB_NAME'],
                        $this->configVariables['SLAVE_DB_PORT']
                        ));
		 $this->configVariables['DB_API_CONFIG'] =  new ECash_DB_CachedConfig(new DB_MySQLConfig_1(
                        $this->configVariables['API_DB_HOST'],
                        $this->configVariables['API_DB_USER'] ,
                        $this->configVariables['API_DB_PASS'],
                        $this->configVariables['API_DB_NAME'],
                        $this->configVariables['API_DB_PORT']
                        ));
		 $this->configVariables['DB_APPSERVICE_CONFIG'] = new DB_MSSQLConfig_2(
			$this->configVariables['APPSERVICE_DB_HOST'],
			$this->configVariables['APPSERVICE_DB_USER'] ,
			$this->configVariables['APPSERVICE_DB_PASS'],
			$this->configVariables['APPSERVICE_DB_NAME'],
			$this->configVariables['APPSERVICE_DB_PORT']
			);  	
        $this->configVariables['DB_STATEOBJECT_CONFIG'] = new DB_MSSQLConfig_2(
                $this->configVariables['STATEOBJECT_DB_HOST'],
                $this->configVariables['STATEOBJECT_DB_USER'] ,
                $this->configVariables['STATEOBJECT_DB_PASS'],
                $this->configVariables['STATEOBJECT_DB_NAME'],
                $this->configVariables['STATEOBJECT_DB_PORT']
                );
			
		$this->configVariables['DB_STATUNIQUE_CONFIG'] = new DB_MSSQLConfig_2(
			$this->configVariables['STATUNIQUE_DB_HOST'],
			$this->configVariables['STATUNIQUE_DB_USER'] ,
			$this->configVariables['STATUNIQUE_DB_PASS'],
			$this->configVariables['STATUNIQUE_DB_NAME'],
			$this->configVariables['STATUNIQUE_DB_PORT']
		);		
 	
		/**
		 * QuickChecks Return Files Directory
		 */
		if (!defined('QC_RETURN_FILE_DIR')) define('QC_RETURN_FILE_DIR', '/tmp/');
		$this->configVariables['FACTORY'] = new ECash_Factory(
			$this->configVariables['ENTERPRISE_PREFIX'], 
			$this->configVariables['DB_MASTER_CONFIG']
		);
		
		/**
		 * Application Site Redirection
		 */
		$this->configVariables['SITE_PREFIX'] = "qa.";
		
		/**
		 * New & React Apps
		 */
		$this->configVariables['NEW_APP_SITE'] = '';
		$this->configVariables['ECASH_APP'] = 'http://rc.ecashapp.com/';
		$this->configVariables['REACT_SOAP_URL'] = 'http://qa.bfw.1.edataserver.com/cm_soap.php?wsdl';
		$this->configVariables['REACT_SOAP_KEY'] = '13eb55c3098ad6a6e18a3aadd90d1304';
		$this->configVariables['ECASH_APP_REACT_PROMOID'] = 27713;
		$this->configVariables['VAPI_PRPC_URL'] = 'http://vendor-api-commercial.qa.tss/index.php';
		
             /**
                 * Application Service URLs
                 */
                $this->configVariables['BASE_SERVICE_URL'] = 'http://qa.chasm.ept.tss/';

		$this->configVariables['REFERENCES_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/references?wsdl';
                $this->configVariables['APP_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/service/app?wsdl';
                $this->configVariables['INQUIRY_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/service/inquiry?wsdl';
                $this->configVariables['DOCUMENT_HASH_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/service/documenthash?wsdl';
                $this->configVariables['DOCUMENT_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/service/document?wsdl';
		$this->configVariables['AGGREGATE_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/service/aggregate?wsdl';
		$this->configVariables['LOAN_ACTION_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/service/loanaction?wsdl';
		$this->configVariables['QUERY_SERVICE_URL'] = $this->configVariables['BASE_SERVICE_URL'].'soap-1.0/service/query?wsdl';
		$this->configVariables['VAPI_MEMCACHE_SERVERS'] = array(
			array('host' => 'rc2.ept.tss', 'port' => 11211),
		); 
 	}
}
