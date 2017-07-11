<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\StreamableInputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use AppBundle\Entity\Cards;


class AppCardCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:card')
            ->setDescription('Credit Card Balance Application');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();
        $finder->files()->name('*.txt')->in(__DIR__.'/../Data/')->getIterator();

        foreach ($finder as $file) {
            $contents = $file->getContents();
            //var_dump($contents);
        }
        $commands = explode(PHP_EOL, $contents);

        foreach($commands as $command) {
            $parameters = explode(" ", $command);
            $service = array_shift($parameters);
            if (!empty($service) && !empty($parameters)) {
                $function = strtolower($service);
                $object = Cards::singleton();
                $object->$function($parameters);
            }
        }
        foreach($object->getCards() as $card) {
            $output->writeln($card->getName().', '.$card->getAccount().': '.$card->getBalance());
        }
    }
}
