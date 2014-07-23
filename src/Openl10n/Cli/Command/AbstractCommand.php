<?php

namespace Openl10n\Cli\Command;

use Symfony\Component\Console\Command\Command;

abstract class AbstractCommand extends Command
{
    protected function get($serviceName)
    {
        return $this->getApplication()->getContainer()->get($serviceName);
    }
}
