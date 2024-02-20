<?php

class Panier
{
    private string $nom;
    private int $quantite;
    private float $prix;
    private float $tauxTVA;
    private float $reduction;

    public function __construct(string $nom, int $quantite, float $prix, float $tauxTVA, float $reduction = 0.0)
    {
        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->tauxTVA = $tauxTVA;
        $this->reduction = $reduction;
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

    public function getReduction()
    {
        return $this->getPrixTotal() * $this->reduction;
    }
}

$bananes = new Panier("Banane", 6, 1, 0.06, 0.5);
$pommes = new Panier("Pomme", 3, 1.5, 0.06, 0.5);
$vin = new Panier("Bouteille de vin", 2, 10, 0.21);

// PRIX TOTAL
$prixTotal = $bananes->getPrixTotal() + $pommes->getPrixTotal() + $vin->getPrixTotal();
$prixTotalAvecReduction = $prixTotal - ($bananes->getReduction() + $pommes->getReduction() + $vin->getReduction());
echo "Prix total avec réduction : " . round($prixTotalAvecReduction, 2) . " €\n";

// TVA
$taxesTotal = $bananes->getPrixTVA() + $pommes->getPrixTVA() + $vin->getPrixTVA();
echo "TVA : " . round($taxesTotal, 2) . " €\n";
