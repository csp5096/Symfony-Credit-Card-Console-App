<?php

namespace Tests\AppBundle\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use AppBundle\Command\AppCardAddController;
use PHPUnit\Framework\TestCase;

class AppCardAddCommandTest extends \PHPUnit_Framework_TestCase
{
	public function testExecute()
    {
        $application = new Application($kernel);
        $application->add(new AppCardAddController());

        $command = $application->find('app:card:add');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            array(
                'name'    => 'Chris',
                'number'  => '987654321',
                'balance' => '1000',
            )
        );

        $this->assertRegExp('/.../', $commandTester->getDisplay());

        // ...
    }
}
	