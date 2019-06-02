<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/13/2018
 * Time: 11:44 PM
 */

namespace Felis;


class CaseView extends View
{
    public function __construct($site,$get)
    {
        $this->setTitle("Felis Case");

        $this->addLink("staff.php", "Staff");
        $this->addLink("cases.php", "Cases");
        $this->addLink("post/logout.php", "Log out");
        $this->site=$site;
        $this->id=$get['id'];
    }
    public function presentForm(){
        $cases = new Cases($this->site);
        $users1 = new Users($this->site);
        $users = $users1->getAgents();
        $all = $cases->getCases();

        foreach ($all as $item){
            if ($item->getId() == $this->id){
                $case=$item;
                break;
            }
        }

        $client = $case->getClientName();
        $number=$case->getNumber();
        $summary=$case->getSummary();
        $agent=$case->getAgent();
        $status=$case->getStatus();


        $html=<<<HTML
<form method="post" action="post/case.php?id=$this->id">
    <input type="hidden" name="id" value="$this->id">
	<fieldset>
	    
		<legend>Case</legend>
		<p>Client: $client</p>

		<p>
			<label for="number">Case Number: </label>
			<input type="text" id="number" name="number" placeholder="Case Number"
				   value="$number">
		</p>
		<p>
			<label for="summary">Summary</label><br>
			<input type="text" id="summary" name="summary" placeholder="Summary"
				   value="$summary">
		</p>

		<p>
			<label for="agent">Agent in Charge: </label>
			<select id="agent" name="agent" >
			
HTML;

        foreach ($users as $item1){
            $name=$item1['name'];
            $id1=$item1['id'];
            if ($agent == $id1) {
                $html .= <<<HTML
<option value="$id1" selected>$name</option>
HTML;
            }
            else{
                $html .= <<<HTML
<option value="$id1">$name</option>
HTML;
            }
        }






        $html.=<<<HTML

</select>
		</p>
<p>
			<label for="status">Status: </label>
			<select id="status" name="status">
HTML;

        if($status=='O'){
            $html.=<<<HTML
<option value="O" selected>Open</option>
HTML;
        }
        else{
            $html.=<<<HTML
<option value="O">Open</option>
HTML;
        }
        if($status=='C'){
            $html.=<<<HTML
<option value="C" selected>Close</option>
HTML;
        }
        else{
            $html.=<<<HTML
<option value="C">Close</option>
HTML;
        }


//        $html.=<<<HTML
//
//
//
//		<!---->
//				<!--<option selected>Open</option>-->
//				<!--<option>Closed</option>-->
////
////HTML;
        $html.=<<<HTML
        
			</select>
		</p>
		<p>
			<input type="submit" name="update"value="Update">
		</p>

		<div class="notes">
		<h2>Notes</h2>

		<div class="timelist">
			<div class="report">
				<div class="info">
					<p class="time">2/10/2016 11:35am</p>
					<p class="agent">Martin, Harvey</p>
				</div>
				<p>Initial meeting with client. He's very concerned
					Felix will just not shut up at night. It's not like him to caterwaul so much, so there
					must be something going on in the neighborhood.</p>

			</div>

			<div class="report">
				<div class="info">
					<p class="time">2/14/2016 2:15pm</p>
					<p class="agent">Martin, Harvey</p>
				</div>
				<p>Met with the client to discuss the case.</p>
			</div>
		</div>

		<p>
			<label for="note">Notes</label><br>
			<textarea id="note" name="note" placeholder="Note"></textarea>
		</p>
		<p>
			<input type="submit" value="Add Note">
		</p>
		</div>

		<div class="reports">
			<h2>Reports</h2>

			<div class="timelist">
				<div class="report">
					<div class="info">
						<p class="time"><a href="report.php">2/12/2016 1:35am</a></p>
						<p class="agent">Martin, Harvey</p>
					</div>
					<p>Surveillance of neighborhood for three hours. Nothing untoward spotted.</p>

				</div>
			</div>

			<div class="timelist">
				<div class="report">
					<div class="info">
						<p class="time"><a href="report.php">2/13/2016 2:15am</a></p>
						<p class="agent">Martin, Harvey</p>
					</div>
					<p>Surveillance of neighborhood for two hours. Spotted a very attractive
						Siamese cat wandering though. Caterwauling commenced.</p>

				</div>
			</div>

			<p>
				<input type="submit" value="Add Report">
			</p>
		</div>

	</fieldset>
</form>
HTML;
    return $html;
    }
    private $id;
    private $site;
}