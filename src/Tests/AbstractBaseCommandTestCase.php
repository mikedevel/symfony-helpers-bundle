<?php

namespace Mikedevs\HelpersBundle\Tests;


use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

abstract class AbstractBaseCommandTestCase extends KernelTestCase
{
    /** @var Application */
    private $application;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = static::createKernel(['environment' => 'test']);
        $this->application = new Application($kernel);
    }

    protected function execute($commandName, $options = []): string {
        $command = $this->application->find($commandName);
        $commandTester = new CommandTester($command);
        $commandTester->execute($options);
        return trim(str_replace(["\r", "\n"], "", $commandTester->getDisplay()));
    }


    protected function tearDown(): void
    {
        parent::tearDown();
        $this->application = null;
        self::$kernel = null;
    }


}