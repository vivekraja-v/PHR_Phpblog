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

class Register_NewUser extends PhpCommonFun
{
    protected function setUp(){ 
	
    	parent::setUp();
    }   
    public function testRegisters(){ 
    	parent::Browser();
		$testcases = __FUNCTION__;
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/UserInfo.xml');
		
		$Registers = $doc->getElementsByTagName("register");
		
		foreach( $Registers as $register ){
		
			$names = $register->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			
			$emails = $register->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			
			$passwords = $register->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_REG_LINK,$testcases);
		
		$this->clickandLoad(PHP_REG_LINK);
		
		$this->getElement(PHP_REG_UNAME_TBOX,$testcases);
		
		$this->type(PHP_REG_UNAME_TBOX,$name);
		
		$this->getElement(PHP_REG_EMAIL_TBOX,$testcases);
		
		$this->type(PHP_REG_EMAIL_TBOX,$email);
		
		$this->getElement(PHP_REG_PASS_TBOX,$testcases);
		
		$this->type(PHP_REG_PASS_TBOX,$password);
		
		$this->getElement(PHP_REG_SUBMIT,$testcases);
		
		$this->submit(PHP_REG_SUBMIT,$testcases);
		
		try{
		
			$this->assertTrue($this->isTextPresent(PHP_REG_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}		
    }
	public function tearDown(){
		$this->closeWindow();
	}
	
}  
?>
