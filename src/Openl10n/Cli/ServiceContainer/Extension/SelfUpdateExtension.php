<?php

namespace Openl10n\Cli\ServiceContainer\Extension;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class SelfUpdateExtension implements Extension
{
    /**
     * {@inheritdoc}
     */
    public function initialize(ContainerBuilder $container)
    {
        $container
            ->register('humbug.self_update.updater', 'Humbug\SelfUpdate\Updater')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'self_update';
    }
}
