<?php

#______           _    _____           _                  
#|  _  \         | |  /  ___|         | |                 
#| | | |__ _ _ __| | _\ `--. _   _ ___| |_ ___ _ __ ___   
#| | | / _` | '__| |/ /`--. \ | | / __| __/ _ \ '_ ` _ \  
#| |/ / (_| | |  |   </\__/ / |_| \__ \ ||  __/ | | | | | 
#|___/ \__,_|_|  |_|\_\____/ \__, |___/\__\___|_| |_| |_| 
#                             __/ |                       
#                            |___/

namespace darksystem\metadata;

use pocketmine\plugin\Plugin;

abstract class MetadataValue{
	
	protected $owningPlugin;

	protected function __construct(Plugin $owningPlugin){
		$this->owningPlugin = $owningPlugin;
	}
	
	public function getOwningPlugin(){
		return $this->owningPlugin->get();
	}
	
	public abstract function value();
	
	public abstract function invalidate();
	
}