<?php

class Contenu
{
    public $titre;
    public $texte;

    public function __construct($titre, $texte)
    {
        $this->titre = $titre;
        $this->texte = $texte;
    }

    public function affichage()
    {
        return "<h2>" . $this->titre . "</h2><p>" . $this->texte . "</p>";
    }
}

class Articles extends Contenu
{
    public $dernieresNouvelles;

    public function affichage()
    {
        $titreAffichage = $this->dernieresNouvelles ? "<strong>RUPTURE : </strong>" . $this->titre : $this->titre;
        return "<h2>" . $titreAffichage . "</h2><p>" . $this->texte . "</p>";
    }
}

class Publicites extends Contenu
{
    public function affichage()
    {
        return "<h2>" . strtoupper($this->titre) . "</h2><p>" . $this->texte . "</p>";
    }
}

class PostesVacants extends Contenu
{
    public function affichage()
    {
        return "<h2>" . $this->titre . "</h2><p>" . $this->texte . " - postulez maintenant ! </p>";
    }
}

$contenus = array(
    new Articles("Les dernières avancées technologiques", "Découvrez les innovations les plus récentes dans le domaine de la technologie."),
    new Articles("Conseils pour une alimentation saine", "Apprenez comment adopter une alimentation équilibrée pour une vie saine."),
    new Publicites("Promotion spéciale - Électroménagers", "Profitez de réductions exceptionnelles sur une gamme d'électroménagers de haute qualité."),
    new PostesVacants("Ingénieur en logiciel senior", "Rejoignez notre équipe dynamique en tant qu'ingénieur en logiciel senior. Expérience dans le développement web requis.")
);

foreach ($contenus as $contenu) {
    echo $contenu->affichage() . "<br><br>";
}
?>
