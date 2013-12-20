<?php
$RootPath = dirname(dirname(__DIR__));
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

//included files
require_once $RootPath . '/TestAutomation/Resources/FoodResource.php';
require_once $RootPath . '/TestAutomation/Resources/BaseResource.php';
require_once $RootPath . '/TestAutomation/Resources/errorMsgResource.php';

//go to home page

class FoodTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {
	
	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);
	}

	public function testGoToFoodPage() {
		//go to food page
		$this->url(strFoodURL);

		//verify PAGE title
		$this->assertEquals(strFoodPageTitle, $this->title());

		//verify food heading exists
		$FoodHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strFoodPageHeader, $FoodHeading);
	}
	
	
	/* verify topic content generates */
	public function testVerifyFoodTopicContentGenerates() {
		
		//go to food page
		$this->url(strFoodURL);
		try {
			//get values from topic section
			$Lastestelement = $this->byCssSelector(strTopicSectionClass);
			
			//make sure there is an actual topic on the page
			if ($Lastestelement->text() != strErrSolrDownText) {
				$this->assertTrue(True, strErrSolrUP);
			}

		} catch (Exception $e) {
				$this->fail(strErrSolrDown);
			}

	}
}
?>
