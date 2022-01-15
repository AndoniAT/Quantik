<?php
require_once ('PlateauQuantik.php');
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
            return self::isComboWin($this->plateau->getRow($numRow));
        }

        public function isColWin(int $numCol) : bool {
            return self::isComboWin($this->plateau->getCol($numCol));
        }

        public function isCornerWin(int $numCorner) : bool {
            return self::isComboWin($this->plateau->getCorner($numCorner));
        }

        public function isValidePose(int $numRow , int $numCol , PieceQuantik $piece ) : bool {
            return self::isPieceValide($this->plateau->getRow($numRow),$piece)
                && self::isPieceValide($this->plateau->getCol($numCol),$piece)
                && self::isPieceValide($this->plateau->getCorner($this->plateau::getCornerFromCoord($numRow,$numCol)),$piece)
                && $this->plateau->getPiece($numRow,$numCol)->getCouleur() == PieceQuantik::VOID;
        }

        public function posePiece(int $numRow , int $colNum , PieceQuantik $piece ) : void {
            $this->plateau->setPiece($numRow,$colNum,$piece);
        }

        public function __toString()
        {
            // TODO: Implement __toString() method.
            return "";
        }

        private static function isComboWin(ArrayPieceQuantik $pieces): bool{

            $formes = array();
            $nbPiece = 0;
            for ($i=0 ;  $i < $pieces->getTaille() ;$i++)
            {
                $piece = $pieces->getPieceQuantik($i);
                foreach ($formes as $forme){
                    if ($forme == $piece->getForme()){
                        return false;
                    }
                }
                if ($piece->getForme() != PieceQuantik::VOID){
                    $formes[] = $piece->getForme();
                    $nbPiece++;
                } else {
                    return false;
                }

            }

            return true;
        }

        private static function isPieceValide(ArrayPieceQuantik $pieces , PieceQuantik $p): bool{
            //n'est pas valide si une des forme de l'array est égal et la couleur est différente
            for ($i = 0 ; $i < $pieces->getTaille() ; $i++){
                $piece = $pieces->getPieceQuantik($i);
                if ($piece->getForme() == $p->getForme() && $piece->getCouleur() != $p->getCouleur()){
                    return false;
                }
            }
            return true;
        }


    }
?>