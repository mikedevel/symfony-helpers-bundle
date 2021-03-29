<?php

namespace Mikedevs\HelpersBundle\Manager;

class UpdaterManager implements UpdaterManagerInterface
{

    /** @var string */
    private $path;

    /** @var string */
    private $property;

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

    public function buildVersion(): string
    {
        $file = $this->path;
        $homepage = file_get_contents($file);
        preg_match("#{$this->property}: \"(.*)\"#i", $homepage, $m);
        $old = $m[1];
        $version = explode(".", $m[1]);
        $p1 = (int)$version[0];
        $p2 = (int)$version[1];
        $p3 = (int)$version[2];

        $p3 = $p3 + 1;
        if ($p3 == 100) {
            $p3 = 0;
            $p2 = $p2 + 1;
            if ($p2 == 10) {
                $p2 = 0;
                $p1 = $p1 + 1;
            }
        }
        $ver = "{$p1}.{$p2}.{$p3}";
        shell_exec('sed -i \'s/' . $this->property . ': ".*"/' . $this->property . '\: "' . $ver . '"/g\' ' . $file);
        return "\033[32m Version updated: {$old} -> {$ver}\033[0m\r\n";
    }
}


