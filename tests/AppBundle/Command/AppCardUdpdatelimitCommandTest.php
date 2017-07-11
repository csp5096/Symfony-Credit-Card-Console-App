<?php

namespace Tests\AppBundle\Command;
use PHPUnit\Framework\TestCase;


use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use AppBundle\Command\AppCardUpdatelimitCommand;

class AppCardUpdatelimitCommandTest extends \PHPUnit_Framework_TestCase
{
	public function testExecute()
    {
        $application = new Application($kernel);
        $application->add(new AppCardCreditCommand());

        $command = $application->find('app:card:updatelimit');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            array(
                'name'    => 'Timothy',
                'lmit'    => '5000',
            )
        );

        $this->assertRegExp('/.../', $commandTester->getDisplay());

        // ...
    }
}
	