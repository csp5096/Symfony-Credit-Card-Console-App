<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppCardAddCommand extends ContainerAwareCommand
{
	protected function configure()
    {
        $this
            ->setName('app:card:add')
            ->setDescription('Credit Card Add Amount To Account')
            ->addArgument('name', InputArgument::REQUIRED, 'Account Name')
			->addArgument('account', InputArgument::REQUIRED, 'Account Number')
			->addArgument('balance', InputArgument::REQUIRED, 'Add Amount')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
		$number = $input->getArgument('number');
		$balance = $input->getArgument('balance');
		$balanceService = $this->getContainer()->get('Balance');
		$balanceService->create($input->getArgument('name'));
		$balanceService->create($input->getArgument('number'));
		$balanceService->create($input->getArgument('balance'));
		
        $output->writeln(
        				$input->getArgument('name'). ', ' .
        			    $input->getArgument('number'). ': ' . 
        			    $input->getArgument('balance'));
    }

}
