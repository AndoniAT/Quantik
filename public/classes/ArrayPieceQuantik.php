<?php
    require_once('PieceQuantik.php');
    /**
     * Class nous permettant d'avoir un tableau avec des pièces dedans
     */
    class ArrayPieceQuantik {
        protected array $piecesQuantiks;
        protected int $taille;

        /**
         * Pour initialiser notre tableau on le fait avec 4 éléments vides
         * c'est à dire que nous allons utiliser initVoid pour obtenir une pièce vide
         */
        public function __construct() {
            $this->taille = 4;

            for($i = 0 ; $i < $this->taille ; $i++) {
                $this->piecesQuantiks[] = PieceQuantik::initVoid();
            }
        }

        /**
         * Affichage du tableau
         */
        public function __toString() : string {
            $affichage="";
            
            foreach($this->piecesQuantiks as $i => $elem){
                $affichage = $affichage . " " . $i . ".- " . $elem . "<br>";
            }

            return $affichage;
        }

        /**
         * Obtenir une pièce spécifique du tableau
         * @param pos : Position du tableau que nous souhaitons récupérer
         */
        public function getPieceQuantik(int $pos) {
            if($pos < $this->getTaille()) {
                return $this->piecesQuantiks[$pos];   
            } else {
                echo "Impossible d'afficher, hors tableau";
                return;
            }
        }

        /**
         * Établir une piece dans un champ spécifique du tableau
         * @param pos : Position du tableau que nous souhaitons modifier
         * @param piece : Nouvelle pièce que nous souhaitons placer dans la position
         */
        public function setPieceQuantik(int $pos, PieceQuantik $piece) : void {
            if($pos < $this->getTaille())
                $this->piecesQuantiks[$pos] = $piece; 
            else echo 'Insertion impossible';

            return;
        }

        /**
         * Ajouter une nouvelle pièce au tableau
         * @param piece : Nouvelle pièce que nous souhaitons insérer
         */
        public function addPieceQuantik(PieceQuantik $piece) : void {
            $this->piecesQuantiks[] = $piece;
            $this->taille++;
            return;
        }

        /**
         * Supprimer une pièce du tableau
         * @param pos : Position du tableau où se trouve la pièce que nous souhaitons supprimer
         */
        public function removePieceQuantik(int $pos) : void {
            unset($this->piecesQuantiks[$pos]);
            $this->taille--;
        }

        /**
         * Obtenir la taille du tableau
         */
        public function getTaille() : int {
            return $this->taille;
        }

        /**
         * Établir une taille au tableau
         * @param taille : nouvelle taille du tableau
         */
        public function setTaille(int $taille) : void {
            $this->taille = $taille;
        }
        
        /**
         * Méthode qu'initialise un tableau avec que des pièces noires (8 par défaut) 
         */
        public static function initPiecesNoires() : ArrayPieceQuantik {
            $array = new ArrayPieceQuantik();
            $array->setPieceQuantik(0, PieceQuantik::initBlackCone());
            $array->setPieceQuantik(1, PieceQuantik::initBlackCone());

            $array->setPieceQuantik(2, PieceQuantik::initBlackCube());
            $array->setPieceQuantik(3, PieceQuantik::initBlackCube());

            $array->addPieceQuantik(PieceQuantik::initBlackCylindre());
            $array->addPieceQuantik(PieceQuantik::initBlackCylindre());

            $array->addPieceQuantik(PieceQuantik::initBlackSphere());
            $array->addPieceQuantik(PieceQuantik::initBlackSphere());

            $array->setTaille(8);
            
            return $array;
        }

        
        /**
         * Méthode qu'initialise un tableau avec que des pièces blanches (8 par défaut) 
         */
        public static function initPiecesBlanches() : ArrayPieceQuantik {
            $array = new ArrayPieceQuantik();
            $array->setPieceQuantik(0, PieceQuantik::initWhiteCone());
            $array->setPieceQuantik(1, PieceQuantik::initWhiteCone());

            $array->setPieceQuantik(2, PieceQuantik::initWhiteCube());
            $array->setPieceQuantik(3, PieceQuantik::initWhiteCube());

            $array->addPieceQuantik(PieceQuantik::initWhiteCylindre());
            $array->addPieceQuantik(PieceQuantik::initWhiteCylindre());

            $array->addPieceQuantik(PieceQuantik::initWhiteSphere());
            $array->addPieceQuantik(PieceQuantik::initWhiteSphere());
            
            $array->setTaille(8);

            return $array;
        }
    }

    /* TEST  */
    
    /* echo "==== Initialisation dun array de 4 pieces vides ====  <br>";
    $array_void = new ArrayPieceQuantik();
    echo $array_void;
    */

    // Résultat attendu 
    /*
    0.- Forme : 0 Couleur : WHITE
    1.- Forme : 0 Couleur : WHITE
    2.- Forme : 0 Couleur : WHITE
    3.- Forme : 0 Couleur : WHITE
    */
    
    /*echo '<br>';

    echo "==== Initialisation dun array de 8 pieces noires ====  <br>";
    $array_noires = ArrayPieceQuantik::initPiecesNoires();
    echo $array_noires;
    */

    // Résultat attendu 
    /*
    0.- Forme : CONE Couleur : BLACK
    1.- Forme : CONE Couleur : BLACK
    2.- Forme : CUBE Couleur : BLACK
    3.- Forme : CUBE Couleur : BLACK
    4.- Forme : CYLINDRE Couleur : BLACK
    5.- Forme : CYLINDRE Couleur : BLACK
    6.- Forme : SPHERE Couleur : BLACK
    7.- Forme : SPHERE Couleur : BLACK
    */

    /*echo '<br><br>';
    
    echo "==== Initialisation dun array de 8 pieces blanches ====  <br>";
    $array_blanches = ArrayPieceQuantik::initPiecesBlanches();
    echo $array_blanches;
    */

    /*
    0.- Forme : CONE Couleur : WHITE
    1.- Forme : CONE Couleur : WHITE
    2.- Forme : CUBE Couleur : WHITE
    3.- Forme : CUBE Couleur : WHITE
    4.- Forme : CYLINDRE Couleur : WHITE
    5.- Forme : CYLINDRE Couleur : WHITE
    6.- Forme : SPHERE Couleur : WHITE
    7.- Forme : SPHERE Couleur : WHITE
    */

    /*echo '<br><br>';

    echo "==== Get Piece Hors Tableau ====  <br>";

    echo $array_noires->getPieceQuantik(10);
    */

    // Résultat attendu
    // Impossible d'afficher, hors tableau
    /*echo '<br><br>';
    echo "==== Get Piece ====  <br>";
    echo $array_noires->getPieceQuantik(0);
    */
    // Résultat attendu
    // Forme : CONE Couleur : BLACK
    /*
    echo '<br><br>';
    echo "==== Add Piece ====  <br>";
    $piece = PieceQuantik::initBlackCylindre();
    $array_noires->addPieceQuantik($piece);
    echo $array_noires->getPieceQuantik(8);
    */
    // Résultat attendu
    // Forme : CYLINDRE Couleur : BLACK
    /*
    echo '<br><br>';
    echo "==== Set Piece ====  <br>";
    $array_noires->setPieceQuantik(8, PieceQuantik::initBlackSphere());
    echo $array_noires->getPieceQuantik(8);
    */
    // Résultat attendu
    // Forme : SPHERE Couleur : BLACK
    /*
    echo '<br><br>';
    echo "==== Remove Piece ====  <br>";
    $array_noires->removePieceQuantik(8);
    echo $array_noires->getPieceQuantik(8);
    */
    // Résultat attendu
    // Impossible d'afficher, hors tableau
?>  
