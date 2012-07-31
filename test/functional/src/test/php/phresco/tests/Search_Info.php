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

class Search_Info extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testSearch(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/PhpData.xml');
		
		$Search = $doc->getElementsByTagName("searchmodule");
		
		foreach( $Search as $searchmodule ){
		
			$Searchtopics = $searchmodule->getElementsByTagName("Searchtopic");
			$Searchtopic = $Searchtopics->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_SEARCH_LINK,$testcases);
		
		$this->type(PHP_SEARCH_LINK,$Searchtopic);
		
		$this->getElement(PHP_SEARCH_LINK,$testcases);
		
		$this->select(PHP_SEARCHIN_AREAS,PHP_SEARCH_AREA,$testcases);
		
		$this->getElement(PHP_SEARCH_BUTT,$testcases);
		
		$this->submit(PHP_SEARCH_BUTT,$testcases);
		
		try{
		
			$this->assertTrue($this->isTextPresent(PHP_SEARCH_ICON));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
					
		}
		
		parent::DoLogout($testcases);
		
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
    }
	
	public function tearDown(){
	
		parent::tearDown();
		
	}
	
}  
?>









