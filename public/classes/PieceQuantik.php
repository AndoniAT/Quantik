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

    private function __construct(int $forme, int $couleur) {
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
        return $this->forme . " " . $this->couleur;
    }

    public static function initVoid() : static {
        return new self(self::VOID, self::VOID);
        
    }

    public static function &initWhiteCube() {
        return new self(self::CUBE, self::WHITE);
    }

    public static function &initBlackCube() : PieceQuantik {
        return new self(self::CUBE, self::BLACK);
    }

    public static function &initWhiteCone() : PieceQuantik {
        return new self(self::CONE, self::WHITE);
    }

    public static function &initBlackCone() : PieceQuantik {
        return new self(self::CONE, self::BLACK);
    }

    public static function &initWhiteCylindre() : PieceQuantik {
        return new self(self::CYLINDRE, self::WHITE);
    }

    public static function &initBlackCylindre() : PieceQuantik {
        return new self(self::CYLINDRE, self::BLACK);
    }
    
    public static function &initWhiteSphere() : PieceQuantik {
        return new self(self::SPHERE, self::WHITE);
    }

    public static function &initBlackSphere() : PieceQuantik {
        return new self(self::SPHERE, self::BLACK);
    }
}
?>
