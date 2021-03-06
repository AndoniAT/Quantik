<?php
/**
 * @author Dominique Fournier
 * @date janvier 2021
 */

require_once("PieceQuantik.php");
require_once("PlateauQuantik.php");
require_once("ActionQuantik.php");
require_once("QuantikException.php");
require_once("QuantikUIGenerator.php");


session_start();
if (isset($_GET['reset'])) { //pratique pour réinitialiser une partie à la main
    unset($_SESSION['etat']);
    unset($_SESSION['lesBlancs']);
    unset($_SESSION['lesNoirs']);
    unset($_SESSION['couleurActive']);
    unset($_SESSION['plateau']);
    unset($_SESSION['message']);
    unset($_SESSION['pieceDispo']);
}

if (empty($_SESSION)) { // initialisation des variables de session
    $_SESSION['lesBlancs'] = ArrayPieceQuantik::initPiecesBlanches();
    $_SESSION['lesNoirs'] = ArrayPieceQuantik::initPiecesNoires();
    $_SESSION['plateau'] = new PlateauQuantik();
    $_SESSION['etat'] = 'choixPiece';
    $_SESSION['couleurActive'] = PieceQuantik::WHITE;
    $_SESSION['message'] = "";
    $_SESSION['pieceDispo'][] = "";
}

$pageHTML = "";

$aq = new ActionQuantik($_SESSION['plateau']);

// on réalise les actions correspondant à l'action en cours :
    try {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'choisirPiece':
                    /* TODO */
                    $_SESSION['etat'] = "posePiece";
                    break;
                case 'poserPiece':
                    /* TODO : action pouvant conduire à 2 états selon le résultat : posePiece ou victoire */
                    $coord = $_GET['coord'];
                    $ligne = $coord[1];
                    $colonne = $coord[3];
                    $joueur = $_SESSION['lesNoirs'];
                    if ($_SESSION['couleurActive']==PieceQuantik::WHITE){
                        $joueur = $_SESSION['lesBlancs'];
                    }


                    if ($aq->isValidePose($ligne,$colonne,$joueur->getPieceQuantik($_GET['pos']))){
                        $piece = $joueur->getPieceQuantik($_GET['pos']);

                        $aq->posePiece($ligne,$colonne,$piece);
                        $joueur->removePieceQuantik($_GET['pos']);
                    } else {
                        throw new QuantikException("Action non valide");
                    }


                    if ($aq->isCornerWin(PlateauQuantik::getCornerFromCoord($ligne,$colonne))||$aq->isRowWin($ligne)||$aq->isColWin($colonne)){
                        $_SESSION['etat']="victoire";

                    } else {
                        $_SESSION['etat']= "choixPiece";
                        if ($_SESSION['couleurActive']==PieceQuantik::WHITE){
                            $_SESSION['couleurActive']=PieceQuantik::BLACK;
                        } else {
                            $_SESSION['couleurActive']=PieceQuantik::WHITE;
                        }
                    }
                    break;
                case 'annulerChoix':
                    /* TODO */
                    $_SESSION['etat'] = "choixPiece";
                    break;
                default:
                    throw new QuantikException("Action non valide");
            }
        }
    } catch (QuantikException $exception) {
            $_SESSION['etat'] = 'bug';
            $_SESSION['message'] = $exception->__toString();
        }

switch($_SESSION['etat']) {
    case 'choixPiece':
        $_SESSION['pieceDispo'][PieceQuantik::WHITE]=$_SESSION['lesBlancs'];
        $_SESSION['pieceDispo'][PieceQuantik::BLACK]=$_SESSION['lesNoirs'];
        $pageHTML.= QuantikUIGenerator::getPageSelectionPiece($_SESSION['pieceDispo'],$_SESSION['couleurActive'],$_SESSION['plateau']);
        break;
    case 'posePiece':
        $_SESSION['pieceDispo'][PieceQuantik::WHITE]=$_SESSION['lesBlancs'];
        $_SESSION['pieceDispo'][PieceQuantik::BLACK]=$_SESSION['lesNoirs'];        
        $pageHTML.= QuantikUIGenerator::getPagePosePiece($_SESSION['pieceDispo'],$_SESSION['couleurActive'],$_GET['pos'],$_SESSION['plateau']);
        break;
    case 'victoire':
        $pageHTML.= QuantikUIGenerator::getPageVictoire($_SESSION['couleurActive']);
        break;
    default: // sans doute etape=bug
        echo QuantikUIGenerator::getPageErreur($_SESSION['message']);
        exit(1);
}
// seul echo nécessaire toute la pageHTML a été générée dans la variable $pageHTML
echo $pageHTML;
require_once("script.php");