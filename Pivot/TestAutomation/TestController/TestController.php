<?php

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
/*

//define('SiteUrl', 'http://qa.takepart.com');

//global Variables


$RootPath = dirname(dirname(__DIR__));
require_once $RootPath . '/TestFramework/PageFunctions.php';
require_once $RootPath.'/TestAutomation/Resources/BaseResource.php';
*/



function clickLinkAndWaitByCss($Session,$Selector)
{
	$parent = $Session->byCssSelector($Selector);
	$parent->click();
	$Session->timeouts()->implicitWait(25000);
}

// clicks item by anme and waits for page to load
function clickAndWaitByName($Session,$NameSelector)
{
	$parent = $Session->byName($NameSelector);
	$parent->click();
	$Session->timeouts()->implicitWait(25000);
}

function isEmptyString($data)
{
	return (trim($data) === "" or $data === null);
}


		?>
