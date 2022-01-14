<?php
    require_once('PieceQuantik.php');

    class ArrayPieceQuantik{
        protected array $piecesQuantiks;
        protected int $taille;

        public function __construct() {
            $this->taille = 4;

            for($i = 0 ; $i < $this->taille ; $i++) {
                $obj = new PieceQuantik(0,0);
                $obj = $obj->initVoid();
                $this->piecesQuantiks[] = $obj;
            }
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
            $array->setTaille(8);
            $piece = new PieceQuantik(0,0);
            $piece->initBlackCone()

            for($i = 1 ; $i <= $array->getTaille() ; $i++) {
                for($j = 0 ; $j < 2 ; $j++) {
                    $piece = new PieceQuantik($i, 1);
                    $array->addPieceQuantik($piece);
                    print_r($piece->getCouleur());
                }
            }
            return $array;
        }

        public static function initPiecesBlanches() : ArrayPieceQuantik {
            $array = new ArrayPieceQuantik();
            $array->setTaille(8);

            for($i = 1 ; $i <= 4 ; $i++) {
                for($j = 0 ; $j < 2 ; $j++) {
                    $array->addPieceQuantik(new PieceQuantik($i, 0));
                }
            }
            return $array;
        }
    }
?>