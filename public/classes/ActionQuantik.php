<?php
    class ActionQuantik{
        protected PlateauQuantik $plateau;

        /**
         * @param PlateauQuantik $plateau
         */
        public function __construct(PlateauQuantik $plateau)
        {
            $this->plateau = $plateau;
        }

        /**
         * @return PlateauQuantik
         */
        public function getPlateau(): PlateauQuantik
        {
            return $this->plateau;
        }

        public function isRowWin(int $numRow) : bool {

            //TODO

            return true;
        }

        public function isColWin(int $numCol) : bool {

            //TODO

            return true;
        }

        public function isCornerWin(int $numCorner) : bool {

            //TODO

            return true;
        }

        public function isValidePose(int $numRow , int $colNum , PieceQuantik $piece ) : bool {

            //TODO

            return true;
        }

        public function posePiece(int $numRow , int $colNum , PieceQuantik $piece ) : void {

            //TODO

        }

        public function __toString()
        {
            // TODO: Implement __toString() method.
            return "";
        }

        private static function isComboWin(ArrayPieceQuantik $pieces): bool{

            //TODO

            return true;
        }

        private static function isPieceValide(ArrayPieceQuantik $pieces , PieceQuantik $p): bool{

            //TODO

            return true;
        }


    }
?>