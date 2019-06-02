<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/14/2018
 * Time: 3:05 PM
 */

namespace Felis;


class UserController
{
    public function __construct(Site $site, User $user, array $post,array $get) {
        $root = $site->getRoot();
        $this->redirect = "$root/users.php";
        //
        // Determine if this is new user or editing an
        // existing user. We determine that by looking for
        // a hidden form element named "id". If there, it
        // gives the ID for the user we are editing. Otherwise,
        // we have no user, so I'll use an ID of 0 to indicate
        // that we are adding a new user.
        //
        if(isset($get['id'])) {
            $id = strip_tags($get['id']);
        } else {
            $id = 0;
        }

        if(isset ($post['Ok'])){
            // Get all of the stuff from the from
            //
            $email = strip_tags($post['email']);
            $name = strip_tags($post['name']);
            $phone = strip_tags($post['phone']);
            $address = strip_tags($post['address']);
            $notes = strip_tags($post['notes']);
            switch($post['role']) {
                case "admin":
                    $role = User::ADMIN;
                    break;

                case "staff":
                    $role = User::STAFF;
                    break;

                default:
                    $role = User::CLIENT;
                    break;
            }

            $row = array('id' => $id,
                'email' => $email,
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'notes' => $notes,
                'password' => null,
                'joined' => date("Y-m-d H:i:s"),
                'role' => $role
            );

            $editUser = new User($row);
            $users = new Users($site);
            if($id == 0) {
                // This is a new user
                $mailer = new Email();
                $users->add($editUser, $mailer);
            }
            else{
                $users->update($editUser);
            }
        }




    }

    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.
    private $redirect;
}