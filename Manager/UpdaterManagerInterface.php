<?php

namespace Mikedevs\HelpersBundle\Manager;

interface UpdaterManagerInterface
{
    /**
     * @return string
     */
    public function buildVersion(): string;
}
