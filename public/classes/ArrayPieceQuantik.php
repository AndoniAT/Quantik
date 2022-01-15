<?php
    require_once('PieceQuantik.php');
    /**
     * Class nous permettant d'avoir un tableau avec des pièces dedans
     */
    class ArrayPieceQuantik{
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
        public function getPieceQuantik(int $pos) : PieceQuantik {
            return $this->piecesQuantiks[$pos];
        }

        /**
         * Établir une piece dans un champ spécifique du tableau
         * @param pos : Position du tableau que nous souhaitons modifier
         * @param piece : Nouvelle pièce que nous souhaitons placer dans la position
         */
        public function setPieceQuantik(int $pos, PieceQuantik $piece) : void {
            $this->piecesQuantiks[$pos] = $piece;
            return;
        }

        /**
         * Ajouter une nouvelle pièce au tableau
         * @param piece : Nouvelle pièce que nous souhaitons insérer
         */
        public function addPieceQuantik(PieceQuantik $piece) : void {
            $this->piecesQuantiks[] = $piece;
            return;
        }

        /**
         * Supprimer une pièce du tableau
         * @param pos : Position du tableau où se trouve la pièce que nous souhaitons supprimer
         */
        public function removePieceQuantik(int $pos) : void {
            unset($this->piecesQuantiks[$pos]);
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
?>
