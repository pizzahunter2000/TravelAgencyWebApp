<?php

class MainManager extends Controller
{
	//! Display content of Home page
	function launchMainPage($f3, $args)
	{
		require 'requirements.php';

				$f3->set('html_title', 'Main Page');
				$f3->set('content','MainPage.html');
				echo \Template::instance()->render('Layout.html');
	}
}
