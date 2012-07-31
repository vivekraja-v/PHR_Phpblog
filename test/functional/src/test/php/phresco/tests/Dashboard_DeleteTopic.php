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

class Dashboard_DeleteTopic extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testDeleteTopic(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$this->getElement(PHP_DBDELETE_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBDELETE_LINK);
		
		$this->getElement(PHP_DBDELETE_DEL,$testcases);
		
		$this->clickandLoad(PHP_DBDELETE_DEL);
		
		$this->acceptAlert();
		
		$this->getElement(PHP_DBDELETE_LOGOFF,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBDELETE_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	
		
		$this->getElement(PHP_DBDELETE_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_DBDELETE_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
    }
}  
?>