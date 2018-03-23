<?php
/**
 * @author Donii Sergii <doniysa@gmail.com>.
 */

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Tests\OnceRunMigration;

/**
 * Class OnceMigrationUnitTest.
 *
 * @author Donii Sergii <doniysa@gmail.com>
 */
abstract class OnceMigrationUnitTest extends TestCase
{
    /**
     * Migration runner class.
     *
     * @var \Tests\OnceRunMigration
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    protected static $migration;

    /**
     * Run migration if true or does not run otherwise.
     *
     * @var bool
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    protected static $runMigration = true;

    /**
     * Seeds list.
     *
     * @var array
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    protected static $seeds = [];

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public static function setUpBeforeClass(
    )/* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::setUpBeforeClass();

        if (true === static::$runMigration) {
            $app = require __DIR__.'/../../src/app.php';
            static::$migration = new OnceRunMigration($app, static::$seeds);
            static::$migration->bootMigrationsTrait();
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tearDownAfterClass(
    )/* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::tearDownAfterClass();

        if (true === static::$runMigration) {
            static::$migration->_down();
        }
    }
}
