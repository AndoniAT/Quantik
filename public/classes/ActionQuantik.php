<?php
require_once('PlateauQuantik.php');

class ActionQuantik
{
    /**
     * @var PlateauQuantik
     */
    protected PlateauQuantik $plateau;

    /** Constructeur
     *
     * @param PlateauQuantik $plateau
     */
    public function __construct(PlateauQuantik $plateau)
    {
        $this->plateau = $plateau;
    }

    /** Donne le plateau de jeu
     *
     * @return PlateauQuantik
     */
    public function getPlateau(): PlateauQuantik
    {
        return $this->plateau;
    }

    /** Vérifie si la ligne est gagnante
     *
     * @param int $numRow Numéro de la ligne
     *
     * @return bool
     */
    public function isRowWin(int $numRow): bool
    {
        return self::isComboWin($this->plateau->getRow($numRow));
    }

    /** Vérifie si la colonne est gagnante
     *
     * @param int $numCol Numéro de la colonne
     *
     * @return bool
     */
    public function isColWin(int $numCol): bool
    {
        return self::isComboWin($this->plateau->getCol($numCol));
    }

    /** Vérifie si le coin est gagnant
     *
     * @param int $numCorner Numéro du coin
     *
     * @return bool
     */
    public function isCornerWin(int $numCorner): bool
    {
        return self::isComboWin($this->plateau->getCorner($numCorner));
    }

    /** Vérifie si la pièce peut être posée
     *
     * @param int $numRow           Coordonnée Y
     * @param int $numCol           Coordonnée X
     * @param PieceQuantik $piece   Pièce à poser
     *
     * @return bool
     */
    public function isValidePose(int $numRow, int $numCol, PieceQuantik $piece): bool
    {
        return self::isPieceValide($this->plateau->getRow($numRow), $piece) // Vérification que la ligne est bonnne
            && self::isPieceValide($this->plateau->getCol($numCol), $piece) // Vérification que la colonne est bonnne
            && self::isPieceValide($this->plateau->getCorner($this->plateau::getCornerFromCoord($numRow, $numCol)), $piece) // Vérification que le coin est bon
            && $this->plateau->getPiece($numRow, $numCol)->getForme() == PieceQuantik::VOID; // Il n'y a pas de pièce à l'endroit ou l'on pose la pièce
    }

    /** Pose une pièce sur le plateau
     *
     * @param int $numRow           Coordonnée y
     * @param int $colNum           Coordonnée x
     * @param PieceQuantik $piece   Pièce à poser
     *
     * @return void
     */
    public function posePiece(int $numRow, int $colNum, PieceQuantik $piece): void
    {
        $this->plateau->setPiece($numRow, $colNum, $piece);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "";
    }

    /** Vérifie si les 4 pièces ont des formes différentes
     *
     * @param ArrayPieceQuantik $pieces Listes des pièces
     *
     * @return bool
     */
    private static function isComboWin(ArrayPieceQuantik $pieces): bool
    {

        $formes = array();
        $nbPiece = 0;
        for ($i = 0; $i < $pieces->getTaille(); $i++) {
            $piece = $pieces->getPieceQuantik($i);
            foreach ($formes as $forme) {
                if ($forme == $piece->getForme()) {
                    return false;
                }
            }
            if ($piece->getForme() != PieceQuantik::VOID) {
                $formes[] = $piece->getForme();
                $nbPiece++;
            } else {
                return false;
            }

        }

        return true;
    }


    /** On vérifie que la piece est ajoutable à la liste
     *
     * @param ArrayPieceQuantik $pieces Liste des pièces
     * @param PieceQuantik $p           Pièce à ajouter
     *
     * @return bool
     */
    private static function isPieceValide(ArrayPieceQuantik $pieces, PieceQuantik $p): bool
    {
        //n'est pas valide si une des forme de l'array est égal et la couleur est différente
        for ($i = 0; $i < $pieces->getTaille(); $i++) {
            $piece = $pieces->getPieceQuantik($i);
            if ($piece->getForme() == $p->getForme() && $piece->getCouleur() != $p->getCouleur()) {
                return false;
            }
        }
        return true;
    }


}

?>