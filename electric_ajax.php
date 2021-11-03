<?php
    // $num1 = intval($_POST['num1']);

    $previous_month_meter_unit = $_POST['previous_month_meter_unit'];
    $current_month_meter_unit = $_POST['current_month_meter_unit'];
    $unit = $current_month_meter_unit - $previous_month_meter_unit;
    $first_unit = $second_unit = $third_unit = $foruth_unit = $fifth_unit = $sixth_unit = $seventh_unit = $total = 0;

    if ($unit >= 0 && $unit <= 30) {
        $first_unit = 35 * $unit;
    } else if ($unit >= 31 && $unit <= 50) {
        $first_unit = 35 * 30;
        $second_unit = 50 * ($unit - 30);
    } else if ($unit >= 51 && $unit <= 75) {
        $first_unit = 35 * 30;
        $second_unit = 50 * 20;
        $third_unit = 70 * ($unit - 30 - 20);
    } else if ($unit >= 76 && $unit <= 100) {
        $first_unit = 35 * 30;
        $second_unit = 50 * 20;
        $third_unit = 70 * 25;
        $foruth_unit = 90 * ($unit - 30 - 20 - 25);
    } else if ($unit >= 101 && $unit <= 150) {
        $first_unit = 35 * 30;
        $second_unit = 50 * 20;
        $third_unit = 70 * 25;
        $foruth_unit = 90 * 25;
        $fifth_unit = 110 * ($unit - 30 - 20 - 25 - 25);
    } else if ($unit >= 151 && $unit <= 200) {
        $first_unit = 35 * 30;
        $second_unit = 50 * 20;
        $third_unit = 70 * 25;
        $foruth_unit = 90 * 25;
        $fifth_unit = 110 * 50;
        $sixth_unit = 120 * ($unit - 30 - 20 - 25 - 25 - 50);
    } else if ($unit > 200) {
        $first_unit = 35 * 30;
        $second_unit = 50 * 20;
        $third_unit = 70 * 25;
        $foruth_unit = 90 * 25;
        $fifth_unit = 110 * 50;
        $sixth_unit = 120 * 50;
        $seventh_unit = 125 * ($unit - 200);
    }

    $total = $first_unit + $second_unit + $third_unit + $foruth_unit + $fifth_unit + $sixth_unit + $seventh_unit;
    $total_cost = $total + 500;

    $data = array(
                'total_cost' => $total_cost,
                'total' => $total,
                'unit' => $unit,
                'first_unit' => $first_unit,
                'second_unit' => $second_unit,
                'third_unit' => $third_unit,
                'fourth_unit' => $foruth_unit,
                'fifth_unit' => $fifth_unit,
                'sixth_unit' => $sixth_unit,
                'seventh_unit' => $seventh_unit,
            );
            echo json_encode($data);
?>