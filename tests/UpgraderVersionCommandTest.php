<?php
namespace Mikedevs\HelpersBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class UpgraderVersionCommandTest extends KernelTestCase
{

    public function testPatch() {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('mikedevs:version:upgrade');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);
//        $commandTester->execute([
//             pass arguments to the helper
//            'username' => 'Wouter',

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
//        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Username: Wouter', $output);
    }
}