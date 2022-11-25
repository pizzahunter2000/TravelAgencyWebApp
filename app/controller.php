<?php

//! Base controller
class Controller {

	protected
		$db;

	//! Instantiate class
	function __construct() {
		$f3=Base::instance();
		// Connect to the database

//		$db=new DB\SQL($f3->get('dbDSN'));				// SQLite Database
		$db=new DB\SQL($f3->get('dbDSN'), $f3->get('dbUserName'), $f3->get('dbPassWord')); 				// PostGreSQL Database

		new DB\SQL\Session($db);
		// Save frequently used variables
		$this->db=$db;
	}

}
