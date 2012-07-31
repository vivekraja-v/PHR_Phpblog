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

class Dashboard_AddTopic extends PhpCommonFun
{
    protected function setUp(){ 
	
    	parent::setUp();
    
	}   
    
    public function testDash(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/PhpData.xml');
		
		$users = $doc->getElementsByTagName("searchmodule");
		
		foreach( $users as $searchmodule ){
			
			$DbAddTopics = $searchmodule->getElementsByTagName("db-addtopic");
			$DbAddTopic = $DbAddTopics->item(0)->nodeValue;
			
			$DbTopicInfos = $searchmodule->getElementsByTagName("db-topicinfo");
			$DbTopicInfo = $DbTopicInfos->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_DBOARD_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBOARD_LINK);
		
		$this->getElement(PHP_DBOARD_LINK1,$testcases);
		
		$this->clickandLoad(PHP_DBOARD_LINK1);
		
		$this->getElement(PHP_DBOARD_CNAME,$testcases);
		
		$this->select(PHP_DBOARD_CNAME,PHP_DBOARD_TOPIC,$testcases);
		
		$this->getElement(PHP_DBOARD_TTITLE,$testcases);
		
		$this->type(PHP_DBOARD_TTITLE,$DbAddTopic);
		
		$this->getElement(PHP_DBOARD_TTEXT,$testcases);
		
		$this->type(PHP_DBOARD_TTEXT,$DbTopicInfo);
		
		$this->getElement(PHP_DBOARD_SBUTT,$testcases);
		
		$this->submit(PHP_DBOARD_SBUTT,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBOARD_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	
		
		$this->getElement(PHP_DBOARD_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_DBOARD_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
    }
}  
?>