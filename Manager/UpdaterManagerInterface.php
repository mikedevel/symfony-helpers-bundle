<?php

namespace Mikedevs\VersionerBundle\Manager;

interface UpdaterManagerInterface
{
    /**
     * @return string
     */
    public function buildVersion(): string;
}
