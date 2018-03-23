<?php

namespace Tests;

use Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand;
use Silex\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Trait MigrationsTrait
 * Migrations trait.
 */
trait MigrationsTrait
{
    /**
     * Run migrations.
     *
     * @throws \Exception
     */
    public function bootMigrationsTrait()
    {
        $this->runCommand('migrations:migrate --no-interaction');

        if (property_exists($this, 'seeds')) {
            foreach ($this->seeds as $seed) {
                $class = class_exists($seed) ? $seed : 'Tests\\\\Seeds\\\\'.ucfirst($seed).'TableSeeder';
                $this->runCommand('seed:run --class='.$class);
            }
        }
    }

    /**
     * Run command.
     *
     * @param string $command
     *
     * @throws \Exception
     */
    private function runCommand($command)
    {
        $dir = 'cd '.__DIR__.'/../bin; php console';

        $command = PHP_EOL."export APP_ENV=testing; {$dir} {$command}".PHP_EOL;
        ob_start();
        exec($command, $out, $code);
        ob_end_clean();

        if ((int)$code !== 0) {
            throw new \Exception(
                "Command \n {$command} \n run with code {$code} with out: \n " .
                implode(PHP_EOL, $out)
            );
        }
    }

    /**
     * Down migrations.
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    public function _down()
    {
        /**
         * @var \Doctrine\DBAL\Query\QueryBuilder $builder
         */
        $builder = $this->app['db']->createQueryBuilder();

        $migrations = $builder->select(['version'])
            ->from('migration_versions')
            ->orderBy('version', 'desc')
            ->execute()->fetchAll();

        foreach ($migrations as $migration) {
            $this->runCommand('migrations:execute --no-interaction --down '.$migration['version']);
        }
    }
}
