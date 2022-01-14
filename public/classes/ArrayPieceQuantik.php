<?php
    require_once('PieceQuantik.php');

    class ArrayPieceQuantik{
        protected array $piecesQuantiks;
        protected int $taille;

        public function __construct() {
            $this->taille = 4;

            //for($i = 0 ; $i < $this->taille ; $i++) {
            $piece = PieceQuantik::initVoid();
                //echo $piece;
                //$this->piecesQuantiks[] = $piece;
            //}
            //echo $this->piecesQuantiks[0];
        }

        public function __toString() : string {
            $affichage="";
            
            foreach($this->piecesQuantiks as $elem){
                $affichage = $affichage . " " . $elem;
            }

            return $affichage;
        }

        public function getPieceQuantik(int $pos) : PieceQuantik {
            return $this->piecesQuantiks[$pos];
        }

        public function setPieceQuantik(int $pos, PieceQuantik $piece) : void {
            $this->piecesQuantiks[$pos] = $piece;
            return;
        }

        public function addPieceQuantik(PieceQuantik $piece) : void {
            $this->piecesQuantiks[] = $piece;
            return;
        }

        public function removePieceQuantik(int $pos) : void {
            unset($this->piecesQuantiks[$pos]);
        }

        public function getTaille() : int {
            return $this->taille;
        }

        public function setTaille(int $taille) : void {
            $this->taille = $taille;
        }

        public static function initPiecesNoires() : ArrayPieceQuantik {
            $array = new ArrayPieceQuantik();
            $array->setPieceQuantik(0, PieceQuantik::initBlackCone());
            $array->setPieceQuantik(0, PieceQuantik::initBlackCone());

            $array->setPieceQuantik(2, PieceQuantik::initBlackCube());
            $array->setPieceQuantik(2, PieceQuantik::initBlackCube());

            $array->addPieceQuantik(PieceQuantik::initBlackCylindre());
            $array->addPieceQuantik(PieceQuantik::initBlackCylindre());

            $array->addPieceQuantik(PieceQuantik::initBlackSphere());
            $array->addPieceQuantik(PieceQuantik::initBlackSphere());

            $array->setTaille(8);
            
            return $array;
        }

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

    $tab_Vide = new ArrayPieceQuantik();
    //echo $tab_Vide;
?>
