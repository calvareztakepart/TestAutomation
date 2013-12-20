<?php
$RootPath = dirname(dirname(__DIR__));


//included files
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
require_once $RootPath . '/TestAutomation/Resources/CultureResource.php';
require_once $RootPath . '/TestAutomation/Resources/BaseResource.php';
require_once $RootPath . '/TestAutomation/Resources/errorMsgResource.php';


class CultureTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {

	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);
	}

	//go to Culture page Verify it loads
	public function testGoToCulturePage() {
		//go to Culture page
		$this->url('/');
		 $parent = $this->byCssSelector('nav ul.menu .text-culture a');
         $parent->click();
		$this->timeouts()->implicitWait(25000);

		//verify PAGE title
		$this->assertEquals(strCulturePageTitle, $this->title());

		//verify Culture heading exists
		$CultureHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strCulturePageHeader, $CultureHeading);
	}


	/* verify topic content generates */
	public function testVerifyCultureTopicContentGenerates() {		

		//go to Culture page
		$this->url('/');
		$parent = $this->byCssSelector(strCultureMenusCSS);
        $parent->click();
		$this->timeouts()->implicitWait(25000);

		try {
			//get values from topic section
			$Lastestelement = $this->byCssSelector(strTopicSectionClass);
			$Lastestelement = trim($Lastestelement->text());

			//make sure there is an actual topic on the page
			if (( $Lastestelement!= strErrSolrDownText) and ($Lastestelement != "" or $Lastestelement != null))
			{	

				$this->assertTrue(True, strErrSolrUP);
				//display MSG that solar is up.
				echo strErrSolrUP;
				
			}
			else {
				$this->fail(strErrSolrDown);
			}
	
		} catch (Exception $e) {
				$this->fail(strErrSolrDown);
			}
	
	}
}
?>
