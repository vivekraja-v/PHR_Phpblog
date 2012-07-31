<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PHPUnit/Autoload.php';
include 'phresco/tests/basescreen.php';
require_once 'phresco/tests/phpwebdriver/RequiredFunction.php';

class PhpCommonFun extends RequiredFunction
{
	private $host;
	private $port;
	private $context;
	private $protocol;
	private $serverUrl;
	private $browser;
	private $screenShotsPath;
	
    protected function setUp(){ 
	
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phresco-env-config.xml');
		
		$environment = $doc->getElementsByTagName("Server");
		
		$config = $doc->getElementsByTagName("Browser");
		$browser = $config->item(0)->nodeValue;
		
    	$this->webdriver = new WebDriver("localhost", 4444); 
		
       	$this->webdriver->connect($browser);
		
        $screenShotsPath = getcwd()."/surefire-reports/screenshots";
		
		if (!file_exists($screenShotsPath)) {
		
			mkdir($screenShotsPath);
		
		}
    
	}
    public function Browser(){  
	
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phresco-env-config.xml');
		
		$environment = $doc->getElementsByTagName("Server");
		
		foreach( $environment as $Server )
		{
			$protocols= $Server->getElementsByTagName("protocol");
			$protocol = $protocols->item(0)->nodeValue;
			
			$hosts = $Server->getElementsByTagName("host");
			$host = $hosts->item(0)->nodeValue;
			
			$ports = $Server->getElementsByTagName("port");
			$port = $ports->item(0)->nodeValue;
			
			$contexts = $Server->getElementsByTagName("context");
			$context = $contexts->item(0)->nodeValue;
		}
    	
        $serverUrl = $protocol . ':'.'//' . $host . ':' . $port . '/'. $context . '/';
		
		$this->webdriver->get($serverUrl);
		
    }
    function DoLogin($testcases){
	if($testcases == null){
		
			$testcases = __FUNCTION__;
		}
	
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/UserInfo.xml');
		
		$Login = $doc->getElementsByTagName("user");
		
		foreach( $Login as $user ){
			
			$emails = $user->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		
			$passwords = $user->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_LOGIN_LINK,$testcases);
	
		$this->clickandLoad(PHP_LOGIN_LINK);
		
		$this->getElement(PHP_LOGIN_UNAME_TBOX,$testcases);
		
		$this->type(PHP_LOGIN_UNAME_TBOX,$email);
		
		$this->getElement(PHP_LOGIN_PASS_TBOX,$testcases);
		
		$this->type(PHP_LOGIN_PASS_TBOX,$password);
		
		$this->getElement(PHP_LOGIN_SUBMIT,$testcases);
		
		$this->submit(PHP_LOGIN_SUBMIT,$testcases);
		
		try	{
		
			$this->assertTrue($this->isTextPresent(PHP_LOGIN_MSG));
		
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 
	       $this->doCreateScreenShot($testcases);

		}		
		
					
   	} 		
    function DoLogout($testcases){ 
	
		if($testcases == null){
		
			$testcases = __FUNCTION__;
		}
	
		$this->getElement(PHP_LOGOUT_LINK,$testcases);
		
		$this->clickandLoad(PHP_LOGOUT_LINK);
		
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
		try {
		
			$this->assertTrue($this->isTextPresent(PHP_LOGIN_LINK));
		}   
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
			$this->doCreateScreenShot($testcases);
			
		}
		
    }
	
}
?>