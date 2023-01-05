<?php

class CustomerManager extends Controller
{
	function viewCustomers($f3)
	{
		require 'requirements.php';

				$f3->set('people', $db->exec('SELECT person.id AS id, person.name AS name, attraction.attr_name AS favourite_attraction,
                    title.name AS title, account.username AS account FROM person JOIN attraction ON person.favourite_attraction = attraction.id
                    JOIN title ON person.title_id = title.id LEFT JOIN account ON person.account_id = account.id
                    ORDER BY id'));

				$f3->set('html_title', 'View Customers');
				$f3->set('content','ViewCustomers.html');
				echo \Template::instance()->render('Layout.html');
	}
}