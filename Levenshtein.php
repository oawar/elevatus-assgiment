<?php
require_once "Helper.php";
class Levenshtein{

    private $string1;
    private $string2;

    /**
     * @param $property
     * @param $value
     * @return $this
     */
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
    public function levenshtein_dis() {
        return helper::levenshtein_dis($this->string1,$this->string2);
    }


 }

?>