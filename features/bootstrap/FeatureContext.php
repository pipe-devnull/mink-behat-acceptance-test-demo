<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\BehatContext;


/**
 * Features context.
 */
class FeatureContext extends Behat\MinkExtension\Context\MinkContext implements ClosuredContextInterface
{
    public function getStepDefinitionResources()
    {
        return array(__DIR__ . '/../steps/basic_steps.php');
    }

    public function getHookDefinitionResources()
    {
        return array(__DIR__ . '/hooks.php');
    }
}