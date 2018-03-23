<?php
/**
 * @author Donii Sergii <doniysa@gmail.com>.
 */

namespace Tests\ControllersTraits;

/**
 * Class HomeController.
 *
 * @author Donii Sergii <doniysa@gmail.com>
 */
trait HomeController
{
    public function testHealthGet()
    {
        $this->get('/')
            ->seeStatusCode(200)
            ->seeJsonStructure(['version', 'baseUrl', 'status']);
    }

    public function testHealthPost()
    {
        $this->get('/')
            ->seeStatusCode(200)
            ->seeJsonStructure(['version', 'baseUrl', 'status']);
    }

    public function testHealthPut()
    {
        $this->get('/')
            ->seeStatusCode(200)
            ->seeJsonStructure(['version', 'baseUrl', 'status']);
    }

    public function testHealthDelete()
    {
        $this->get('/')
            ->seeStatusCode(200)
            ->seeJsonStructure(['version', 'baseUrl', 'status']);
    }
}
