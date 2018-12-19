<?php 
	/*
	*
	* A lot of examples
	* 
	 */
	include "../EasyXML.class.php";

	$xml = new EasyXML;

	$xml->read(Array(
		'path' => '../templates/breakfast-menu.xml'
	));

	//	Changes a node content
	echo (String) "<p>{$xml->content->food[3]->name}</p>";
	$xml->content->food[3]->name = "New French Toast";
	echo (String) "<p>{$xml->content->food[3]->name}</p>";

	//	Direct Access to a attribute in a sibling node
	echo (String) "<p>{$xml->content->food[4]['obs']}</p>";

	//	Show all attributes from a node
	var_dump($xml->content->food[0]->attributes());
