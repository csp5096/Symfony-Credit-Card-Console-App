<?php

namespace Tests\AppBundle\Command;
use PHPUnit\Framework\TestCase;


use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use AppBundle\Command\AppCardResetController;

class AppCardResetCommandTest extends \PHPUnit_Framework_TestCase
{
	public function testExecute()
    {
        $application = new Application($kernel);
        $application->add(new AppCardCreditCommand());

        $command = $application->find('app:card:reset');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            array(
                'name'    => 'Andrew',
            )
        );

        $this->assertRegExp('/.../', $commandTester->getDisplay());

        // ...
    }
}
	