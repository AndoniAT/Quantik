<?php
    class PlateauQuantik {
        public const NBROWS = 4;
        public const NBCOLS = 4;
        public const NW = 0;
        public const NE = 1;
        public const SW = 2;
        public const SE = 3;
        protected array $cases ;


        public function __construct()
        {
            for ($i = 0 ; $i < self::NBROWS ; $i++){
                $this->cases[] = new ArrayPieceQuantik();
            }
        }

        public function getPiece(int $rowNum , int $colNum) : PieceQuantik{
            if ($rowNum >= self::NBROWS){
                $rowNum = self::NBROWS-1;
            }
            if ($colNum >= self::NBCOLS){
                $colNum = self::NBCOLS-1;
            }

            if ($rowNum < 0){
                $rowNum = 0;
            }
            if ($colNum < 0){
                $colNum = 0;
            }

            return $this->cases[$rowNum][$colNum];
        }

        public function setPiece(int $rowNum , int $colNum , PieceQuantik $pieceQuantik) : void{

            $this->cases[$rowNum][$colNum]=$pieceQuantik;

        }

        public function getRow(int $numRow) : ArrayPieceQuantik{

            return $this->cases[$numRow];

        }

        public function getCol(int $numCol) : ArrayPieceQuantik{

            $res = new ArrayPieceQuantik();

            for ($i = 0 ; $i < self::NBROWS ;$i++)
            {
                $res->setPieceQuantik($i,$this->cases[$i][$numCol]);
            }

            return $res;
        }

        public function getCorner(int $dir) : ArrayPieceQuantik{

            $res = new ArrayPieceQuantik();
            $taille = 0;
            for ($i = 0 ; $i < self::NBROWS ; $i++){
                for ($j = 0 ; $j < self::NBCOLS ; $j++){
                    if ($dir == self::getCornerFromCoord($i,$j)){
                        $res->setPieceQuantik($taille,$this->cases[$i][$j]);
                    }
                }
            }

            return $res;
        }

        public function __toString()
        {
            $sortie = "<table>";
            $sortie = $sortie . "<tbody>";

            foreach ($this->cases as $ligne){
                $sortie = $sortie . "<tr>";
                foreach ($ligne as $item){
                    $sortie = $sortie . "<td>";
                    $sortie = $sortie . $item;
                    $sortie = $sortie . "</td>";
                }
                $sortie = $sortie . "</tr>";
            }

            $sortie = $sortie . "</tbody>";
            return $sortie . "</table>";
        }

        public static function getCornerFromCoord(int $rowNum,int $rowCol): int {

            if ($rowNum<=1){
                //on est au nord
                if ($rowCol<=1){
                    //on est à l'ouest
                    return self::NW;
                }else{
                    //on est à l'est
                    return self::NE;
                }
            } else {
                //on est au sud
                if ($rowCol<=1){
                    //on est à l'ouest
                    return self::SW;
                }else{
                    //on est à l'est
                    return self::SE;
                }
            }
        }


    }
?>