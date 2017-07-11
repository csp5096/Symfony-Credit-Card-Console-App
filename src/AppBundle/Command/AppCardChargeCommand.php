<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Card;
use AppBundle\Service\Balance;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppCardChargeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:card:charge')
            ->setDescription('Credit Card Charge Amount To Account')
            ->addArgument('name', InputArgument::REQUIRED, 'Account Name')
			->addArgument('charge', InputArgument::REQUIRED, 'Charge Amount')
        ;
    }

	protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
		$charge = $input->getArgument('charge');
		$container = new ContainerBuilder();
		$container->register('card','Card');
		$card = new Card("Allen", "9876543210", "1000", "1000", "credit");
		$card->setName($name);
		$card->setBalance(0);
		$balanceService = new Balance($card);
		$charge = $balanceService->charge($charge);

        $output->writeln("");
    }

}
