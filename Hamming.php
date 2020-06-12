<?php
require_once "Helper.php"; // require once to allow others calsses from define it

class Hamming{

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

    /**
     * @return int|string
     */
    public function hamming_dis(){
        return helper::hamming_dis($this->string1,$this->string2);
    }

}


?>