<?php
/**
 * @author Donii Sergii <doniysa@gmail.com>.
 */

namespace App\Controllers;

use Silex\Application;

/**
 * Class HealthController.
 *
 * @author Donii Sergii <doniysa@gmail.com>
 */
class HealthController
{
    public function healthCheck(Application $application)
    {
        return $application->json([
            'status' => 'OK',
        ]);
    }
}
