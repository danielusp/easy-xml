<?php 
	/*
	*
	* A lot of examples
	* 
	 */
	include "../EasyXML.class.php";

	$xml = new EasyXML;

	//	Starts a new XML in memory
	$xml->start(Array(
		'xml' => "<?xml version=\"1.0\" encoding=\"iso-8859-15\"?>
<documents>
	<item>
		<name>Mike</name>
		<age>21</age>
	</item>
	<item>
		<name>John</name>
		<age>35</age>
	</item>
	<item>
		<name>João</name>
		<age>42</age>
	</item>
</documents>
		"
	));

	//	This method inserts data protected by CDATA
	$xml->cData(Array(
		'node' 		=> $xml->content->item[2]->name,
		'content'	=> '<strong>Name: "\'João\'";</strong>'
	));
	

	//	You can save the content to a file if needed
	//	Just insert the path to generate the file. The method knows that the information is inside of '$this->content' object

	$xml->write(Array(
		'path' => 'test.xml'
	));