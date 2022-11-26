<?php

class AttractionManager extends Controller
{
	//! Display content of Home page
	function showAllAttractions($f3, $args)
	{
		require 'requirements.php';

		//		$employees=new DB\SQL\Mapper($db,'Employee');
		//		$employees = $employees->find(array(''),array('order'=>'LastName, FirstName'));
		
				$attractionsMap = new DB\SQL\Mapper($db, 'attraction');
				$attractions = $attractionsMap->find(array(''), array('order' => 'country_id', 'attr_name', 'type'));
		
				$f3->set('attraction', $attractions);
				$f3->set('html_title', 'My Web Page');
				$f3->set('content','HomePage.html');
				echo \Template::instance()->render('Layout.html');
	}

}
