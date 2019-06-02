<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/14/2018
 * Time: 12:51 PM
 */

namespace Felis;


class deletecaseView extends View
{
    public function __construct($site,$get)
    {
        $this->setTitle('Felis Delete?');
        $this->addLink("staff.php", "Staff");
        $this->addLink("cases.php", "Cases");
        $this->addLink("post/logout.php", "Log out");
        $this->site=$site;
        $this->id=$get['id'];
    }
    public function presentForm(){
        $cases=new Cases($this->site);
        $all=$cases->getCases();

        foreach ($all as $item){
            $id1=$item->getId();
            if ($this->id==$id1){
                $my_item=$item;

            }
        }
        $number=$my_item->getNumber();
        $id2=$my_item->getId();

        $html=<<<HTML
<form method="post" action="post/deletecase.php?id=$id2">

	<fieldset>
		<legend>Delete?</legend>
		<p>Are you sure absolutely certain beyond a shadow of
			a doubt that you want to delete case $number?</p>

		<p>Speak now or forever hold your peace.</p>

		<p><input type="submit" name="Yes" value="Yes"> <input type="submit" name="No" value="No"></p>

	</fieldset>
</form>
HTML;
    return $html;
    }
    private $site;
    private $id;
}