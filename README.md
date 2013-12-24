# Behat & Mink Example - Ascii Art Marketplace

An example of how to use  Behat & Mink to build an automated acceptance test suite. 

We build a fictional website called the __Ascii Art Marketplace__ and accompany it with an acceptance testing suite that is written using Gherkin and executed in real browsers and / or browser emulators. 

Ready for hooking up to Continuous Integration (CI) this repo includes a wrapper script that will run the tests using either Selenium2 web driver or phantomJS*. The tests will work perfectly well without the wrapper script but it's useful for taking care of launching & shutting down the different browser drivers.

You will need to follow the installation instructions in the next section to ensure you get the right web drivers for your environment. 

For more more background info please see my accompanying blog post <a href='http://pipe-devnull.com/2013/12/17/mink-behat-automated-browser-testing-in-plain-english.html'>Automated Browser Acceptance Testing with Behat & Mink</a>

## Installation


1 Clone this repo:


    git clone https://github.com/Behat/MinkExtension-example

2 Using [Composer](http://getcomposer.org/), install Behat, Mink, MinkExtension and their associated dependencies:


    curl http://getcomposer.org/installer | php
    php composer.phar install

3 Install phantomJS

  3.1 Download the correct version of phantomJS for your OS - http://phantomjs.org/download.html

  3.2 Extract the downloaded phantomJS into **behat-mink-advanced-example/Drivers/phantomJS**

**NOTE: its important to get the path right or the wrapper script will not be able to find phantomJS.**

4 Install Selenium Server


  4.1 Download Selenium Server from http://www.seleniumhq.org/download/. 

  4.2 Extract & copy the JAR file into **behat-mink-advanced-example/Drivers/selenium**


## Running the tests

Once everything is installed you can run the tests using either phantomJS for headless testing (CI etc.) or with Selenium to watch the test performed in front of you in Firefox.

The bundled wrapper script takes care of launching either phantomJS or Selenium Server, running the tests and then shutting down phantomJS/Selenium.


1 Start up the __Ascii Art Marketplace__ website

	$ cd behat-mink-advanced-example/mockshop
	$ php -S 0.0.0.0:1234

Browse to http://0.0.0.0:1234 to have a look at what we are selling :)

2 Open a new window and run the test suite

	$ cd behat-mink-advanced-example/
	
	# Run tests using phantomJS
	./run ci

	# Run tests using selenium
	./run desktop


You don't have to use the wrapper script I've included however if you don't then you will have to launch phantomJS/selenium manually before executing any of the tests.


## Other Notes

* I'm using the *ClosuredContent* for step definitions.
* The two options in the wrapper script refer directly to two profiles set up for behat
    * __ci__ runs tests with phantomJS and reports results in junit and HTML format.
    * __desktop__ runs tests with Selenium Server and reports results to STD OUT
 

