<?php
class Helper{
    private $errors;
    private $success;

    /**
     * @return mixed
     */
    public function getErrors(){
        return $this->errors;
    }

    /**
     * @return mixed
     */
    public function getSuccess(){
        return $this->success;
    }
    /**
     * levenshtein_dis
     * make matrix levenshtein distance to make 3 possible operations : insert, delete or substitution operations
     * @param $string1
     * @param $string2
     * @return mixed
     */
	static function levenshtein_dis($string1,$string2){
        $lengthSt1 = strlen($string1);
        $lengthSt2 = strlen($string2);
        $matrix = array();

        for($i=0;$i<=$lengthSt1;$i++){
            $matrix[$i][0] = $i;
        }
        for($j=0;$j<=$lengthSt2;$j++){
            $matrix[0][$j] = $j;
        }

        for($i=1;$i<=$lengthSt1;$i++){
            for($j=1;$j<=$lengthSt2;$j++) {
                $c = ($string1[$i-1] == $string2[$j-1])?0:1;
                $matrix[$i][$j] = min($matrix[$i-1][$j]+1,$matrix[$i][$j-1]+1,$matrix[$i-1][$j-1]+$c);
            }
        }
        return $matrix[$lengthSt1][$lengthSt2];
	}

    /**
     * hamming_dis
     * hamming distance that only have substitute operations
     * return number if different between two string
     * @param $string1
     * @param $string2
     * @return int|string
     */
	static function hamming_dis($string1,$string2){
        $counter=0;
        $i=0;
        //get number of different between strings
        while(isset($string1[$i]) !='')
        {
            if($string1[$i] != $string2[$i])
                $counter++;
            $i++;
        }
        return $counter;
	}
}





?>