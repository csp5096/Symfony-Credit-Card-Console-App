# Card-App

A php cli application which takes five commands and creates
and updates credit card accounts. 

## Getting Started

These instructions will get you a copy of 
the project up and running on your 
local machine for development and .
testing purposes.

Languages:

- PHP

Tools:

- Symfony Framework

Dependencies:

- Curl
- Composer
- Symfony
- PHPUnit

### Dependency Installing:

1.) Curl (Required To Install Composer Dependency)

- sudo apt-get install curl
- curl --version

2.) Composer (Required To Install Symfony Framework)

- sudo curl -s https://getcomposer.org/installer | php
- sudo mv composer.phar /usr/local/bin/composer
- composer

3.) Symfony (Familiar With PHP Framework) 

- sudo mkdir -p /usr/local/bin
- sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
- sudo chmod a+x /usr/local/bin/symfony
- symfony --version
- cd ~
- symfony new card-app
- chown -R -v [username] /home/[username]/card-app
- chmod -R -v 755 /home/[username]/card-app

5 .) PHPUnit (Familiar With Unit Testing)

- sudo curl -s https://phar.phpunit.de/phpunit-6.1.phar
- sidp chmod +x phpunit-6.1.phar
- sudo mv phpunit-6.1.phar /usr/local/bin/phpunit
- phpunit --version

### Running The Command:

Input Data File (input.txt) in the following directory:

card-app/src/AppBundle/Data/

- php bin/console app:card


### Running The Tests:

#### Command Test(s):

1.) AppCardCommand Unit Test

phpunit --bootstrap src/AppBundle/Command/AppCardCommand.php tests/AppBundle/Controller/AppCardCommandTest

- Unit test for the AppCardCommand Class.

2.) AppCardAddCommand Unit Test

phpunit --bootstrap src/AppBundle/Command/AppCardAddCommand.php tests/AppBundle/Controller/AppCardAddCommandTest

- Unit test for the AppCardAddCommand Class.

3.) AppCardChargeCommand Unit Test

phpunit --bootstrap src/AppBundle/Command/AppCardChargeCommand.php tests/AppBundle/Controller/AppCardChargeCommandTest

- Unit test for the AppCardChargeCommand Class.

4.) AppCardCreditCommand Unit Test

phpunit --bootstrap src/AppBundle/Command/AppCardCreditCommand.php tests/AppBundle/Controller/AppCardCreditCommandTest

- Unit test for the AppCardCreditCommand Class.

4.) AppCardCreditCommand Unit Test

phpunit --bootstrap src/AppBundle/Command/AppCardCreditCommand.php tests/AppBundle/Controller/AppCardCreditCommandTest

- Unit test for the AppCardCreditCommand Class.

5.) AppCardResetCommand Unit Test

phpunit --bootstrap src/AppBundle/Command/AppCardResetCommand.php tests/AppBundle/Controller/AppCardRestCommandTest

- Unit test for the AppCardRestCommand Class.

6.) AppCardUpdatelimitCommand Unit Test

phpunit --bootstrap src/AppBundle/Command/AppCardUpdatelimtCommand.php tests/AppBundle/Controller/AppCardUpdatelimtCommandTest

- Unit test for the AppCardUpdatelimtCommand Class.


#### Entity Test(s):

1.) Card Unit Test

phpunit --bootstrap src/AppBundle/Entity/Card.php tests/AppBundle/Entity/CardTest 

- Unit test for the Card Class.

1.) Cards Unit Test

phpunit --bootstrap src/AppBundle/Entity/Cards.php tests/AppBundle/Entity/CardsTest 

- Unit test for the Cards Class.

### Design:

1.) Choices:

- Symfony Framework Familiarity
- PHPUnit Testing Familiarity
- Luhn Validation Available In Symfony Library


2.) Tradeoffs:

- stdin requires file extension ".txt"
- Data File Directory Required
- Artificial Balance Limit Required: e.g. 2000

### Authors

- Christopher S. Powell

### Acknowledgements:

- http://symfony.com/
- http://php.net/manual/en/index.php
