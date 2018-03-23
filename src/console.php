<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;

$console = new Application('My Silex Application', 'n/a');
$console->getDefinition()->addOption(new InputOption('--env', '-e', InputOption::VALUE_REQUIRED,
    'The Environment name.', 'dev'));
$console->setDispatcher($app['dispatcher']);

$app->register(new \Kurl\Silex\Provider\DoctrineMigrationsProvider($console), [
        'migrations.directory' => __DIR__.'/../resources/migrations',
        'migrations.name'      => 'Application DB Migrations',
        'migrations.namespace' => 'Migrations',
    ]
);

$helperSet = new Symfony\Component\Console\Helper\HelperSet([
    'connection' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($app['db']),
    'dialog'     => new \Symfony\Component\Console\Helper\QuestionHelper(),
]);

$console->setHelperSet($helperSet);

$console->addCommands([
    new \sonrac\SimpleSeed\SeedCommand(null, $app['db']),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand(),
]);

return $console;
