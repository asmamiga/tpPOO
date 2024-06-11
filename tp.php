<?php
//I. La classe Point2D en php :
class Point2D {
    private $x;
    private $y;
    public function __construct($x = 0, $y = 0) {
        $this->x = $x;
        $this->y = $y;
    }
    public function setX($x) {
        $this->x = $x;
    }
    public function setY($y) {
        $this->y = $y;
    }
    public function getX() {
        return $this->x;
    }
    public function getY() {
        return $this->y;
    }
    public function __toString() {
        return "Point(x={$this->x}, y={$this->y})";
    }
    public function bouger($dx,$dy){
        $this->x += $dx ;
        $this->y += $dy;
    }
}
$point = new Point2D(10, 7);
echo $point . "<br>";
$point->bouger(5, 7);
echo $point . "<br>";
echo "<br><hr><br>";
//II. La classe abstraite Forme en php :
abstract class Forme {
    protected $centre; //drtha protected cuz private didn't work in class Rectangle -> function toString
    private $id;
    private static $count = 0;

    public function __construct(Point2D $centre) {
        $this->centre = $centre;
        self::$count++;
        $this->id = self::$count;
    }
    public function getId() {
        return $this->id;
    }

    abstract public function surface();
    abstract public function perimetre();
    public function bouger($dx, $dy) {
        $this->centre->bouger($dx, $dy);
    }
}
//III. La classe Rectangle en php :
class Rectangle extends Forme{
    protected $largeur;
    protected $longueur; // ta howa the same thing changed from private to protected

    // Constructeur d'initialisation
    public function __construct(Point2D $centre, $largeur, $longueur) {
        parent::__construct($centre);
        $this->largeur = $largeur;
        $this->longueur = $longueur;
    }
    public function getLargeur() {
        return $this->largeur;
    }
    public function setLargeur($largeur) {
        $this->largeur = $largeur;
    }
    public function getLongueur() {
        return $this->longueur;
    }

    public function setLongueur($longueur) {
        $this->longueur = $longueur;
    }
    public function surface() {
        return $this->largeur * $this->longueur;
    }
    public function perimetre() {
        return 2 * ($this->largeur + $this->longueur);
    }
    public function __toString() {
        return "<pre>{<br>" . 
                " Rectangle : " . $this->getId() . "<br>" .
                " Centre : " . $this->centre->__toString() . "<br>" .
                " Largeur : " . $this->largeur . "<br>" .
                " Longueur : " . $this->longueur . "<br>" .
                " Surface : " . $this->surface() . "<br>" .
                " Périmètre : " . $this->perimetre() . "<br>" .
                "}</pre>";
    }
}
// Exemples de rectangles
$centre1 = new Point2D(2, 3);
$rec1 = new Rectangle($centre1, 1, 2);
echo $rec1 . "<br>";
echo "<br><hr><br>";
//IV. La classe Cercle :
class Cercle extends Forme{
    private $rayon;
    public function setRayon($rayon){
        $this->rayon = $rayon;
    }
    public function getrayon(){
        return $this->rayon;
    }
    public function __construct(Point2D $centre, $rayon){
        parent::__construct($centre);
        $this->centre = $centre;
        $this->rayon = $rayon;
    }
    public function surface()
    {
        return round(pow($this->rayon,2)*M_PI,2);    }
    public function perimetre()
    {
        return round(2*$this->rayon*M_PI,2);
    }
    public function __toString(){
        return "<pre>{<br>" . 
            " Cercle : " . $this->getId() . "<br>" .
            " Centre : " . $this->centre->__toString() . "<br>" .
            " Rayon : " . $this->rayon . "<br>" .
            " Surface : " . $this->surface() . "<br>" .
            " Périmètre : " . $this->perimetre() . "<br>" .
            "}</pre>";
    }
}
// Exemples de cercles
$centre2 = new Point2D(3, 3);
$cer2 = new Cercle($centre2, 2);
echo $cer2 . "<br>";
echo "<br><hr><br>";
//
//V. La classe Carré :
final class Carre extends Rectangle{ //final refers to that there would not be any inheritance after.
    public function __construct(Point2D $centre, $longueur) {
        parent::__construct($centre, $longueur, $longueur);
        $this->longueur = $longueur;
    }
    public function __toString() {
        return "<pre>{<br>" . 
                " Carre : " . $this->getId() . "<br>" .
                " Centre : " . $this->centre->__toString() . "<br>" .
                " Longueur : " . $this->longueur . "<br>" .
                " Surface : " . $this->surface() . "<br>" .
                " Périmètre : " . $this->perimetre() . "<br>" .
                "}</pre>";
    }
}
// Exemple de carre
$centre3 = new Point2D(3, 3);
$carre3 = new Carre($centre3, 1);
echo $carre3 . "<br>";


