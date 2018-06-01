<?php
class ParserCountry
{
    private $country;
    private $chosenCountry;

    public function __construct($XML)
    {
        $this->country = $XML;
    }

    public function chosenCountry($chosenCountry) {
        $this->chosenCountry = $chosenCountry;
    }

    private function setCountry($country)
    {

        $xml = simplexml_load_file($country);
        $result = '';

        if($this->chosenCountry){

            foreach ($xml->country as $item) {

                if($item->alpha2 == $this->chosenCountry){
                    $result = $item->english;
                }
            }

        }

        return $result;
    }

    public function getCountry()
    {

        return $this->setCountry($this->country);
    }

}