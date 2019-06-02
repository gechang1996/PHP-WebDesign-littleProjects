<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/14/2018
 * Time: 2:22 PM
 */

namespace Felis;


class UsersView extends View
{
    public function __construct($site)
    {
        $this->setTitle("Felis Investigations Users");
        $this->addLink("staff.php", "Staff");
        $this->addLink("post/logout.php", "Log out");

        $this->site=$site;
    }
    public function present() {

        $html = <<<HTML
<form class="table" method="post" action="post/users.php">
	<p>
	<input type="submit" name="add" id="add" value="Add">
	<input type="submit" name="edit" id="edit" value="Edit">
	<input type="submit" name="delete" id="delete" value="Delete">
	</p>

	<table>
		<tr>
			<th>&nbsp;</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
		</tr>
HTML;
        $users=new Users($this->site);
        $all=$users->getUsers();
        foreach ($all as $item){
            $name=$item->getName();
            $email=$item->getEmail();
            $role=$item->getRole();
            if ($role=='A'){
                $role1='Admin';
            }
            if ($role=='S'){
                $role1='Staff';
            }
            if ($role=='C'){
                $role1='Client';
            }
            $id=$item->getId();
            $html.=<<<HTML
<tr>
			<td><input type="radio" name="user" value="$id"></td>
			<td>$name</td>
			<td>$email</td>
			<td>$role1</td>
		</tr>

HTML;


        }

    $html.=<<<HTML
	</table>
</form>
HTML;

        return $html;
    }
    private $site;
}