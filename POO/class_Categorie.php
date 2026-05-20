<?php

class Categorie {
    private $name;
    

public function __construct($name,){
    $this->name = $name;
    
	
}
	public function getName() {
        return $this->name;
    }

	

	public function setName( $name): void {
        $this->name = $name;
    }



	
}

?>