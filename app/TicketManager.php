<?php

class TicketManager extends Controller
{
	function viewTickets($f3, $args)
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

	function addTicket($f3, $args)
	{
		require 'requirements.php';

				$f3->set('html_title', 'Add Ticket');
				$f3->set('content','AddTicket.html');
				echo \Template::instance()->render('Layout.html');
	}
}
