Feature: E-commerce Shopping basket
	In order to shop for ascii art
	As a customer
	I need to be able to add items to a shopping basket

Background:
	# Setup any feature dependencies

Scenario: Add an single item to the shopping basket
	Given I am on "shop.html"
	And I press "AA-FLAMINGO-SUBMIT"
	Then I should be on "/basket.php"
	And I should see "Flamingo Picture"
	And I wait "4" seconds
	And I should see "$1500"
	And I should see "Items in your basket (1)"

Scenario Outline: Add test items to the shopping basket
	Given I am on "shop.html"
	And I press "<add_button>"
	Then I should be on "/basket.php"
	And I should see "<item_name>"
	And I wait "4" seconds
	And I should see "<item_price>"
	And I should see "Items in your basket (<item_count>)"
	And I take a screenshot and save it as "<screenshot_name>" 

	Examples:
        | add_button  			| item_name         | item_price 	| item_count | screenshot_name |
        | AA-FLAMINGO-SUBMIT   	| Flamingo Picture  | $1500        	| 1          | flamingo_add	   |  
        | AA-JELLY-SUBMIT    	| Jellyfish Picture | $100        	| 1          | jellyfish_add   |  
        | AA-MOOSE-SUBMIT   	| Moose Picture     | $150        	| 1          | moose_add	   |  
