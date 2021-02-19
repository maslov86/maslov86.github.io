<?php

$deposit_date = $_POST['deposit_date'];
$deposit_sum = (int)$_POST['deposit_sum'];
$deposit_term = (int)$_POST['deposit_term'];
$deposit_replenishment = $_POST['deposit_replenishment'];

$deposit_replenishment_sum = 0;
if ($deposit_replenishment) {
    $deposit_replenishment_sum = (int)$_POST['deposit_replenishment_sum'];
}

function deposit_calc($deposit_date, $deposit_sum, $deposit_term, $deposit_replenishment_sum) {
    
    $percent = 0.1;
    $result = $deposit_sum + $deposit_replenishment_sum;
    
    for ($i = 0; $i < $deposit_term; $i++) {
        
        $deposit_year = date('d.m.Y', strtotime(''.$deposit_date.' + '.$i.' year'));
        $time = strtotime($deposit_year);
        $month = date("m", $time);
        $year = date("Y", $time);
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $days_in_year = date("L", $time)? 366:365;
        
        for ($j = 0; $j < 12; $j++) {
            $deposit_month = date('d.m.Y', strtotime(''.$deposit_year.' + '.$j.' month'));
            $time = strtotime($deposit_month);
            $month = date("m", $time);
            $year = date("Y", $time);
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            
            $result = $result + ($result + $deposit_replenishment_sum) * 
            $days_in_month * ($percent / $days_in_year);
            
            if($j<11) {
                $result += $deposit_replenishment_sum;
            }
        }
    }
    
    return number_format(round($result), 0, '', ' ')." руб";
}

echo(deposit_calc($deposit_date, $deposit_sum, $deposit_term, $deposit_replenishment_sum));

?>