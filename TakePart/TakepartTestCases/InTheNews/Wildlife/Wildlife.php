<?php
$RootPath = dirname(dirname(__DIR__));
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

//included files
require_once $RootPath .'/TestAutomation/Resources/WildlifeResource.php';
require_once $RootPath .'/TestAutomation/Resources/BaseResource.php';
require_once $RootPath .'/TestAutomation/Resources/errorMsgResource.php';



class WildlifeTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {
	
	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);
	}

	//go to wildlife page
	public function testGoToWildlifePage() {
		//go to Wildlife page
		$this->url(WildLifeUrl);

		//verify PAGE title
		$this->assertEquals(strWildlifePageTitle, $this->title());

		//verify Wildlife heading exists
		$WildlifeHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strWildlifePageHeader, $WildlifeHeading);
	}
	
	
	/* verify topic content generates */
	public function testVerifyWildlifeTopicContentGenerates() {
		
		//go to Wildlife page
		$this->url(WildLifeUrl);
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
