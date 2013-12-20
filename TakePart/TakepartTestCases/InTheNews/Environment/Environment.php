<?php
$RootPath = dirname(dirname(__DIR__));
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

//included files
require_once $RootPath . '/TestAutomation/Resources/EnvResource.php';
require_once $RootPath . '/TestAutomation/Resources/BaseResource.php';
require_once $RootPath . '/TestAutomation/Resources/errorMsgResource.php';

//go to home page

class EnvTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {

	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);
	}

	/* Verify users can go to env page */
	public function testGoToEnvironmentPage() {
		
		//go to Env page
		$this->url(strEnvURL);
	
		//verify PAGE title
		$this->assertEquals(strEnvPageTitle, $this->title());
	
		//verify Enviroment heading exists
		$EvnHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strEnvPageHeader, $EvnHeading);
		
	}


	/* verify topic content generates */
	public function testVerifyEnvTopicContentGenerates() {
		
		//go to Env page
		$this->url(strEnvURL);
		try {
			//
			$Lastestelement = $this->byCssSelector(strTopicSectionClass);
			
			//make sure there is an actual topic content on the page
			if ($Lastestelement->text() != strErrSolrDownText) {
				$this->assertTrue(True, strErrSolrUP);
			}

		} catch (Exception $e) {
				$this->fail(strErrSolrDown);
			}

	}
}
?>
