<?php 
	/*
	*
	* Create a new XML
	* 
	 */
	include "../EasyXML.class.php";

	$xml = new EasyXML;

	$xml->start(Array(
		'xml' => "<?xml version=\"1.0\" encoding=\"iso-8859-15\"?><documents><item><name>Mike</name><age>21</age></item><item><name>John</name><age>35</age></item></documents>"
	));

	var_dump($xml);