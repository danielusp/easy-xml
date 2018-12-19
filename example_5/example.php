<?php 
	/*
	*
	* A seek example
	* 
	 */
	include "../EasyXML.class.php";

	$xml = new EasyXML;

	$xml->read(Array(
		'path' => '../templates/breakfast-menu.xml'
	));


	// seeks for a pair attribute:value inside a node level
	$fields = $xml->seekAttribute(Array(
	    "node"      => $xml->content->food,
	    "attribute" => "obs",
	    "value"     => "price off"
	));

	//	Prints the <name> node content from seek process
	echo (String) "{$fields->name}";