<?php /*
 * ###
 * PHR_PhpBlog
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Dashboard_Cat extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testCat(){

		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/PhpData.xml');
		
		$DbCart = $doc->getElementsByTagName("searchmodule");
		
		foreach( $DbCart as $searchmodule ){
			
			$DbCartTopics = $searchmodule->getElementsByTagName("db-carttopic");
			$DbCartTopic = $DbCartTopics->item(0)->nodeValue;
			
			$DbCartDescs = $searchmodule->getElementsByTagName("db-cartdesc");
			$DbCartDesc = $DbCartDescs->item(0)->nodeValue;
		
		}
		
		$this->getElement(PHP_DBCAT_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBCAT_LINK);
		
		$this->getElement(PHP_DBCAT_LINK1,$testcases);
		
		$this->clickandLoad(PHP_DBCAT_LINK1);
		
		$this->getElement(PHP_DBCAT_LINK2,$testcases);
		
		$this->clickandLoad(PHP_DBCAT_LINK2);
		
		$this->getElement(PHP_DBCAT_CATNAME,$testcases);
		
		$this->clear(PHP_DBCAT_CATNAME,$testcases);
		
		$this->type(PHP_DBCAT_CATNAME,$DbCartTopic);
		
		$this->getElement(PHP_DBCAT_CATDEC,$testcases);
		
		$this->clear(PHP_DBCAT_CATDEC,$testcases);
		
		$this->type(PHP_DBCAT_CATDEC,$DbCartDesc);
		
		$this->submit(PHP_DBCAT_SUBMIT,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBCAT_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	

		$this->getElement(PHP_UPDATE_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
		
    }
}  
?>