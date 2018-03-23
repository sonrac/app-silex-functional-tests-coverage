<?php
/**
 * @author Donii Sergii <doniysa@gmail.com>.
 */

namespace App\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DBTestController.
 *
 * @author Donii Sergii <doniysa@gmail.com>
 */
class DBTestController
{
    /**
     * Get all entities.
     *
     * @param \Silex\Application                        $application
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param int                                       $limit
     * @param int                                       $offset
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    public function all(Application $application, Request $request, $limit = 0, $offset = 0)
    {
    }

    /**
     * View entity.
     *
     * @param \Silex\Application                        $application
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string|int                                $id
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    public function view(Application $application, Request $request, $id)
    {
    }

    /**
     * Delete entity.
     *
     * @param \Silex\Application                        $application
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param                                           $id
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    public function deleteEntity(Application $application, Request $request, $id)
    {
    }

    /**
     * Create entity.
     *
     * @param \Silex\Application                        $application
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    public function createEntity(Application $application, Request $request)
    {
    }

    /**
     * Update entity.
     *
     * @param \Silex\Application                        $application
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param                                           $id
     *
     * @author Donii Sergii <doniysa@gmail.com>
     */
    public function updateEntity(Application $application, Request $request, $id)
    {
    }
}
