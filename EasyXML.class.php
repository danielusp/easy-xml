<?php
	/**
	 * Easy XML
	 * 
	 * @author [Daniel Mendonça]
	 * @version [1.3.0]
	 * 
	 */
	
	
	Class EasyXML
	{
		
		private $path_source;
		private $path_target;
		
		public $content;
		
		public function __construct(){}
		
		/**
		 * Generate a new XML (without a template)
		 * @param  Array $params 	['xml']
		 * @return void [or an error warning]
		 */
		public function start(Array $params)
		{
			try {
				
				$this->content = new SimpleXMLElement($params['xml']);
				
			} catch(Exception $e) {
				
				echo $e;
				
			}
		}
		
		
		/**
		 * Path to the source file, used as template: $params['path']
		 * @param  Array $params 	['path'] is the path to file
		 * @return void         
		 */
		public function read(Array $params)
		{
			$this->path_source = $params['path'];

			if  (!$this->content = @simplexml_load_file($this->path_source,'SimpleXMLElement', LIBXML_NOCDATA))  $this->content = false;
		}
		
		
		/**
		 * Specific for data protected by CDATA
		 * @param  Array 	$params 	['node'] 	= $xml->content->header->portal, 
		 *                         		['content'] = 'node text'
		 * @return void
		 */
		public function cData(Array $params)
		{
			$name	= $params['node']->getName();
			$parent	= $params['node']->xpath("..");
			
			//	Clears the previous node information
			$parent[0]->$name = "";
			
			$node = dom_import_simplexml($params['node']);
			
			$no = $node->ownerDocument;
			$node->appendChild($no->createCDATASection($params['content']));
		}


		/**
		 * Seeks for a specific attribute with a specific value in a node group
		 * and return all the xml chain for that node
		 * @param  Array  $params ['node'], ['attribute'], ['value']
		 * @return Object         XML chain from node that matches attribute:value pair
		 */
		public function seekAttribute(Array $params)
		{
			
			$c = 0;
			foreach ($params['node'] as $value) {
				
				if ((String) $value->attributes()->{$params['attribute']} == $params['value']) {
					
					return $params['node'][$c];
					break;
				}

				$c++;
			}
		}
		
		
		/**
		 * Generate the final file
		 * @param  Array 	$params 	['path'] is the path to generate the file
		 * @return void
		 */
		public function write(Array $params)
		{
			$this->path_target = $params['path'];
			
			try {
			
				$this->content->asXML($this->path_target);
				
			}
			catch(Exception $e){}
		}
		
	
	}