<?php

class AttractionManager extends Controller
{
	//! Display content of Home page
	function showAllAttractions($f3, $args)
	{
		require 'requirements.php';

				$attractionsMap = new DB\SQL\Mapper($db, 'attraction');
				$attractions = $attractionsMap->find(array(''), array('order' => 'id'));
		
				//$countries = $attractionsMap->find(array(''),
				//		 array('order' => 'country_id', 'group' => 'country_id'));

				$types = $attractionsMap->find(array(''),
						 array('order' => 'type', 'group' => 'type'));

				//$f3->set('countries', $countries);
				$f3->set('countries', $db->exec('SELECT distinct country.id, country.country_name
					FROM country JOIN attraction ON country.id = attraction.country_id'));
				$f3->set('types', $types);

				$f3->set('attraction', $attractions);
				$f3->set('html_title', 'Every Attraction');
				$f3->set('content','Attractions.html');
				echo \Template::instance()->render('Layout.html');
	}

	function showAttractionsOfAType($f3, $args)
	{
		require 'requirements.php';

				$attractionType = '%';

				if($f3->get('PARAMS.FilterType') == "No Filter"){
					$attractionType = '%';
				}
				else{
					$attractionType = $f3->get('PARAMS.FilterType');
				}

				$attractionsMap = new DB\SQL\Mapper($db, 'attraction');
				$attractions = $attractionsMap->find(array('type LIKE ?', $attractionType),
				 array('order' => 'id'));

				$types = $attractionsMap->find(
					array(''),
					array('order' => 'type', 'group' => 'type'));

				$f3->set('countries', $db->exec('SELECT distinct country.id, country.country_name
					FROM country JOIN attraction ON country.id = attraction.country_id'));
				$f3->set('types', $types);

				$f3->set('attraction', $attractions);
				$f3->set('html_title', 'Filtered Attractions');
				$f3->set('content','Attractions.html');
				echo \Template::instance()->render('Layout.html');
	}

	function showAttractionsOfACountry($f3, $args)
	{
		require 'requirements.php';

				$country = '%';

				if($f3->get('PARAMS.FilterCountry') == "No Filter"){
					$country = '%';
				}
				else{
					$country = $f3->get('PARAMS.FilterCountry');
				}

				$attractionsMap = new DB\SQL\Mapper($db, 'attraction');
				$attractions = $attractionsMap->find(array('country_id = ?', $country),
				 	array('order' => 'id'));
		

				$types = $attractionsMap->find(
					array(''),
					array('order' => 'type', 'group' => 'type'));

				$f3->set('countries', $db->exec('SELECT distinct country.id, country.country_name
					FROM country JOIN attraction ON country.id = attraction.country_id'));
				$f3->set('types', $types);

				$f3->set('attraction', $attractions);
				$f3->set('html_title', 'Filtered Attractions');
				$f3->set('content','Attractions.html');
				echo \Template::instance()->render('Layout.html');
	}
}
