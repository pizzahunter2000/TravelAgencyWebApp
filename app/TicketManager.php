<?php

class TicketManager extends Controller
{
	function viewTickets($f3)
	{
		require 'requirements.php';

				$f3->set('tickets', $db->exec('SELECT ticket.id AS id, attraction.attr_name AS attraction,
					person.name AS person, ticket.price AS price
					FROM ticket JOIN attraction ON ticket.attraction_id = attraction.id JOIN
					person ON ticket.person_id = person.id ORDER BY id'));

				$f3->set('html_title', 'View Tickets');
				$f3->set('content','Tickets.html');
				echo \Template::instance()->render('Layout.html');
	}

	function addTicket($f3)
	{
		require 'requirements.php';

				$ticket = new class
				{
				};
				$ticket->person = "";
				$ticket->attraction = "";
				$ticket->price = 0;
				$f3->set('ticket', $ticket);
				$f3->set('errorMessage', '');
				$f3->set('html_title', 'Add Ticket');
				$f3->set('content','AddTicket.html');
				echo \Template::instance()->render('Layout.html');
	}

	function validTicket($f3, &$errorMessage, $ticket){
		require 'requirements.php';

		if(!preg_match("/^[a-zA-Z-' ]*$/", $ticket->person)){
			$errorMessage = $errorMessage . ' - Customer name invalid - ';
		}
		$countPeople = $db->exec("SELECT count(*) FROM person WHERE name LIKE '%". $ticket->person . "%'");
		//echo "Count(people): " . var_dump($countPeople);
		if(0 == $countPeople[0]["count"]){
			$errorMessage = $errorMessage . ' - Person not found -';
		}
		else{
			if(2 <= $countPeople[0]["count"]){
				$errorMessage = $errorMessage . ' - Too many people found -';
			}
		}
		if(!preg_match("/^[a-zA-Z-' ]*$/", $ticket->attraction)){
			$errorMessage = $errorMessage . ' - Attraction name invalid - ';
		}
		$countAttr = $db->exec("SELECT count(*) FROM attraction WHERE attr_name LIKE '%". $ticket->attraction . "%'");
		if(0 == $countAttr[0]["count"]){
			$errorMessage = $errorMessage . ' - Attraction not found - ';
		}
		else{
			if(2 <= $countAttr[0]["count"]){
				$errorMessage = $errorMessage . ' - Too many attractions found - ';
			}
		}
		if(!preg_match("/^[0-9.,]*$/", $ticket->price)){
			$errorMessage = $errorMessage . ' - Price invalid - ';
		}

		return $errorMessage == '';
	}

	function addTicketAct($f3)
	{
		require 'requirements.php';

				$ticketMap = new DB\SQL\Mapper($db, 'ticket');
				$ticket = new class{
				};
				$ticket->person = "";
				$ticket->attraction = "";
				$ticket->price = 0;

				$ticket->person = $_POST['person'];
				$ticket->attraction = $_POST['attraction'];
				$ticket->price = $_POST['price'];
				
				$errorMessage = "";

				$valid = TicketManager::validTicket($f3, $errorMessage, $ticket);
				if($valid){
					// add to database with save function
					// use reset function
					$personId = $db->exec("SELECT id FROM person WHERE name LIKE '%" . $ticket->person . "%'");
					$attrId = $db->exec("SELECT id FROM attraction WHERE attr_name LIKE '%" . $ticket->attraction . "%'");

					$ticketMap->price = $ticket->price;
					//echo var_dump($personId);
					//echo var_dump($attrId);
					$ticketMap->person_id = $personId[0]["id"];
					$ticketMap->attraction_id = $attrId[0]["id"];

					$ticketMap->save();
					$ticketMap->reset();

					$f3->reroute('/viewTickets');
				} else {
					//$ticket->person = "";
					//$ticket->attraction = "";
					//$ticket->price = 0;
					$f3->set('ticket', $ticket);
					$f3->set('errorMessage', $errorMessage);
					$f3->set('html_title', 'Add Ticket');
					$f3->set('content', 'AddTicket.html');
					echo \Template::instance()->render('Layout.html');
				}
	}

	function viewTicketsAct($f3){
		require 'requirements.php';

			$ticketMap = new DB\SQL\Mapper($db, 'ticket');
			$ticketToDelete = $ticketMap->findone(array('id = ?', $_POST["id"]));

			$ticketToDelete->erase();

			$f3->reroute('/viewTickets');
	}

	function updateTicket($f3, $args){
		require 'requirements.php';

		$f3->set('errorMessage', "");
		$f3->set('html_title', 'Update Ticket');
		$f3->set('content', 'UpdateTicket.html');
		echo \Template::instance()->render('Layout.html');
	}

	function validPersonName($f3, &$errorMessage, $ticket){
		require 'requirements.php';

		$valid = true;

		if(!preg_match("/^[a-zA-Z-' ]*$/", $ticket->person)){
			$errorMessage = $errorMessage . ' - Customer name invalid - ';
			$valid = false;
		}
		$countPeople = $db->exec("SELECT count(*) FROM person WHERE name LIKE '%". $ticket->person . "%'");
		//echo "Count(people): " . var_dump($countPeople);
		if(0 == $countPeople[0]["count"]){
			$errorMessage = $errorMessage . ' - Person not found -';
			$valid = false;
		}
		else{
			if(2 <= $countPeople[0]["count"]){
				$errorMessage = $errorMessage . ' - Too many people found - ';
				$valid = false;
			}
		}

		return $valid;
	}

	function validAttrName($f3, &$errorMessage, $ticket){
		require 'requirements.php';

		$valid = true;

		if(!preg_match("/^[a-zA-Z-' ]*$/", $ticket->attraction)){
			$errorMessage = $errorMessage . ' - Attraction name invalid - ';
			$valid = false;
		}
		$countAttr = $db->exec("SELECT count(*) FROM attraction WHERE attr_name LIKE '%". $ticket->attraction . "%'");
		if(0 == $countAttr[0]["count"]){
			$errorMessage = $errorMessage . ' - Attraction not found - ';
			$valid = false;
		}
		else{
			if(2 <= $countAttr[0]["count"]){
				$errorMessage = $errorMessage . ' - Too many attractions found - ';
				$valid = false;
			}
		}

		return $valid;
	}

	function validPrice($f3, &$errorMessage, $ticket){
		require 'requirements.php';

		$valid = true;

		if(!preg_match("/^[0-9.,]*$/", $ticket->price)){
			$errorMessage = $errorMessage . ' - Price invalid - ';
			$valid = false;
		}

		return $valid;
	}

	
	function updateTicketAct($f3, $args)
	{
		require 'requirements.php';

				$ticketMap = new DB\SQL\Mapper($db, 'ticket');
				$ticket = new class{
				};
				$ticket->person = "";
				$ticket->attraction = "";
				$ticket->price = 0;

				$ticket->person = $_POST['person'];
				$ticket->attraction = $_POST['attraction'];
				$ticket->price = $_POST['price'];
				
				$errorMessage = "";

				$validName = TicketManager::validPersonName($f3, $errorMessage, $ticket);
				$validAttrName = TicketManager::validAttrName($f3, $errorMessage, $ticket);
				$validPrice = TicketManager::validPrice($f3, $errorMessage, $ticket);

				$oldTicket = new DB\SQL\Mapper($db, 'ticket');
				$oldTicket->load(array('id = ?', $f3->get('PARAMS.id')));

				/*if($oldTicket->dry()){
					echo "No data found with id: " . $f3->get('PARAMS.id');
				}*/

				echo "Something: " . $f3->get('PARAMS.id');
			//	echo "Something again: " . var_dump($oldTicket);
			//	echo "Something again: " . var_dump($ticket);
				$correctInput = 0;

				if($validName){
					$personId = $db->exec("SELECT id FROM person WHERE name LIKE '%" . $ticket->person . "%'");
					//echo "Person id: " . var_dump($personId);
					if($ticket->person != ""){
						$oldTicket->person_id = $personId[0]["id"];
					}
					$correctInput = 1;
				}
				else {
					if($ticket->person == ""){
						$correctInput = 1;
					}
				}

				if($validAttrName){
					$attrId = $db->exec("SELECT id FROM attraction WHERE attr_name LIKE '%" . $ticket->attraction . "%'");
					if($ticket->attraction != ""){
						$oldTicket->attraction_id = $attrId[0]["id"];
					}
					$correctInput = 1;
				}
				else {
					if($ticket->attraction == ""){
						$correctInput = 1;
					}
				}

				if($validPrice){
					if($ticket->price != ""){
						//echo "Before: " . var_dump($oldTicket->price);
						$oldTicket->price = $ticket->price;
						//echo "After: " . var_dump($oldTicket->price);
					}
					$correctInput = 1;
				}
				else { 
					if($ticket->price == ""){
						$correctInput = 1;
					}
				}

				if($correctInput == 1){
					$oldTicket->save();
					$oldTicket->reset();
					//$ticketMap->save();
					$f3->reroute("/viewTickets");
				} else {
					$f3->set('errorMessage', $errorMessage);
					$f3->set('html_title', 'Update Ticket');
					$f3->set('content', 'UpdateTicket.html');
					echo \Template::instance()->render('Layout.html');
				}
	}

}
