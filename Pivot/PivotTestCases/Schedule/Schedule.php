<?php
$RootPath = dirname(dirname(__DIR__));


//included files
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
require_once $RootPath . '/TestAutomation/Resources/ScheduleResource.php';
require_once $RootPath . '/TestAutomation/Resources/BaseResource.php';
require_once $RootPath . '/TestAutomation/Resources/errorMsgResource.php';
require_once $RootPath . '/TestAutomation/Testcontroller/Testcontroller.php';


class ScheduleTestCasesPage extends PHPUnit_Extensions_Selenium2TestCase {

	function setUp() {
		$this->setBrowser(Browser);
		$this->setBrowserUrl(SiteUrl);

	}

	/* verify schedule page loads */
	public function testVerifySchedulePageLoads_1() {
		//go to Schedule page
		$this->url('/');
		
		clickLinkAndWaitByCss($this,strScheduleMenuLinkCSS);

		//verify PAGE title
		$this->assertEquals(strSchedulePageTitle, $this->title());

		//verify Schedule heading exists
		$ScheduleHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strSchedulePageHeader, $ScheduleHeading);

	}

	/* go to Schedule page Verify Schedule is not out of date */

	public function testVerifyScheduleDates_2() {
		//go to Schedule page
		$this->url('/');
		
		clickLinkAndWaitByCss($this,strScheduleMenuLinkCSS);

		//convert date to correct time zone
		date_default_timezone_set('America/Los_Angeles');
		$CurrentDate = date("D M j");
		$CurrentTime = date("h:i");

		$this->timeouts()->implicitWait(8000);

		//this code runs jquery and makes the schedule dropdown visible
		$script_show = 'jQuery("div.date-menu .item ul").css({"font-color":"red","display":"block","visibility": "visible","background-color":"black","font-size":"200%"});';
		//executes jquery
		$this->execute( array( 'script' => $script_show , 'args'=>array() ) );
		$this->timeouts()->implicitWait(8000);

		//get string of items in schedule dropdrown
		$AvailableDates = $this->byCssSelector("div.date-menu .item ul")->text();

		//convert string to array
		$ScheduledItems = explode("\n",$AvailableDates);


		//count the number of items on the dropdown, if the count is less than 3 then fail with warning
		$ScheduledItemsCount = count($ScheduledItems);		

		if($ScheduledItemsCount<3)
		{
			$this->fail(strErrScheduleCount);
		}
		$ddDate = $ScheduledItems[0];

		//calculate the difference between dropdown value and todays date verify date on dropdown is not off by more than one day.
		$ddDate = new DateTime($ddDate);
		$CurrentDate= new DateTime($CurrentDate);
		$DateDifference = $ddDate->diff($CurrentDate);
		$DateDifference = $DateDifference->days;

		//if the schedule is more than one day off then error out.
		if($DateDifference>1)
		{
			$this->fail(strErrScheduleDateOff);
		}
		
	}

	/*
	* verify at least one time slot is showing on pivot schedule
	*/
	public function testVerifySchedulePageTime_3() {
			//go to Schedule page
		$this->url('/');

		clickLinkAndWaitByCss($this,strScheduleMenuLinkCSS);
		$this->timeouts()->implicitWait(8000);

		//verify PAGE title
		$this->assertEquals(strSchedulePageTitle, $this->title());

		//verify Schedule heading exists
		$ScheduleHeading = $this->byXPath(PageHeaderxPath)->text();
		$this->assertEquals(strSchedulePageHeader, $ScheduleHeading);

		date_default_timezone_set('America/Los_Angeles');

		$CurrentTime = date("h:i");

		$this->timeouts()->implicitWait(8000);

		try {
				//get string of items in schedule dropdrown
				$AvailableTimeSlots = $this->byCssSelector("div.row .time ")->text();
				$AvailableTimeSlots = explode("\n",$AvailableTimeSlots);
				$AvailableTimeCount = count($AvailableTimeSlots);

				//verify at least one time slot is showing on pivot schedule
				if ($AvailableTimeCount<1)
				{	
					$this->fail(True, strErrScheduleTimeSlotsOff);
				}
			} catch (Exception $e) {
			$this->fail(strErrScheduleTimeSlotsOff);
		}
	}

}

?>
