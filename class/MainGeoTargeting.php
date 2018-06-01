<?php
class MainGeoTargeting
{
    static private $countryName;
    static private $countryCode;

    public function country() {

        include PLUG_DIR . "resource/SxGeo/SxGeo.php";
        $SxGeo = new SxGeo(PLUG_DIR . "resource/SxGeo/SxGeo.dat");
        $ip = $_SERVER["REMOTE_ADDR"];
        self::$countryCode = $SxGeo->getCountry($ip);
        return self::$countryCode;
    }

    public function setCountry($countryName) {
        self::$countryName = $countryName;
    }

    public function shortcodeCountry($atts, $content = null) {

       MainGeoTargeting::template($atts['value'], $atts['language'], $atts['size'], $content);

    }

    static protected function template($value, $language, $size, $content){

        $countryCode = strtolower(self::$countryCode);
        $countryName = self::$countryName ;

        $html = '';

        if( $size || $size == 'max' || $size == 'max' || $content || $value) {

            if($language == $countryCode) {

                if ($size == 'max') {

                    $html = PLUG_DIR . "view/big-flag.php";


                } else if ($size == 'min') {

                    $html = PLUG_DIR . "view/small-flag.php";
                }

            }

        }


        if(strlen($html) > 0){

            include $html;

        }

    }

}