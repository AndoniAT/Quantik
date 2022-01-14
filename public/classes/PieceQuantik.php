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
        return $this->couleur;
    }

    public function __toString() : string {
        return $forme + $couleur;
    }

    public static function initVoid() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = VOID;
        $piece->couleur = VOID;
        return $piece;
    }

    public static function initWhiteCube() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = CUBE;
        $piece->couleur = WHITE;
        return $piece;
    }

    public static function initBlackCube() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = CUBE;
        $piece->couleur = BLACK;
        return $piece;
    }

    public static function initWhiteCone() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = CONE;
        $piece->couleur = WHITE;
        return $piece;
    }

    public static function initBlackCone() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = CONE;
        $piece->couleur = BLACK;
        return $piece;
    }

    public static function initWhiteCylindre() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = CYLINDRE;
        $piece->couleur = WHITE;
        return $piece;
    }

    
    public static function initBlackCylindre() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = CYLINDRE;
        $piece->couleur = BLACK;
        return $piece;
    }
    
    public static function initWhiteSphere() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = SPHERE;
        $piece->couleur = WHITE;
        return $piece;
    }

    public static function initBlackSphere() : PieceQuantik {
        $piece = new PieceQuantik;
        $piece->forme = SPHERE;
        $piece->couleur = BLACK;
        return $piece;
    }
}
?>
