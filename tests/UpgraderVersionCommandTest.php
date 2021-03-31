<?php

namespace Mikedevs\HelpersBundle\Tests;

use Mikedevs\HelpersBundle\Manager\UpdaterManager;

class UpgraderVersionCommandTest extends AbstractBaseCommandTestCase
{
    protected const PATH = __DIR__ . "/../tests/service-for-test.yml";
    protected const NAME = "version";

    /**
     * @sse UpgradeVersionCommand::execute()
     */
    public function testPatch()
    {
        $output = $this->execute("mikedevs:version:upgrade");
        $this->assertStringContainsString('Version updated: 1.0.0 -> 1.0.1', $output);
    }

    /**
     * @sse UpgradeVersionCommand::execute()
     */
    public function testMinor()
    {
        $this->execute("mikedevs:version:upgrade");
        $output = $this->execute("mikedevs:version:upgrade", ['whoupgrade' => UpdaterManager::MINOR]);
        $this->assertStringContainsString('Version updated: 1.0.1 -> 1.1.0', $output);
    }

    /**
     * @sse UpgradeVersionCommand::execute()
     */
    public function testMayor()
    {
        $this->execute("mikedevs:version:upgrade", ['whoupgrade' => UpdaterManager::MINOR]);
        $this->execute("mikedevs:version:upgrade");
        $output = $this->execute("mikedevs:version:upgrade", ['whoupgrade' => UpdaterManager::MAJOR]);
        $this->assertStringContainsString('Version updated: 1.1.1 -> 2.0.0', $output);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $service = new UpdaterManager(self::PATH, self::NAME);
        $service->setVersion("1.0.0");
    }


}