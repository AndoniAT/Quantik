<?php
 class PieceQuantik {
    static public int $white = 0;
    static public int $black = 0;
    static public int $void = 0;
    static public int $cube = 1;
    static public int $cone = 2;
    static public int $cylindre = 3;
    static public int $sphere = 4;
    protected int $forme;
    protected int $couleur;

    private function __contructor(int $forme, int $couleur) {
        $this->forme = $forme;
        $this->couleur = $couleur;
    }

    public function getForme() : int {
        return $this->forme;
    }

    public function getCouleur() : int {
        return $this->couuleur;
    }

    public function __toString() : string {
    }

    public static function initVoid() : PieceQuantik {

    }

    public static function initWhiteCube() : PieceQuantik {

    }

    public static function initBlackCube() : PieceQuantik {

    }

    public static function initWhiteCone() : PieceQuantik {

    }


    public static function initBlackCone() : PieceQuantik {

    }

    public static function initWhiteCylindre() : PieceQuantik {

    }

    
    public static function initBlackCylindre() : PieceQuantik {

    }
    
    public static function initWhiteSphere() : PieceQuantik {

    }

    public static function initBlackSphere() : PieceQuantik {

    }
}
?>
