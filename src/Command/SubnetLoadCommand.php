<?php

namespace App\Command;

use App\Entity\Ip;
use App\Entity\Subnet;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SubnetLoadCommand extends Command
{
    protected static $defaultName = 'subnet:load';
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Loads the subnet data into the database')
//            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
//        $arg1 = $input->getArgument('arg1');
//
//        if ($arg1) {
//            $io->note(sprintf('You passed an argument: %s', $arg1));
//        }
//
//        if ($input->getOption('option1')) {
//            // ...
//        }

        $fileContent = file_get_contents('./var/files/subnets.json', FILE_USE_INCLUDE_PATH);

        $data = json_decode($fileContent);

        foreach ($data as $subnetObject) {
            $subnet = new Subnet();
            $subnet->setSubnet($subnetObject->subnet);
            $subnet->setCidr($subnetObject->cidr);

            $this->entityManager->persist($subnet);
            $this->entityManager->flush();

            foreach ($subnetObject->ips as $ipObject) {
                $ip = new Ip();
                $ip->setAddressTag($ipObject->address_tag);
                $ip->setIp($ipObject->ip);

                $subnet->addIp($ip);

                $this->entityManager->persist($ip);
                $this->entityManager->flush();
            }
        }

        $io->success('Done loading file.');
    }
}
