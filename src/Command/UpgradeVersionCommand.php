<?php

namespace Mikedevs\HelpersBundle\Command;

use Mikedevs\HelpersBundle\Manager\UpdaterManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
            ->setDescription('Upgrade version');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("\033[0m{$this->manager->buildVersion()}\033[0m");
    }
}
