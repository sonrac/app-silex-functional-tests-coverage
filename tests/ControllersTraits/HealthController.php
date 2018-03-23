<?php
/**
 * @author Donii Sergii <doniysa@gmail.com>.
 */

namespace Tests\ControllersTraits;

/**
 * Class HealthController.
 *
 * @author Donii Sergii <s.donii@infomir.com>
 */
trait HealthController
{
    public function testHealthGet()
    {
        $this->get('/api/v1/health')
            ->seeStatusCode(200)
            ->seeJsonStructure(['status' => 'OK']);
    }
}
