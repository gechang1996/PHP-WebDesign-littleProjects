<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/10/2018
 * Time: 1:01 AM
 */

namespace Felis;


class StaffView extends View
{
    public function __construct()
    {
        $this->setTitle("Felis Staff");
        $this->addLink("post/logout.php", "Log out");
    }

}