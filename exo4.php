<?php

class Etudiant
{
    public $nom;
    public $note;

    public function __construct($nom, $note)
    {
        $this->nom = $nom;
        $this->note = $note;
    }
}

class Groupe
{
    public $etudiants = [];

    public function ajoutEtudiant(Etudiant $etudiant)
    {
        $this->etudiants[] = $etudiant;
    }

    public function moyenne()
    {
        $totalNotes = 0;

        foreach ($this->etudiants as $etudiant) {
            $totalNotes += $etudiant->note;
        }

        return count($this->etudiants) > 0 ? $totalNotes / count($this->etudiants) : 0;
    }

    public function deplacerEtudiant(Groupe $destinationGroupe, Etudiant $etudiant)
    {
       
        $key = array_search($etudiant, $this->etudiants);
        if ($key !== false) {
            unset($this->etudiants[$key]);

            $destinationGroupe->ajoutEtudiant($etudiant);
        }
    }
}

$groupe1 = new Groupe();
$groupe2 = new Groupe();

$groupe1->ajoutEtudiant(new etudiant("Damien", 10));
$groupe1->ajoutEtudiant(new etudiant("Otman", 8));
$groupe1->ajoutEtudiant(new etudiant("Alexis", 9));
$groupe1->ajoutEtudiant(new etudiant("Giuseppe", 4));
$groupe1->ajoutEtudiant(new etudiant("Aurélien", 5));
$groupe1->ajoutEtudiant(new etudiant("Ugur", 7));
$groupe1->ajoutEtudiant(new etudiant("Huseyin", 2));
$groupe1->ajoutEtudiant(new etudiant("Mathias", 3));
$groupe1->ajoutEtudiant(new etudiant("Noé", 1));
$groupe1->ajoutEtudiant(new etudiant("Julien", 0));

$groupe2->ajoutEtudiant(new etudiant("Alice", 1));
$groupe2->ajoutEtudiant(new etudiant("Cassidy", 8));
$groupe2->ajoutEtudiant(new etudiant("Jérémy", 9));
$groupe2->ajoutEtudiant(new etudiant("John", 10));
$groupe2->ajoutEtudiant(new etudiant("Alexandre", 5));
$groupe2->ajoutEtudiant(new etudiant("Nicolas", 6));
$groupe2->ajoutEtudiant(new etudiant("Stephane", 2));
$groupe2->ajoutEtudiant(new etudiant("Stephanie", 3));
$groupe2->ajoutEtudiant(new etudiant("Ryan", 1));
$groupe2->ajoutEtudiant(new etudiant("Joe", 8));

echo "Moyenne Groupe 1: " . $groupe1->moyenne() . "<br>";
echo "Moyenne Groupe 2: " . $groupe2->moyenne() . "<br>";

$maxNoteGroupe1 = -1;
$maxEtudiantGroupe1 = null;

foreach ($groupe1->etudiants as $etudiant) {
    if ($etudiant->note > $maxNoteGroupe1) {
        $maxNoteGroupe1 = $etudiant->note;
        $maxEtudiantGroupe1 = $etudiant;
    }
}

$minNoteGroupe2 = PHP_INT_MAX;
$minEtudiantGroupe2 = null;

foreach ($groupe2->etudiants as $etudiant) {
    if ($etudiant->note < $minNoteGroupe2) {
        $minNoteGroupe2 = $etudiant->note;
        $minEtudiantGroupe2 = $etudiant;
    }
}

$groupe1->deplacerEtudiant($groupe2, $maxEtudiantGroupe1);
$groupe2->deplacerEtudiant($groupe1, $minEtudiantGroupe2);


echo "Moyenne Groupe 1 après déplacement: " . $groupe1->moyenne() . "<br>";
echo "Moyenne Groupe 2 après déplacement: " . $groupe2->moyenne() . "<br>";