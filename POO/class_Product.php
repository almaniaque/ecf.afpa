<?php
class Product {

    private $name;
    private $price;
    private $promotion;
    private $discount;
    private $categorie;

    public function __construct( $name,  $price,  $promotion,  $discount, $categorie){
    $this->name = $name;
    $this->price = $price;
    $this->promotion = $promotion;
    $this->discount = $discount;
    $this->categorie =$categorie;
    }
	

    public function getName() {return $this->name;}

	public function getPrice() {return $this->price;}

	public function getPromotion() {return $this->promotion;}

	public function getDiscount() {return $this->discount;}

	public function getCategorie() {return $this->categorie;}

	public function setName( $name): void {$this->name = $name;}

	public function setPrice( $price): void {$this->price = $price;}

	public function setPromotion( $promotion): void {$this->promotion = $promotion;}

	public function setDiscount( $discount): void {$this->discount = $discount;}

	public function setCategorie( $categorie): void {$this->categorie = $categorie;}

}

?>