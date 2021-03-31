<?php

namespace Mikedevs\HelpersBundle\Command;

use Mikedevs\HelpersBundle\Manager\UpdaterManager;
use Mikedevs\HelpersBundle\Manager\UpdaterManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpgradeVersionCommand extends Command
{
    /** @var UpdaterManagerInterface */
    private $manager;

    /**
     * UpgradeVersionCommand constructor.
     *
     * @param UpdaterManagerInterface $manager
     */
    public function __construct(UpdaterManagerInterface $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('mikedevs:version:upgrade')
            ->setDescription('Upgrade version')
            ->addArgument('whoupgrade', InputArgument::OPTIONAL, "Cosa vuoi incrementare?")
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $params = UpdaterManager::PATCH;
        $type =$input->getArgument("whoupgrade") ;
        if($type && in_array($type, [UpdaterManager::PATCH, UpdaterManager::MAJOR, UpdaterManager::MINOR])) {
            $params = $type;
        }
        $output->writeln("<info>{$this->manager->buildVersion($params)}</info>");
        return 1;
    }
}
