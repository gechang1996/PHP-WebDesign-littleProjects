<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/9/2018
 * Time: 1:22 AM
 */

namespace Felis;


class View
{
    public function footer()
    {
        return <<<HTML
<footer><p>Copyright © 2017 Felis Investigations, Inc. All rights reserved.</p></footer>
HTML;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function head() {
        return <<<HTML
        <meta charset="utf-8">
<title>$this->title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="lib/css/felis.css">

HTML;
    }

    /**
     * Override in derived class to add content to the header.
     * @return string Any additional comment to put in the header
     */
    protected function headerAdditional() {
            return '';
        }
        /**
         * Create the HTML for the page header
         * @return string HTML for the standard page header
         */
     public function header() {



            $html = <<<HTML
<nav>
    <ul class="left">
        <li><a href="./">The Felis Agency</a></li>
    </ul>
HTML;

            if(count($this->links) > 0) {
                $html .= '<ul class="right">';
                foreach($this->links as $link) {
                    $html .= '<li><a href="' .
                        $link['href'] . '">' .
                        $link['text'] . '</a></li>';
                }
                $html .= '</ul>';
            }

            $additional = $this->headerAdditional();
            $html .= <<<HTML
</nav>
<header class="main">
    <h1><img src="images/comfortable.png" alt="Felis Mascot"> $this->title
    <img src="images/comfortable.png" alt="Felis Mascot"></h1>
    $additional
</header>
HTML;
            return $html;
        }

    /**
     * Add a link that will appear on the nav bar
     * @param $href What to link to
     * @param $text
     */
    public function addLink($href, $text) {
        $this->links[] = array("href" => $href, "text" => $text);
    }
    /**
     * Protect a page for staff only access
     *
     * If access is denied, call getProtectRedirect
     * for the redirect page
     * @param $site The Site object
     * @param $user The current User object
     * @return bool true if page is accessible
     */
    public function protect($site, $user) {
        if($user->isStaff()) {
            return true;
        }

        $this->protectRedirect = $site->getRoot() . "/";
        return false;
    }

    /**
     * Get any redirect page
     */
    public function getProtectRedirect() {
        return $this->protectRedirect;
    }

    /// Page protection redirect
    private $protectRedirect = null;

    private $links = array();	///< Links to add to the nav bar

    private $title = "";	///< The page title

}

