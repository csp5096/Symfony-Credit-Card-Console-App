<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppCardUpdatelimitCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:card:updatelimit')
            ->setDescription('Update  Account Balance Limit')
            ->addArgument('name', InputArgument::REQUIRED, 'Account Name')
			->addArgument('limit', InputArgument::REQUIRED, 'Account Limit')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
		$limit = $input->getArgument('limit');
		$balanceService = $this->getContainer()->get('Balance');
		$balanceService->create($input->getArgument('name'));
		
		$output->writeln(
        				$input->getArgument('name'). ', ' .
        			    $input->getArgument("New Limit: " . 'limit'));
    }

}
