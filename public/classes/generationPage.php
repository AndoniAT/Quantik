<?php

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


    }