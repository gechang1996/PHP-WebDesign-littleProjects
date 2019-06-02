<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/12/2018
 * Time: 8:02 PM
 */

namespace Felis;


class NewCaseController
{
    public function __construct(Site $site,User $user, array $post) {
        $root = $site->getRoot();
        if(!isset($post['OK'])) {
            $this->redirect = "$root/cases.php";
            return;
        }

        if (empty($post['number'])){
            $this->redirect="$root/newcase.php?e";
            return;
        }
        else {


            $cases = new Cases($site);
            $id = $cases->insert(strip_tags($post['client']),
                $user->getId(),
                strip_tags($post['number']));

            if ($id === null) {
                $this->redirect = "$root/newcase.php?e";
            } else {
                $this->redirect = "$root/case.php?id=$id";
            }
            return;
        }

    }
    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.

    private $redirect;
}