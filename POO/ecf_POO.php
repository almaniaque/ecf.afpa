<?php
require_once("class_Categorie.php");
require_once("class_Product.php");

$categorie =[
    new categorie ("Spectacles Rodez"),
    new categorie ("Ordinateur Portable"),
];

$produits = [
    new Product ("MICHAËL GREGORIO", 43 , "Non" , "Non", $categorie[0]),
    new Product ("DANIEL GUICHARD", 43, "Non", "20%" , $categorie[0] ),
    new Product ("PC Portable Gaming MSI GL75 Leopard 10SFK457FR 17,3", 1999.99 , "oui", "20%" , $categorie[1]),
    new Product ("PC Portable Gaming Asus TUF505DVHN232T 15.6", 1499.99 , "oui", "33%" , $categorie[1]),
    new Product ("PC Portable Gaming Acer Predator Triton 700 PT715-51- 76D4 15.6", 3499.99 , "Non", "Non" , $categorie[1]),
];

// affichage des produits avec promotion

echo PHP_EOL;
echo "---------- produit avec promotion ----------" .PHP_EOL;
echo PHP_EOL;

foreach ($produits as $product ) {
    
    if ($product->getPromotion() == "oui"){
        echo $product->getName() .PHP_EOL;
        
    }
    
}

// calcule de remise et affichage des produits remisé avec et sans remise

echo PHP_EOL;
echo "------------- produit remisé -------------" .PHP_EOL;
echo PHP_EOL;

foreach ($produits as $product) {
    $remise = 0 ;
    $prix = 0 ;
    if ($product->getDiscount() != "Non") {
        $remise = str_replace("%", "", intval(strtolower($product->getDiscount())));
        $prix = ($product->getPrice()/100)*$remise ;
        echo $product->getName().PHP_EOL;
        echo "prix avant remise : " .$product->getPrice().PHP_EOL;
        echo "prix apres remise : " .$product->getPrice()-$prix .PHP_EOL;
        echo PHP_EOL;
        }
}

// trie des produit par nom 

function trierProduit($produits, $ordre = "ASC") {
    
    usort($produits, function($a, $b) use ($ordre) {


        $valA = strtolower($a->getName());
        $valB = strtolower($b->getName());


        if ($valA == $valB) {
            return 0 ;
        };

        if ($ordre == "ASC") {
            return ($valA < $valB) ? -1 : 1;
        } 
        else {
            return ($valA > $valB) ? -1 : 1;
        };

        
    });
    return $produits;
}

$produitsTries = trierProduit($produits, "ASC");
echo PHP_EOL;
echo"------------- Produits Triés -------------" .PHP_EOL;
echo PHP_EOL;

foreach ($produitsTries as $product) {
    
    echo $product->getName() .PHP_EOL;
}
echo PHP_EOL;

// trie par categorie

function trierCategorie($produits, $ordre = "ASC") {
    
    usort($produits, function($a, $b) use ($ordre) {


        $valA = strtolower($a->getCategorie()->getName());
        $valB = strtolower($b->getCategorie()->getName());

        if ($valA == $valB) {
            //si la categorie est équivalent on compare par le nom
				
			$valA=strtolower($a->getName());
			$valB=strtolower($b->getName());
			
            if ($valA == $valB) {
                return 0 ;
            };
        }
        if ($ordre == "ASC") {
            return ($valA < $valB) ? -1 : 1;
        } 
        else {
            return ($valA > $valB) ? -1 : 1;
        };

        
    });
    return $produits;
}

$CategorieTries = trierCategorie($produits, "ASC");

echo PHP_EOL;
echo "------------- Produits triés par catégorie -------------" .PHP_EOL;


$categorieActuelle = "";

foreach ($CategorieTries as $product) {

    $nomCategorie = $product->getCategorie()->getName();

    if ($nomCategorie != $categorieActuelle) {
        $categorieActuelle = $nomCategorie;
        echo PHP_EOL;
        echo $categorieActuelle . " -------------" .PHP_EOL;
        echo PHP_EOL;
    }

    echo $product->getName() .PHP_EOL;

}

echo PHP_EOL;

// demande pour appliquer une promo ou une remise 


while (true) {

    echo "Voulez-vous appliquer une promotion ou une remise ?" .PHP_EOL;
    echo "1. Oui" .PHP_EOL;
    echo "2. Non" .PHP_EOL;

    $choix = trim(readline("Choix : "));

    if ($choix == "1") {

        echo "1. Remise" .PHP_EOL;
        echo "2. Promotion" .PHP_EOL;

        $choixType = trim(readline("Choix : "));

        echo "A quel produit voulez-vous l'appliquer ?" .PHP_EOL;

        foreach ($produits as $index => $produit) {
            echo $index . " - " . $produit->getName() .PHP_EOL;
        }

        $choixProduit = trim(readline("Choix : "));

        if (!isset($produits[$choixProduit])) {
            echo "Produit invalide." .PHP_EOL;
            continue;
        }

        $produitChoisi = $produits[$choixProduit];

        if ($choixType == "1") {
            $reduction = trim(readline("Indiquer le pourcentage de remise : "));
            $produitChoisi->setDiscount($reduction);

            echo "Remise appliquée à " . $produitChoisi->getName() .PHP_EOL;
            echo "Remise effectuer : " .$produitChoisi->getDiscount() ." %" .PHP_EOL;
            echo "Prix avant remise : " .$produitChoisi->getPrice() .PHP_EOL;
            echo "Prix après Remise : " .($produitChoisi->getPrice()/100)*$produitChoisi->getDiscount() .PHP_EOL;
        }
        else if ($choixType == "2") {
            $promotion = trim(readline("Indiquer la promotion : "));
            $produitChoisi->setPromotion($promotion);

            echo "Promotion appliquée à " . $produitChoisi->getName() .PHP_EOL;
        }
        else {
            echo "Choix invalide." .PHP_EOL;
        }

        break;
    }
    else if ($choix == "2") {
        echo "Aucune remise/promotion appliquée." .PHP_EOL;
        break;
    }
    else {
        echo "Choix invalide." .PHP_EOL;
    }
}

?>