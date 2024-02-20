<?php

class Panier
{
    private string $nom;
    private int $quantite;
    private float $prix;
    private float $tauxTVA;

    public function __construct(string $nom, int $quantite, float $prix, float $tauxTVA)
    {
        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->tauxTVA = $tauxTVA;
    }

    public function getPrixTotal()
    {
        return $this->quantite * $this->prix;
    }

    public function getPrixHTVA()
    {
        return $this->getPrixTotal() / (1 + $this->tauxTVA);
    }

    public function getPrixTVA()
    {
        return $this->getPrixTotal() - $this->getPrixHTVA();
    }
}


$bananes = new Panier("Banane", 6, 1, 0.06);
$pommes = new Panier("Pomme", 3, 1.5, 0.06);
$vin = new Panier("Bouteille de vin", 2, 10, 0.21);

// PRIX TOTAL
$prixTotal = $bananes->getPrixTotal() + $pommes->getPrixTotal() + $vin->getPrixTotal();
echo "Prix total : " . round($prixTotal, 2) . " €\n";

// TVA
$taxesTotal = $bananes->getPrixTVA() + $pommes->getPrixTVA() + $vin->getPrixTVA();
echo "tva : " . round($taxesTotal, 2) . " €\n";
