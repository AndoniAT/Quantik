<?php
require_once ('ArrayPieceQuantik.php');
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

        /** Donne une Pièce
         *
         * @param int $rowNum Coordonnée Y
         * @param int $colNum Coordonnée X
         *
         * @return PieceQuantik
         */
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

            return $this->cases[$rowNum]->getPieceQuantik($colNum);
        }

        /** Insère une piece sur le plateau
         *
         * @param int $rowNum Coordonnée Y
         * @param int $colNum Coordonnée X
         * @param PieceQuantik $pieceQuantik Pièce à placer
         *
         * @return void
         */
        public function setPiece(int $rowNum , int $colNum , PieceQuantik $pieceQuantik) : void{

            $this->cases[$rowNum]->setPieceQuantik($colNum,$pieceQuantik);

        }

        /** Donne toutes les pièces d'une ligne
         *
         * @param int $numRow Numéro de la ligne
         *
         * @return ArrayPieceQuantik
         */
        public function getRow(int $numRow) : ArrayPieceQuantik{

            return $this->cases[$numRow];

        }

        /** Donne toutes les pièces d'une colonne
         *
         * @param int $numCol Numéro de la colonne
         *
         * @return ArrayPieceQuantik
         */
        public function getCol(int $numCol) : ArrayPieceQuantik{

            $res = new ArrayPieceQuantik();

            for ($i = 0 ; $i < self::NBROWS ;$i++)
            {
                $res->setPieceQuantik($i,$this->cases[$i]->getPieceQuantik($numCol));
            }

            return $res;
        }

        /** Donne toutes les pièces d'un coin
         *
         * @param int $dir Numéro d'un coin
         *
         * @return ArrayPieceQuantik
         */
        public function getCorner(int $dir) : ArrayPieceQuantik{

            $res = new ArrayPieceQuantik();
            $taille = 0;
            for ($i = 0 ; $i < self::NBROWS ; $i++){
                for ($j = 0 ; $j < self::NBCOLS ; $j++){
                    if ($dir == self::getCornerFromCoord($i,$j)){
                        $res->setPieceQuantik($taille,$this->cases[$i]->getPieceQuantik($j));
                    }
                }
            }

            return $res;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            $sortie = "<table>";
            $sortie = $sortie . "<tbody>";

            foreach ($this->cases as $ligne){
                $sortie = $sortie . "<tr>";
                for ($i = 0; $i < $ligne->getTaille() ;$i++){
                    $item = $ligne->getPieceQuantik($i);
                    $sortie = $sortie . "<td>";
                    $sortie = $sortie . $item;
                    $sortie = $sortie . "</td>";
                }
                $sortie = $sortie . "</tr>";
            }

            $sortie = $sortie . "</tbody>";
            return $sortie . "</table>";
        }

        /** Donne le coin auquel appartient des coordonnées
         *
         * @param int $rowNum Coordonnée Y
         * @param int $rowCol Coordonnée X
         *
         * @return int Coin
         */
        public static function getCornerFromCoord(int $rowNum, int $rowCol): int {

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
    /*
    $a = new PlateauQuantik();
    echo $a;
    echo "</br>";
    $a->setPiece(0,2,PieceQuantik::initBlackSphere());
    echo $a;
    echo "<p> Ligne 0 :</p></br> ";
    echo $a->getRow(0);
    echo "<p> Colonne 2 :</p></br> ";
    echo $a->getCol(2);
    echo "<p> Corner NE </p> </br> ";
    echo $a->getCorner(PlateauQuantik::NE);
    echo "<p> piece 0, 2 : </p> </br> ";
    echo $a->getPiece(0,2);*/
?>