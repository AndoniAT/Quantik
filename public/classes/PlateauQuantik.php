<?php
    class PlateauQuantik {
        public const NBROWS = 4;
        public const NBCOLS = 4;
        public const NW = 0;
        public const NE = 1;
        public const SW = 2;
        public const SE = 3;
        protected array $cases ;

        /**
         * @param array $cases
         */
        public function __construct()
        {
            //TODO
        }

        public function getPiece(int $rowNum , int $colNum) : PieceQuantik{

            //TODO

            return new PieceQuantik();
        }

        public function setPiece(int $rowNum , int $colNum) : void{

            //TODO

        }

        public function getRow(int $numRow) : ArrayPieceQuantik{

            //TODO

            return new ArrayPieceQuantik();
        }

        public function getCol(int $numCol) : ArrayPieceQuantik{

            //TODO

            return new ArrayPieceQuantik();
        }

        public function getCorner(int $dir) : ArrayPieceQuantik{

            //TODO

            return new ArrayPieceQuantik();
        }

        public function __toString()
        {
            // TODO: Implement __toString() method.
            return "";
        }

        public static function getCornerFromCoord(int $rowNum,int $rowCol): int {

            //TODO

            return 0;
        }


    }
?>