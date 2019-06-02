<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/14/2018
 * Time: 12:56 PM
 */

namespace Felis;


class deletecaseController
{
    public function __construct($site,$post,$get)
    {
        $root = $site->getRoot();
        $id=$get['id'];
        if(isset($post['Yes'])){
            $cases=new Cases($site);
            $cases->delete($id);
        }

        $this->redirect="$root/cases.php";
    }
    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.
    ///
    private $redirect;
}