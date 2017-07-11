<?php

namespace AppBundle\Command;

use AppBundle\Controller\BalanceControllerTest;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StreamableInputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use PHPUnit\Framework\TestCase;


class AppCardCommandTest extends \PHPUnit_Framework_TestCase
{
    protected function configure()
    {
        $this
            ->setName('app:card')
            ->setDescription('Credit Card Balance Application');
            // ->addArgument('name', InputArgument::REQUIRED, 'Name')
            // ->addArgument('account', InputArgument::REQUIRED, 'Account Name')
            // ->addArgument('balance', InputArgument::REQUIRED, 'Account Balance');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();
        $finder->files()->name('*.txt')->in(__DIR__.'/../Data/')->getIterator();
        //var_dump($finder);

        foreach ($finder as $file) {
            $contents = $file->getContents();
            //var_dump($contents);
        }
        $commands = explode(PHP_EOL, $contents);

        foreach($commands as $command) {
            $parameters = explode(" ", $command);
            $service = array_shift($parameters);
            if (!empty($service)) {
                $function = strtolower($service);
                $object = new BalanceControllerTest();
                $object->$function($parameters);
                // $output->writeln($object);
            }
        }
    }
}
