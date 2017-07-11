<?php

namespace Tests\AppBundle\Command;
use PHPUnit\Framework\TestCase;

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use AppBundle\Command\AppCardChargeController;

class AppCardChargeCommandTest extends \PHPUnit_Framework_TestCase
{
	public function testExecute()
    {
        $application = new Application($kernel);
        $application->add(new AppCardChargeController());

        $command = $application->find('app:card:charge');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            array(
                'name'    => 'Jerome',
                'charge'  => '1000',
            )
        );

        $this->assertRegExp('/.../', $commandTester->getDisplay());

        // ...
    }
}
	