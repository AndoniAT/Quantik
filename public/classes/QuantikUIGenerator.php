<?php

require_once "PlateauQuantik.php";
require_once "ArrayPieceQuantik.php";
require_once "PieceQuantik.php";

/**
 * Class QuantikUIGenerator
 */
class QuantikUIGenerator
{

    /**
     * @param string $title
     * @return string
     */
    public static function getDebutHTML(string $title = "Quantik"): string
    {
        return "<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>$title</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/quantik.css\" />
        </head>
    <body>
        <h1>$title</h1>\n";
    }

    /**
     * @return string
     */
    public static function getFinHTML(): string
    {
        return "</body>\n</html>";
    }

    /**
     * @return string
     */
    public static function getFinDivGral(): string
    {
        return "</div>";
    }

    /**
     * @return string
     */
    public static function getDivGral(): string
    {
        return "<div class='quantik'>\n";
    }

    /**
     * @param string $message
     * @return string
     */
    public static function getPageErreur(string $message): string
    {
        header("HTTP/1.1 400 Bad Request");
        $resultat = self::getDebutHTML("400 Bad Request");
        $resultat .= "<h2>$message</h2>";
        $resultat .= "<p><br /><br /><br /><a href='quantik.php?reset'>Retour à l'accueil...</a></p>";
        $resultat .= self::getFinHTML();
        return $resultat;
    }

    /**
     * @param PieceQuantik $pq
     * @return string
     */
    public static function getButtonClass(PieceQuantik $pq) {
        if ($pq->getForme()==PieceQuantik::VOID)
            return "vide";
        $ch = $pq->__toString();
        return substr($ch,1,2).substr($ch,4,1);
    }

    /**
     * production d'un bloc HTML pour présenter l'état du plateau de jeu,
     * l'attribution de classes en vue d'une utilisation avec les est un bon investissement...
     * @param PlateauQuantik $p
     * @return string
     */
    public static function getDivPlateauQuantik(PlateauQuantik $plateauQuantik): string
    {
        $sortie = "<div class='plateau_conteneur plateau_non_editable'><table>";
        $sortie = $sortie . "<tbody>";

        for ($j = 0; $j<$plateauQuantik::NBROWS;$j++){
            $ligne = $plateauQuantik->getRow($j);
            $sortie = $sortie . "<tr>";
            for ($i = 0; $i < $ligne->getTaille() ;$i++){
                $item = $ligne->getPieceQuantik($i);
                $sortie = $sortie . "<td><div class='tableau_container'>";
                $sortie = $sortie . $item;
                $sortie = $sortie . "</div></td>";
            }
            $sortie = $sortie . "</tr>";
        }

        $sortie = $sortie . "</tbody>";
        return $sortie . "</table></div>";
    }

    /**
     * @param ArrayPieceQuantik $apq
     * @param int $pos permet d'identifier la pièce qui a été sélectionnée par l'utilisateur avant de la poser (si != -1)
     * @return string
     */
    public static function getDivPiecesDisponibles(ArrayPieceQuantik $liste, int $pos = -1): string {
        //TODO
        $res = "<div class='piece_block_container'>";
        for ($i = 0; $i < $liste->getTaille() ; $i++){
            $res = $res ."<button type='submit' name='active' class='bouton_piece_blocked' disabled >";
            $res = $res .$liste->getPieceQuantik($i);
            $res = $res ."</button>";
        }


        return $res."</div>";
    }

    /**
     * @param ArrayPieceQuantik $apq
     * @return string
     */
    public static function getFormSelectionPiece(ArrayPieceQuantik $liste): string {
        $res = "<div class='piece_form_container'>";
        $res .= "<form action='' method='get'>";
        $res .= "<input type='hidden' name='action' value='choisirPiece' />";
        for ($i = 0; $i < $liste->getTaille() ; $i++){
            $res = $res ."<button class='btn_turn' type='submit' name='pos' value='";
            $res = $res . $i;
            $res = $res ."'>";
            $res = $res . $liste->getPieceQuantik($i);
            $res = $res . "</button>";
        }

        return $res."</form> </div>";
    }

    /**
     * @param PlateauQuantik $plateau
     * @param PieceQuantik $piece
     * @param int $position position de la pièce qui sera posée en vue de la transmettre via un champ caché du formulaire
     * @return string
     */
    public static function getFormPlateauQuantik(PlateauQuantik $plateauQuantik, PieceQuantik $pieceQuantik, int $position): string {
        //TODO : position à gérer
        $sortie = "<form action='' method='get' class='form_plateau'><table class='plateau_conteneur plateau_editable'>";
        $sortie = $sortie . "<tbody>";
        $actionQuantik = new ActionQuantik($plateauQuantik);
        $sortie .= "<input type='hidden' name='pos' value='".$position."'>";
        $sortie .= "<input type='hidden' name='action' value='poserPiece'>";
        for ($j = 0; $j<$plateauQuantik::NBROWS;$j++){
            $ligne = $plateauQuantik->getRow($j);
            $sortie = $sortie . "<tr>";
            for ($i = 0; $i < $ligne->getTaille() ;$i++){
                $item = $ligne->getPieceQuantik($i);
                $sortie = $sortie . "<td>";
                if ($actionQuantik->isValidePose($j,$i,$pieceQuantik)){
                    $sortie = $sortie ."<button type='submit' class='button_active' name='coord' value='";
                    $sortie = $sortie . 'l'.$j.'c'.$i;
                    $sortie = $sortie ."'>";
                    $sortie = $sortie . $ligne->getPieceQuantik($i);
                    $sortie = $sortie . "</button>";

                } else {
                    $sortie = $sortie ."<button type='submit' class='button_disabled' name='coord' value='";
                    $sortie = $sortie . 'l'.$j.'c'.$i;
                    $sortie = $sortie ."' disabled>";
                    $sortie = $sortie . $ligne->getPieceQuantik($i);
                    $sortie = $sortie . "</button>";

                }
                $sortie = $sortie . "</td>";
            }
            $sortie = $sortie . "</tr>";
        }

        $sortie = $sortie . "</tbody>";
        $sortie .= "</table></form>";
        // ajout d'un formulaire pour modifier le choix de la pièce à poser
        //$sortie .= self::getFormBoutonAnnuler();
        return $sortie;
    }

