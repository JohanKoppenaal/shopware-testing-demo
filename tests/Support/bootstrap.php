<?php declare(strict_types=1);

use Shopware\Core\TestBootstrapper;

$loader = (new TestBootstrapper())
    ->setProjectDir(dirname(__DIR__, 2))
    ->setForceInstallPlugins(false)
    ->bootstrap()
    ->getClassLoader();

return $loader;
