<?php

namespace Tests\AppBundle\Command;
use PHPUnit\Framework\TestCase;


use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use AppBundle\Command\AppCardCreditController;

class AppCardCreditCommandTest extends \PHPUnit_Framework_TestCase
{
	public function testExecute()
    {
        $application = new Application($kernel);
        $application->add(new AppCardCreditController());

        $command = $application->find('app:card:credit');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            array(
                'name'    => 'Jacques',
                'credit'  => '1000',
            )
        );

        $this->assertRegExp('/.../', $commandTester->getDisplay());

        // ...
    }
}
	