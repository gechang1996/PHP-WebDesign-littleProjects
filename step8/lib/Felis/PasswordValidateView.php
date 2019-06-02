<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/14/2018
 * Time: 6:55 PM
 */

namespace Felis;


class PasswordValidateView extends View
{
    public function __construct($site,$get,$session)
    {
        $this->setTitle("Felis Password Entry");
        $this->site=$site;
        $this->validator = strip_tags($get['v']);
//        var_dump($session["ErrorMessage"]);
        if (isset($get['e'])) {

            $this->message = $session["ErrorMessage"];
        }
    }
    public function present() {
        $html = <<<HTML
<form method="post" action="post/password-validate.php">
<input type="hidden" name="validator" value="$this->validator">

        <legend>Change Password</legend>
        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Email">
        </p>
        <p>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Password">
        </p>
        <p>
            <label for="password">Password(again):</label><br>
            <input type="password" id="password" name="password2" placeholder="Password">
        </p>
        
        
        
        <p>
            <input type="submit" name="Ok" value="OK"> <input type="submit" name="Cancel" value="Cancel"> 
        </p>
        $this->message
        

</form>
HTML;

        return $html;
    }
    private $site;
    private $validator;
    private $message='';
}