Feature: newsletter sign up
	In order to receive weekly newsletters
	As a customer
	I need to be able to sign up to the weekly newsletter service

Background:
	# Setup any feature dependencies

Scenario: Sign up for newsletter using good data
	Given I am on "signup.php"
	And I fill in "inputEmail" with "ade@pipe-devnull.com"
	And I fill in "firstname" with "Adrian"
	And I fill in "lastname" with "Bruce"
	Then I press "Submit"
	And I should be on "signup.php"
	And I should see "Thanks for signing up! A million marketing emails are on the way!"
	And I should not see "Uncheck this tickbox"

Scenario: try and sign up for newsletter but forgetto fill in firstname and lastname
	Given I am on "signup.php"
	And I fill in "inputEmail" with "ade@pipe-devnull.com"
	Then I press "Submit"
	And I should be on "signup.php"
	And I should see "Sorry, there was a problem with your sign up"
	And I should see "You must fill in the field firstname"
	And I should see "You must fill in the field lastname"
	And I should see "Uncheck this tickbox"