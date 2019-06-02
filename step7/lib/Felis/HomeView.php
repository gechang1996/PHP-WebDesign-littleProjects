<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/9/2018
 * Time: 8:57 PM
 */

namespace Felis;


class HomeView extends View
{
    public function __construct()
    {
        $this->setTitle("Felis Investigations");
        $this->addLink("login.php", "Log in");
    }
    /**
     * Add content to the header
     * @return string Any additional comment to put in the header
     */
    protected function headerAdditional() {
        return <<<HTML
<p>Welcome to Felis Investigations!</p>
<p>Domestic, divorce, and carousing investigations conducted without publicity. People and cats shadowed
	and investigated by expert inspectors. Katnapped kittons located. Missing cats and witnesses located.
	Accidents, furniture damage, losses by theft, blackmail, and murder investigations.</p>
<p><a href="">Learn more</a></p>
HTML;
    }

    public function addTestimonial($g,$c){
        $this->array_testimonial[]=array($g,$c);
        $element_num=count($this->array_testimonial);
        $first_half=array_slice($this->array_testimonial, 0, $element_num / 2);
        $second_half=array_slice($this->array_testimonial, $element_num / 2);




        $html=<<<HTML
<section class="testimonials">
    <h2>TESTIMONIALS</h2>
    <div class="left">
HTML;
        foreach ($first_half as $item1){
        $html.=<<<HTML
<blockquote>
        <p>$item1[0]</p>
        <cite>$item1[1]</cite>
    </blockquote>
HTML;
        }
        $html.=<<<HTML
</div>
<div class="right">
HTML;
        foreach ($second_half as $item2){
            $html.=<<<HTML
<blockquote>
        <p>$item2[0]</p>
        <cite>$item2[1]</cite></blockquote>
HTML;
        }
        $html.=<<<HTML
</div>
</section>
HTML;

    $this->testimonial=$html;

    }

    public function testimonials(){
        return $this->testimonial;
    }
    private $testimonial;
    private $array_testimonial=array();

}