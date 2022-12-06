<?php

class AttractionManager extends Controller
{
	//! Display content of Home page
	function showAllAttractions($f3, $args)
	{
		require 'requirements.php';

				$attractionsMap = new DB\SQL\Mapper($db, 'attraction');
				$attractions = $attractionsMap->find(array(''), array('order' => 'id'));
		
				$countries = $attractionsMap->find(array(''),
						 array('order' => 'country_id', 'group' => 'country_id'));

				$types = $attractionsMap->find(array(''),
						 array('order' => 'type', 'group' => 'type'));
		//		$countries = $db->exec('SELECT distinct country.id, country_name from country join
		//					attraction on country.id = attraction.country_id');

		//		$f3->set('countries', array($db->exec('SELECT distinct country.id, country_name from country join
		//			attraction on country.id = attraction.country_id')));
				$f3->set('countries', $countries);
				$f3->set('types', $types);

				$f3->set('attraction', $attractions);
				$f3->set('html_title', 'My Web Page');
				$f3->set('content','HomePage.html');
				echo \Template::instance()->render('Layout.html');
	}

}
