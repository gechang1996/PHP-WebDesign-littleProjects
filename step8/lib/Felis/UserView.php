<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/14/2018
 * Time: 3:00 PM
 */

namespace Felis;


class UserView extends View
{
    public function __construct($site,$get)
    {
        $this->setTitle("Felis Investigations User");
        $this->addLink("staff.php", "Staff");
        $this->addLink("post/logout.php", "Log out");
        $this->get=$get;
        $this->site=$site;
    }
    public function present(){
        $users=new Users($this->site);
        $id=$this->get['id'];
        if($id!=""){
        $user=$users->get($id);
        $email=$user->getEmail();
        $name=$user->getName();
        $phone=$user->getPhone();
        $address=$user->getAddress();
        $notes=$user->getNotes();
        $role=$user->getRole();
        if($role=="A"){
            $role="admin";
        }
        if($role=="S"){
            $role="staff";
        }
        if($role=="C"){
            $role="client";
        }
        }
        else{
            $email="";
            $name="";
            $phone="";
            $address="";
            $notes="";
            $role="admin";
        }

        $html=<<<HTML
<form method="post" action="post/user.php?id=$id">
	<fieldset>
		<legend>User</legend>
		<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email" value="$email">
		</p>
		<p>
			<label for="name">Name</label><br>
			<input type="text" id="name" name="name" placeholder="Name" value="$name">
		</p>
		<p>
			<label for="phone">Phone</label><br>
			<input type="text" id="phone" name="phone" placeholder="Phone" value="$phone">
		</p>
		<p>
			<label for="address">Address</label><br>
			<textarea id="address" name="address" placeholder="Address">$address</textarea>
		</p>
		<p>
			<label for="notes">Notes</label><br>
			<textarea id="notes" name="notes" placeholder="Notes">$notes</textarea>
		</p>
		<p>
			<label for="role">Role: </label>
			<select id="role" name="role">
HTML;
        if($role=='admin'){
            $html.=<<<HTML
            <option value="admin" selected>Admin</option>
HTML;
        }
        else{
            $html.=<<<HTML
            <option value="admin">Admin</option>
HTML;
        }
        if($role=='staff'){
            $html.=<<<HTML
            <option value="staff" selected>Staff</option>
HTML;
        }
        else{
            $html.=<<<HTML
            <option value="staff">Staff</option>
HTML;
        }
        if($role=='client'){
            $html.=<<<HTML
            <option value="client" selected>Client</option>
HTML;
        }
        else{
            $html.=<<<HTML
            <option value="client">Client</option>
HTML;
        }

		$html.=<<<HTML
			</select>
		</p>
		<p>
			<input type="submit" name="Ok"value="OK"> <input type="submit" name="Cancel" value="Cancel">
		</p>

	</fieldset>
</form>

	<p>
		Admin users have complete management of the system. Staff users are able to view and make
		reports for any client, but cannot edit the users. Clients can only view the cases
		they have contracted for.
	</p>
HTML;
    return $html;
    }
    private $get;
    private $site;
}