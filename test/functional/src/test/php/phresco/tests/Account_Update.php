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

class Account_Update extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testAccountUpdate(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
		parent::DoLogin($testcases);	
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/UserInfo.xml');
		
		$Account = $doc->getElementsByTagName("acupdate");
		
		foreach( $Account as $acupdate ){
		
			$names = $acupdate->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			
			$emails = $acupdate->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			
			$passwords = $acupdate->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_UPDATE_LINK,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LINK);
		
		$this->getElement(PHP_UPDATE_LINK1,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LINK1);
		
		$this->getElement(PHP_UPDATE_UNAME,$testcases);
		
		$this->clear(PHP_UPDATE_UNAME,$testcases);
		
		$this->type(PHP_UPDATE_UNAME,$name);
		
		$this->getElement(PHP_UPDATE_EMAIL,$testcases);
		
		$this->clear(PHP_UPDATE_EMAIL,$testcases);
		
		$this->type(PHP_UPDATE_EMAIL,$email);
		
		$this->getElement(PHP_UPDATE_PASS,$testcases);
		
		$this->clear(PHP_UPDATE_PASS,$testcases);
		
		$this->type(PHP_UPDATE_PASS,$password);
		
		$this->getElement(PHP_UPDATE_STATUS,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_STATUS);
		
		$this->getElement(PHP_UPDATE_SUBMIT,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_SUBMIT);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_UPDATE_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
					
		}
		
		$this->getElement(PHP_UPDATE_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
    }
	
	public function tearDown(){
	
		parent::tearDown();
		
	}
	
}  
?>
