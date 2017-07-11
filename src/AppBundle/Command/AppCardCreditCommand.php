<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppCardCreditCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:card:credit')
            ->setDescription('Credit Card Charge Amount To Account')
            ->addArgument('name', InputArgument::REQUIRED, 'Account Name')
			->addArgument('credit', InputArgument::REQUIRED, 'Credit Ammount')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
		$credit = $input->getArgument('credit');
		$balanceService = $this->get('balance');
		
		$credit = $balanceService->credit($credit);

        $output->writeln(
        				$input->getArgument('name'). ', ' .
        			    $input->getArgument('credit'));
    }

}