    /**
     * @return string
     */
    public static function getFormBoutonAnnuler() : string {
        /* TODO */
        //echo 'holaaasss';
        $bouton="<form action='' method='get' class='form_button_cancel'>";
        $bouton.='<button type="submit" value="annulerChoix" name="action" class="button_cancel">Annuler</button>';
        $bouton.='</form>';
        return $bouton;
    }

    /**
     * @return string
     */
    public static function getFormBoutonRestart() : string {
        /* TODO */
        //echo 'holaaasss';
        $bouton="<form action='' method='get' class='form_button_cancel'>";
        $bouton.='<button type="submit" value="reset" name="reset" class="button_cancel restart">Restart</button>';
        $bouton.='</form>';
        return $bouton;
    }

    /**
     * @param int $couleur
     * @return string
     */
    public static function getDivMessageVictoire(int $couleur) : string {
        /* TODO div annonçant la couleur victorieuse et proposant un lien pour recommencer une nouvelle partie */
        $resultat ="";
        return $resultat;
    }

    /**
     * @return string
     */
    public static function getLienRecommencer():string {
        /* TODO production d'un lien pour recommencer une partie */
        return "<p><a href=''> Recommencer ?</a></p>";
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPageSelectionPiece(array $lesPiecesDispos, int $couleurActive, PlateauQuantik $plateau): string {
        $pageHTML = QuantikUIGenerator::getDebutHTML();
        $pageHTML.= QuantikUIGenerator::getFormBoutonRestart();
        $pageHTML.= QuantikUIGenerator::getDivGral();
        if ($couleurActive == PieceQuantik::WHITE){
            $pageHTML.= self::getFormSelectionPiece($lesPiecesDispos[PieceQuantik::WHITE]);
            $pageHTML.= self::getDivPlateauQuantik($plateau);
            $pageHTML.= self::getDivPiecesDisponibles($lesPiecesDispos[PieceQuantik::BLACK]);
        } else {
            $pageHTML.= self::getDivPiecesDisponibles($lesPiecesDispos[PieceQuantik::WHITE]);
            $pageHTML.= self::getDivPlateauQuantik($plateau);
            $pageHTML.= self::getFormSelectionPiece($lesPiecesDispos[PieceQuantik::BLACK]);
        }
        
        $pageHTML.= QuantikUIGenerator::getFinDivGral();
        return $pageHTML. self::getFinHTML();
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param int $posSelection position de la pièce sélectionnée dans la couleur active
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPagePosePiece(array $lesPiecesDispos, int $couleurActive, int $posSelection, PlateauQuantik $plateau): string {
        $pageHTML = QuantikUIGenerator::getDebutHTML();
        $pageHTML.= QuantikUIGenerator::getFormBoutonRestart();
        $pageHTML.= QuantikUIGenerator::getDivGral();
        $lesBlancs = $lesPiecesDispos[PieceQuantik::WHITE];
        $lesNoirs = $lesPiecesDispos[PieceQuantik::BLACK];

        if ($couleurActive == PieceQuantik::WHITE){
            $pageHTML.= QuantikUIGenerator::getDivPiecesDisponibles($lesBlancs,$posSelection);
            $pageHTML.= QuantikUIGenerator::getFormPlateauQuantik($plateau,$lesBlancs->getPieceQuantik($posSelection),$posSelection);
            $pageHTML.= QuantikUIGenerator::getDivPiecesDisponibles($lesNoirs);
        } else {
            $pageHTML.= QuantikUIGenerator::getDivPiecesDisponibles($lesBlancs);
            $pageHTML.= QuantikUIGenerator::getFormPlateauQuantik($plateau,$lesNoirs->getPieceQuantik($posSelection),$posSelection);
            $pageHTML.= QuantikUIGenerator::getDivPiecesDisponibles($lesNoirs,$posSelection);
        }
        $pageHTML.= QuantikUIGenerator::getFinDivGral();
        $pageHTML.= QuantikUIGenerator::getFormBoutonAnnuler();
        return $pageHTML . self::getFinHTML();
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param int $posSelection
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPageVictoire(): string {
        $pageHTML = QuantikUIGenerator::getDebutHTML();
        $pageHTML.= QuantikUIGenerator::getDivGral();
        $pageHTML.= '<div class="victory_container">';
        $pageHTML.= '   <h3>VICTOIRE<h3> ';
        $pageHTML.= '</div> ';
        $pageHTML.= QuantikUIGenerator::getFinDivGral();
        $pageHTML.= QuantikUIGenerator::getFormBoutonRestart();
        return $pageHTML . self::getFinHTML();

    }

}