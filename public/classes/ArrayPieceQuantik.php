<?php
    require_once('PieceQuantik.php');

    class ArrayPieceQuantik{
        protected array $piecesQuantiks;
        protected int $taille;

        public function __construct() {

        }

        public function __toString() : string {

        }

        public function getPieceQuantik(int $pos) : PieceQuantik {

        }

        public function setPieceQuantik(int $pos, PieceQuantik $piece) : void {

        }

        public function addPieceQuantik(PieceQuantik $piece) : void {

        }

        public function removePieceQuantik(int $pos) : void {

        }

        public function getTaille() : int {
            return $this->taille;
        }

        public function setTaille(int $taille) : void {
            $this->taille = $taille;
        }

        public static function initPiecesNoires() : ArrayPieceQuantik {

        }

        public static function initPiecesBlanches() : ArrayPieceQuantik {

        }
    }
?>