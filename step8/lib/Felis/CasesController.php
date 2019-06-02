<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/12/2018
 * Time: 7:41 PM
 */

namespace Felis;


class CasesController
{
    public function __construct(Site $site, array $post) {

        $root = $site->getRoot();
        if (isset($post['add'])){
            $this->redirect = "$root/newcase.php";
        }
        if(isset($post['delete'])){


            $id=$post['user'];
            if ($id===NULL){
                $this->redirect = "$root/cases.php";
            }
            else{
            $this->redirect = "$root/deletecase.php?id=$id";
            }
        }


    }
    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.


    private $redirect;
    }