<?php
class GeoTargeting
{
    private $country;

    function __construct(ParserCountry $country)
    {
        $this->country = $country;
    }

    public function setCountry($chosenCountry) {

        $this->country->chosenCountry($chosenCountry);

    }

    public function getCountry() {

       return $this->country->getCountry();

    }

}