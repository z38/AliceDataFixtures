<?php

/*
 * This file is part of the Fidry\AliceDataFixtures package.
 *
 * (c) Théo FIDRY <theo.fidry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fidry\AliceDataFixtures\Bridge\Symfony\SymfonyApp;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Fidry\AliceDataFixtures\Bridge\Symfony\FidryAliceDataFixturesBundle;
use Nelmio\Alice\Bridge\Symfony\NelmioAliceBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class DoctrineOrmKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new FrameworkBundle(),
            new NelmioAliceBundle(),
            new FidryAliceDataFixturesBundle(),
            new DoctrineBundle(),
        ];

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.yml');
        $loader->load(__DIR__.'/config/config_doctrine_orm.yml');
    }
}
