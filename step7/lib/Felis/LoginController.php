<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/11/2018
 * Time: 1:18 AM
 */

namespace Felis;


class LoginController
{
    /**
     * LoginController constructor.
     * @param Site $site The Site object
     * @param array $session $_SESSION
     * @param array $post $_POST
     */
    public function __construct(Site $site, array &$session, array $post) {
        // Create a Users object to access the table
        $users = new Users($site);

        $email = strip_tags($post['email']);
        $password = strip_tags($post['password']);
        $user = $users->login($email, $password);
        $session[User::SESSION_NAME] = $user;

        $root = $site->getRoot();
        if($user === null) {
            // Login failed
            $session["ErrorMessage"] =<<<HTML
<p class="msg">Invalid login credentials</p>
HTML;

            $this->redirect = "$root/login.php?e";

        } else {
            if($user->isStaff()) {
                $this->redirect = "$root/staff.php";
            } else {
                $this->redirect = "$root/client.php";
            }
        }

    }
    private $redirect;

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.
}