<?php 
	/*
	*
	* Reads an XML file
	* 
	 */
	include "../EasyXML.class.php";

	$xml = new EasyXML;

	$xml->read(Array(
		'path' => '../templates/breakfast-menu.xml'
	));

	// All object structure
	var_dump($xml);

	// All content
	var_dump($xml->content);

	// Direct Access to a node content
	var_dump($xml->content->food[2]);
	var_dump($xml->content->food[2]->price);