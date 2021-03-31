<?php

namespace Mikedevs\HelpersBundle\Tests;


use Mikedevs\HelpersBundle\Manager\UpdaterManager;
use PHPUnit\Framework\TestCase;

class UpdaterServiceTest extends TestCase
{
    protected const PATH = __DIR__ . "/../tests/service-for-test.yml";
    protected const NAME = "version";

    /**
     * @var UpdaterManager
     */
    private $service;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->service = new UpdaterManager(self::PATH, self::NAME);
    }

    public function testPatch()
    {
        $this->setVersionTo("1.0.0");
        $out = $this->service->buildVersion();
        $this->assertEquals("Version updated: 1.0.0 -> 1.0.1", $out);
    }

    public function testMinor() {
        $this->setVersionTo("1.0.19");
        $out = $this->service->buildVersion(UpdaterManager::MINOR);
        $this->assertEquals("Version updated: 1.0.19 -> 1.1.0", $out);
    }

    public function testMajor() {
        $this->setVersionTo("1.2.18");
        $out = $this->service->buildVersion(UpdaterManager::MAJOR);
        $this->assertEquals("Version updated: 1.2.18 -> 2.0.0", $out);
    }

    private function setVersionTo($version = "1.0.0") {
        $this->service->setVersion($version);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->setVersionTo("1.0.0");
    }


}