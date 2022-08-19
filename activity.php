<?php

class Date{
    public $d,$m,$y;

    function __construct($d,$m,$y){
        $this->d = $d;
        $this->m = $m;
        $this->y = $y;
    }
}

function countLeapYears($d){
    $years = $d->y;

    if($d->m <= 2){
        $years--;
    }

    return $years/4 - $years/100 + $years/400;

}

function getDifference($d1, $d2){
 
    $monthDays = array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
    
    $n1 = $d1->y*365 + $d1->d;
    
    for($i=0;$i<$d1->m-1;$i++){
        $n1 += (int)$monthDays[$i];
    }
        
    $n1 += countLeapYears($d1);

    $n2 = $d2->y*365 + $d2->d;
    
    for($i=0;$i<$d2->m-1;$i++){
        $n2 += (int)$monthDays[$i];
    }
        
    $n2 += countLeapYears($d2);

    return ($n2 - $n1);
}

?>