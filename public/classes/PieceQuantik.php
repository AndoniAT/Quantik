<?php
 class PieceQuantik {     
    public const  WHITE = 0;
    public const  BLACK = 0;
    public const  VOID = 0;
    public const  CUBE = 1;
    public const  CONE = 2;
    public const  CYLINDRE = 3;
    public const  SPHERE = 4;
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
