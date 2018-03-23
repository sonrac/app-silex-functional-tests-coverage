<?php
/**
 * @author Donii Sergii <doniysa@gmail.com>.
 */

namespace Tests;

use Silex\Application;

/**
 * Class OnceRunMigration.
 *
 * @author Donii Sergii <doniysa@gmail.com>
 */
class OnceRunMigration
{
    use MigrationsTrait;

    /**
     * Application instance.
     *
     * @var \Silex\Application
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    protected $app;

    /**
     * Seeds list.
     *
     * @var array
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    protected $seeds = [];

    /**
     * OnceRunMigration constructor.
     *
     * @param \Silex\Application $application Application instance
     * @param array              $seeds       Seeds list
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    public function __construct(Application $application, $seeds = [])
    {
        $this->app = $application;
        $this->seeds = $seeds;
    }
}
