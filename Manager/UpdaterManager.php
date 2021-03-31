<?php

namespace Mikedevs\HelpersBundle\Manager;

class UpdaterManager implements UpdaterManagerInterface
{

    const MAJOR = "major";
    const MINOR = "minor";

    /** @var string */
    private $path;

    /** @var string */
    private $property;
    /**
     * @var int
     */
    private $major;
    /**
     * @var int
     */
    private $minor;
    /**
     * @var int
     */
    private $patch;

    /**
     * UpdaterManager constructor.
     * @param string $path
     * @param string $property
     */
    public function __construct(string $path, string $property)
    {
        $this->path = $path;
        $this->property = $property;
    }

    public function buildVersion($type = "PATCH"): string
    {
        $configContent = file_get_contents($this->path);
        preg_match("#{$this->property}: \"(.*)\"#i", $configContent, $m);
        $oldVersion = $m[1];
        $version = explode(".", $m[1]);
        $this->major = (int)$version[0];
        $this->minor = (int)$version[1];
        $this->patch = (int)$version[2];

        switch ($type) {
            case self::MAJOR:
                $this->major();
                break;
            case self::MINOR:
                $this->minor();
                break;
            default:
                $this->patch();
                break;
        }

        $newVersion = "{$this->major}.{$this->minor}.{$this->patch}";
        $this->setVersion($newVersion);
        return "Version updated: {$oldVersion} -> {$newVersion}";
    }

    public function setVersion($newVersion) {
        $cmd = 'sed -i \'s/{PROP}: ".*"/{PROP}\: "{VER}"/g\' {FILE}';
        shell_exec(str_replace(['{PROP}', '{VER}', "{FILE}"], [$this->property, $newVersion, $this->path], $cmd));
    }

    private function patch()
    {
        $this->patch++;
    }

    private function minor()
    {
        $this->minor++;
        $this->patch = 0;
    }

    private function major()
    {
        $this->major++;
        $this->minor = 0;
        $this->patch = 0;
    }

}


