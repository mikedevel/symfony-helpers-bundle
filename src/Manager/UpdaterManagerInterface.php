<?php

namespace Mikedevs\HelpersBundle\Manager;

interface UpdaterManagerInterface
{
    /**
     * @param $type
     * @return string
     */
    public function buildVersion($type = "patch"): string;
}
