<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/14/2018
 * Time: 2:51 PM
 */

namespace Felis;


class UsersController
{
    public function __construct(Site $site, User $user, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/user.php?id=";

//        if(isset($post['add'])){
//            $this->redirect = "$root/user.php?id=";
//        }
        if(isset($post['edit'])){

            $id=$post['user'];
            if($id!=""){
                $this->redirect = "$root/user.php?id=$id";}
            else{
                $this->redirect = "$root/users.php";
            }
        }

    }

    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.
    private $redirect;
}