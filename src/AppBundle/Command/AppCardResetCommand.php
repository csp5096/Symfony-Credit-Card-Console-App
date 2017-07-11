<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppCardResetCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:card:reset')
            ->setDescription('Reset Account Balance')
            ->addArgument('name', InputArgument::REQUIRED, 'Account Name')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
		$balanceService = $this->get('balance');
		
		$rest = $balanceService->reset();
		
        $output->writeln("Balance On Account Reset");
    }

}
