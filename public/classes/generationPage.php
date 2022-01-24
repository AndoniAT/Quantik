<?php
require_once ('PlateauQuantik.php');
require_once ('ArrayPieceQuantik.php');
require_once ('ActionQuantik.php');

    //Classe pour la séance 2
    class GenerationPage{

        public function getDebutHTML():string{
            return "<!DOCTYPE html>
                    <html lang=\"en\">
                    <head>
                        <meta charset=\"UTF-8\">
                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                        <title>Quantik</title>
                    </head>
                    <body>";
        }

        public function getFinHTML():string{
            return "</body>
                    </html>";
        }

        public function getDivPiecesDisponibles(ArrayPieceQuantik $liste):string{
            $res = "<div>";
            for ($i = 0; $i < $liste->getTaille() ; $i++){
                $res = $res ."<button type='submit' name='active' disabled >";
                $res = $res .$liste->getPieceQuantik($i);
                $res = $res ."</button>";
            }


            return $res."</div>";
        }

        public function getFormSelectionPiece(ArrayPieceQuantik $liste):string{
            $res = "<form action='choisirPiece' method='get'>";

            for ($i = 0; $i < $liste->getTaille() ; $i++){
                $res = $res ."<button type='submit' name='pos' value='";
                $res = $res . $i;
                $res = $res ."'>";
                $res = $res . $liste->getPieceQuantik($i);
                $res = $res . "</button>";
            }


            return $res."</form>";
        }

        public function getDivPlateauQuantik(PlateauQuantik $plateauQuantik):string{
            $sortie = "<div><table>";
            $sortie = $sortie . "<tbody>";

            for ($j = 0; $j<$plateauQuantik::NBROWS;$j++){
                $ligne = $plateauQuantik->getRow($j);
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
            return $sortie . "</table></div>";
        }

        public function getFormPlateauQuantik(PlateauQuantik $plateauQuantik,PieceQuantik $pieceQuantik):string{
            $sortie = "<form action='poserPiece' method='get'><table>";
            $sortie = $sortie . "<tbody>";
            $actionQuantik = new ActionQuantik($plateauQuantik);

            for ($j = 0; $j<$plateauQuantik::NBROWS;$j++){
                $ligne = $plateauQuantik->getRow($j);
                $sortie = $sortie . "<tr>";
                for ($i = 0; $i < $ligne->getTaille() ;$i++){
                    $item = $ligne->getPieceQuantik($i);
                    $sortie = $sortie . "<td>";
                    if ($actionQuantik->isValidePose($j,$i,$pieceQuantik)){
                        $sortie = $sortie ."<button type='submit' name='coord' value='";
                        $sortie = $sortie . 'l'.$j.'c'.$i;
                        $sortie = $sortie ."'>";
                        $sortie = $sortie . $ligne->getPieceQuantik($i);
                        $sortie = $sortie . "</button>";

                    } else {
                        $sortie = $sortie ."<button type='submit' name='coord' value='";
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
            return $sortie . "</table></form>";
        }


    }
    /*
    $a = new GenerationPage();
    $plateauQuantik=new PlateauQuantik();
    $plateauQuantik->setPiece(0,3,ArrayPieceQuantik::initPiecesNoires()->getPieceQuantik(2));
    echo $a->getDebutHTML();
    echo $a->getFormSelectionPiece(ArrayPieceQuantik::initPiecesNoires());
    echo $a->getDivPiecesDisponibles(ArrayPieceQuantik::initPiecesNoires());
    echo $a->getDivPlateauQuantik(new PlateauQuantik());
    echo $a->getFormPlateauQuantik($plateauQuantik,ArrayPieceQuantik::initPiecesBlanches()->getPieceQuantik(2));
    echo $a->getFinHTML();*/