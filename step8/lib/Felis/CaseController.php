<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/13/2018
 * Time: 11:44 PM
 */

namespace Felis;


class CaseController
{

    public function __construct(Site $site, array $post,array $get) {

        $root = $site->getRoot();

        $id=$get['id'];
//        var_dump($post);
//        var_dump($get);
        if (isset($post['update'])){
            $all = new Cases($site);
            $cases = $all->getCases();
            $number=$post['number'];
//            var_dump($cases);
            foreach ($cases as $item){

                $item_id=$item->getId();
                $item_number=$item->getNumber();
                if($item_id !=$id){
                    if($item_number==$number){
                        $this->redirect="$root/case.php?id=$id";
                        return;
                    }
                }
            }
            $number=$post['number'];
            $summary=$post['summary'];
            $agent=$post['agent'];
            $status=$post['status'];
            $all->update($number,$summary,$agent,$status,$id);


            $this->redirect="$root/cases.php";
        }



    }


    public function getRedirect()
    {
        return $this->redirect;
    }	///< Page we will redirect the user to.
    private $redirect;
}