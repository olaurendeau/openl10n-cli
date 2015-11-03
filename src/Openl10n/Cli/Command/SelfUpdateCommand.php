<?php

namespace Openl10n\Cli\Command;

use Humbug\SelfUpdate\Updater;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SelfUpdateCommand extends AbstractCommand
{
    /**
     * @var Updater
     */
    private $updater;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('self-update')
            ->setDescription('Update openl10n distribution')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->updater = $this->get('humbug.self_update.updater');
        $this->updater->setStrategy(Updater::STRATEGY_GITHUB);
        $this->updater->getStrategy()->setPackageName('openl10n/openl10n-cli');
        $this->updater->getStrategy()->setPharName('openl10n.phar');
        $this->updater->getStrategy()->setCurrentLocalVersion($this->getApplication()->getVersion());
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $result = $this->updater->update();
            $result ? exit('Updated!') : exit('No update needed!');
        } catch (\Exception $e) {
            exit('Well, something happened! Either an oopsie or something involving hackers.');
        }
    }
}
