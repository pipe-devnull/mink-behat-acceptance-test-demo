<?php
/**
 * PHP >= 5.3
 * 
 * Step definitions using a less verbose format taking advantage
 * of higher order functions in PHP versions >= 5.3 
 *
 * The regex for the step is the first parameter of the step definition 
 * and the function to execute upon matching is provided as the second
 * parameter.
 */


$steps->Given('/^I take a screenshot and save it as "([^"]*)"$/', function($world, $screenshotName) {
    file_put_contents("/tmp/{$screenshotName}.jpg", $world->getSession()->getScreenshot());
});

$steps->Given('/^I wait "([^"]*)" seconds$/', function($world, $seconds) {
    sleep($seconds);
});


?>