<?php

class TicketManager extends Controller
{
	//! Display content of Home page
	function viewTickets($f3, $args)
	{
		require 'requirements.php';

				$f3->set('html_title', 'View Tickets');
				$f3->set('content','Tickets.html');
				echo \Template::instance()->render('Layout.html');
	}
}
