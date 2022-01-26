<?php
    /**
     * Class PieceQuantik qui nous permet de creer une nouvelle pièce pour le jeu.
     */
 class PieceQuantik {     
    
    // Couleurs ============
    public const  WHITE = 0;
    public const  BLACK = 1;

    // Formes ==============
    public const  CUBE = 1;
    public const  CONE = 2;
    public const  CYLINDRE = 3;
    public const  SPHERE = 4;

    // Absence ============
    public const  VOID = 0;

    // Attributs de chaque pièce ==========
    protected int $forme;
    protected int $couleur;

    /**
     * Le constructeur est par défaut privé, donc pour créer une pièce
     * il faut passe forcement par nos méthodes statiques.
     */
    private function __construct(int $forme, int $couleur) {
        $this->forme = $forme;
        $this->couleur = $couleur;
    }

    /**
     * Obtenir la forme de la piece
     */
    public function getForme() : int {
        return $this->forme;
    }

    /**
     * Obtenir la couleur de la piece
     */
    public function getCouleur() : int {
        return $this->couleur;
    }

    /**
     * Affichage de la pièce
     */
    public function __toString() : string {
        $str = "Forme : ";
        $image = '<img';
        $size = '60';
        $src = "";
        $alt = "";
        $class = "piece";
        switch($this->getForme()){
            case self::CUBE : {
                            if($this->getCouleur() == self::WHITE){
                                $src = "cube_white.png";
                                $alt = "cube white";
                            } else {
                                $src = "cube_black.png";
                                $alt = "cube black";
                            }
                            //$image.=' src="../img/'.$src.'" alt="'.$alt.'" width="'.$size.'" height="'.$size.'"/>';
                            break;
                        }
            case self::CONE : {
                            if($this->getCouleur() == self::WHITE){
                                $src = "cone_white.png";
                                $alt = "cone white";
                            } else {
                                $src = "cone_black.png";
                                $alt = "cube black";
                            }
                            //$image.=' src="../img/'.$src.'" alt="'.$alt.'" width="'.$size.'" height="'.$size.'"/>';
                            break;
                        }
            case self::CYLINDRE : {
                            if($this->getCouleur() == self::WHITE){
                                $src = "cylindre_white.png";
                                $alt = "cylindre white";
                            } else {
                                $src = "cylindre_black.png";
                                $alt = "cylindre black";
                            }
                            //$image.=' src="../img/'.$src.'" alt="'.$alt.'" width="'.$size.'" height="'.$size.'"/>';
                            break;
                        }
            case self::SPHERE : {
                        if($this->getCouleur() == self::WHITE){
                            $src = "sphere_white.png";
                            $alt = "sphere_white";
                            
                        } else {
                            $src = "sphere_black.png";
                            $alt = "sphere black";
                        }
                        //$image.=' src="../img/'.$src.'" alt="'.$alt.'" width="'.$size.'" height="'.$size.'"/>';
                        break;
                        }
            default : {
                        $src = "joue.png";
                        $alt = "joue";
                        $class = "none";
                        //$image.=' src="../img/joue.png" alt="joue black" width="30" height="30"/>';
                        break;
                    }
        };
        $image.=' src="../img/'.$src.'" class="'.$class.'" alt="'.$alt.'" width="'.$size.'" height="'.$size.'"/>';


        return $image;
    }

    /**
     * Pour initialiser une pièce vide
     */
    public static function initVoid() : PieceQuantik {
        return new self(self::VOID, self::VOID);    
    }

    /**
     * Pour initialiser une pièce de forme Cube blanche
     */
    public static function initWhiteCube() : PieceQuantik {
        return new self(self::CUBE, self::WHITE);
    }

    /**
     * Pour initialiser une pièce de forme Cube noire
     */
    public static function initBlackCube() : PieceQuantik {
        return new self(self::CUBE, self::BLACK);
    }

    /**
     * Pour initialiser une pièce de forme Cone blanche
     */
    public static function initWhiteCone() : PieceQuantik {
        return new self(self::CONE, self::WHITE);
    }

    /**
     * Pour initialiser une pièce de forme Cone noire
     */
    public static function initBlackCone() : PieceQuantik {
        return new self(self::CONE, self::BLACK);
    }
    
    /**
     * Pour initialiser une pièce de forme Cylinde blanche
     */
    public static function initWhiteCylindre() : PieceQuantik {
        return new self(self::CYLINDRE, self::WHITE);
    }

    /**
     * Pour initialiser une pièce de forme Cylindre Noire
     */
    public static function initBlackCylindre() : PieceQuantik {
        return new self(self::CYLINDRE, self::BLACK);
    }
    
    /**
     * Pour initialiser une pièce de forme Sphere blanche
     */
    public static function initWhiteSphere() : PieceQuantik {
        return new self(self::SPHERE, self::WHITE);
    }

    /**
     * Pour initialiser une pièce de forme Sphere Noire
     */
    public static function initBlackSphere() : PieceQuantik {
        return new self(self::SPHERE, self::BLACK);
    }
}
?>
