# Easy XML

Simplifies the PHP SimpleXMLElement() Class

Version 1.3.0

### Example of use:
		
#### Reads a XML file (used as a template)
See **example_1/example.php** for more information
```
$xml = new EasyXML;

$xml->read(Array(
	'path' => 'breakfast-menu.xml'
));
```		
#### Create a new XML (without a template)
See **example_2/example.php** for more information
```		
$xml = new EasyXML;

$xml->start(Array(
	"xml" => "<?xml version=\"1.0\" encoding=\"iso-8859-15\"?><documents></documents>"
));
```

#### Working with EasyXML properties
		
The object's property 'content' has all the content of the started or read XML
See **example_1/example.php** for more information
```
var_dump($xml->content);
```

Direct Access to a node content
See **example_1/example.php** for more information
```
var_dump($xml->content->header);
```

Changes a node content
See **example_3/example.php** for more information
```
$xml->content->header->title = "It's an information";
```
		
Direct Access to a attribute in a sibling node (second node)
See **example_3/example.php** for more information
```
var_dump($xml->content->node[1]['id']);
```
Show all attributes from a node
See **example_3/example.php** for more information
```		
var_dump($xml->content->node->attributes());
```

#### SPECIAL METHODS
		
This method inserts data protected by CDATA
```
$xml->cData(Array(
	'node' 		=> $xml->content->header->title,
	'content'	=> 'The title'
));
```
This method seeks for a pair attribute:value inside a node level
The example below seeks for a <node id="new">...</node> inside <nodes>...</nodes> and sends to $fields variable
```
$fields = $xml->seekAttribute(Array(
	"node" 		=> $xml->content->nodes->node,
	"attribute" => "id",
	"value" 	=> "new"
))->field;
```
See **example_5/example.php** for more information

The example below gets the previous structure ($fields) and seeks for a <field id="tag"></field> and print the content inside <content></content>
```
echo $xml->seekAttribute(Array(
	"node" 		=> $fields,
	"attribute" => "id",
	"value" 	=> "tag"
))->content;
```		
#### Saving files

You can save the content to a file if needed
Just insert the path to generate the file. The method knows that the information is inside of **$this->content** object
```
$xml->write(Array(
	'path' => '../test/t.xml'
));
```		
See **example_4/example.php** for more information
If XML content can't be read, '$this->content' returns 'false' as boolean

#### Trick
Converting an 'IN MEMORY' XML string into a EasyXML object
This method can be used when a XML under a .zip file has been read into the memory. 
The XML content actually is a string in memory. To convert string memory into a EasyXML object you can use:
```
$xml->start(Array(
	"xml" => $XML_StringContentInMemory
));
```
After this procedure you can read the EasyXML object by
```
var_dump($xml->content);
```