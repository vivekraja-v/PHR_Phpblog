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

class Dashboard_EditTopic extends PhpCommonFun
{
    protected function setUp(){ 
	
    	parent::setUp();
    
	}   
    
    public function testEditTopic(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/PhpData.xml');
		
		$edittopic = $doc->getElementsByTagName("dbupdatemodule");
		
		foreach( $edittopic as $dbupdatemodule){
			
			$edittopicnames = $dbupdatemodule->getElementsByTagName("dbedittopicname");
			$edittopicname = $edittopicnames->item(0)->nodeValue;
			
			$edittopicinfos = $dbupdatemodule->getElementsByTagName("dbedittopicinfo");
			$edittopicinfo = $edittopicinfos->item(0)->nodeValue;
			
		}
		
		$this->getElement(PHP_DBEDIT_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBEDIT_LINK);
		
		$this->getElement(PHP_DBEDIT_EDIT,$testcases);
		
		$this->clickandLoad(PHP_DBEDIT_EDIT);
		
		$this->getElement(PHP_DBEDIT_CNAME,$testcases);
		
		$this->select(PHP_DBEDIT_CNAME,PHP_DBEDIT_TOPIC,$testcases);
		
		$this->getElement(PHP_DBEDIT_TTITLE,$testcases);
		
		$this->clear(PHP_DBEDIT_TTITLE,$testcases);
		
		$this->type(PHP_DBEDIT_TTITLE,$edittopicname);
		
		$this->getElement(PHP_DBEDIT_TTEXT,$testcases);
		
		$this->clear(PHP_DBEDIT_TTEXT,$testcases);
		
		$this->type(PHP_DBEDIT_TTEXT,$edittopicinfo);
		
		$this->getElement(PHP_DBEDIT_SBUTT,$testcases);
		
		$this->submit(PHP_DBEDIT_SBUTT,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBEDIT_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	
		
		$this->getElement(PHP_DBEDIT_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_DBEDIT_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
		
    }
}  
?>