<?php

namespace Mikedevs\HelpersBundle\Tests;


use Mikedevs\HelpersBundle\Manager\UpdaterManager;
use PHPUnit\Framework\TestCase;

class UpdaterServiceTest extends TestCase
{
    protected const PATH = __DIR__ . "/../Tests/service-for-test.yml";
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

    public function testVersion()
    {
        $out = $this->service->buildVersion();
        $this->assertEquals("Version updated: 1.0.0 -> 1.0.1", $out);
    }

    public function testMaxFix() {
        $this->setVersionTo("1.0.99");
        $out = $this->service->buildVersion();
        $this->assertEquals("Version updated: 1.0.99 -> 1.1.0", $out);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->setVersionTo();
    }

    private function setVersionTo($version = "1.0.0") {

        shell_exec('sed -i \'s/' . self::NAME . ': ".*"/' . self::NAME . '\: "'.$version.'"/g\' ' . self::PATH);
    }

}