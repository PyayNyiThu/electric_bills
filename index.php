<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $previous_month_meter_unit = $_POST['previous_month_meter_unit'];
    $current_month_meter_unit = $_POST['current_month_meter_unit'];
    $user_type = $_POST['user_type'];
    $unit = $current_month_meter_unit - $previous_month_meter_unit;
    $first_unit = $second_unit = $third_unit = $foruth_unit = $fifth_unit = $sixth_unit = $seventh_unit = $total = 0;

    if ($user_type == "home_use") {
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
    } else if ($user_type == "industry_use") {
        if ($unit >= 0 && $unit <= 500) {
            $first_unit = 125 * $unit;
        } else if ($unit >= 501 && $unit <= 5000) {
            $first_unit = 125 * 500;
            $second_unit = 135 * ($unit - 500);
        } else if ($unit >= 5001 && $unit <= 10000) {
            $first_unit = 125 * 500;
            $second_unit = 135 * 4500;
            $third_unit = 145 * ($unit - 5000);
        } else if ($unit >= 10001 && $unit <= 20000) {
            $first_unit = 125 * 500;
            $second_unit = 135 * 4500;
            $third_unit = 145 * 5000;
            $foruth_unit = 155 * ($unit - 10000);
        } else if ($unit >= 20001 && $unit <= 50000) {
            $first_unit = 125 * 500;
            $second_unit = 135 * 4500;
            $third_unit = 145 * 5000;
            $foruth_unit = 155 * 10000;
            $fifth_unit = 167 * ($unit - 20000);
        } else if ($unit >= 50001 && $unit <= 100000) {
            $first_unit = 125 * 500;
            $second_unit = 135 * 4500;
            $third_unit = 145 * 5000;
            $foruth_unit = 155 * 10000;
            $fifth_unit = 167 * 30000;
            $sixth_unit = 175 * ($unit - 50000);
        } else if ($unit > 100001) {
            $first_unit = 125 * 500;
            $second_unit = 135 * 4500;
            $third_unit = 145 * 5000;
            $foruth_unit = 155 * 10000;
            $fifth_unit = 167 * 30000;
            $sixth_unit = 175 * 50000;
            $seventh_unit = 180 * ($unit - 100000);
        }

        $total = $first_unit + $second_unit + $third_unit + $foruth_unit + $fifth_unit + $sixth_unit + $seventh_unit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Electric Bills</title>

    <!-- bootstrap4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="post" class="mt-5" action="">
                    <div class="mb-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="user_type" id="home_use" value="home_use" checked>
                            <label class="form-check-label" for="home_use">Home Use</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="user_type" id="industry_use" value="industry_use">
                            <label class="form-check-label" for="industry_use">Industry Use</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="previous_month_meter_unit"> Previous Month Meter Unit </label>
                        <input type="number" required name="previous_month_meter_unit" class="form-control" id="previous_month_meter_unit">
                    </div>

                    <div class="form-group">
                        <label for="current_month_meter_unit"> Current Month Meter Unit </label>
                        <input type="number" required name="current_month_meter_unit" class="form-control" id="current_month_meter_unit">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-sm">Calculate</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <table class="table table-striped table-bordered mt-5">

                    <?php
                    if (isset($user_type) && $user_type == "home_use") {
                    ?>
                        <tr>
                            <th colspan="3" class="text-center">Home Use</th>
                        </tr>
                    <?php
                    } else if (isset($user_type) && $user_type == "industry_use") {
                    ?>
                        <tr>
                            <th colspan="3" class="text-center">Industry Use</th>
                        </tr>
                    <?php
                    }
                    if (isset($first_unit)) {
                    ?>
                        <tr>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Cost</th>
                        </tr>
                        <tr>
                            <?php
                            if (isset($user_type) && $user_type == "home_use") {
                            ?>
                                <th> 35 x </th>
                                <?php
                                if ($unit >= 0 && $unit <= 30) {
                                ?>
                                    <th> <?php echo $unit; ?> </th>
                                <?php
                                } else if ($unit > 30) {
                                ?>
                                    <th> 30 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $first_unit; ?></td>
                            <?php
                            } else if (isset($user_type) && $user_type == "industry_use") {
                            ?>
                                <th> 125 x </th>
                                <?php
                                if ($unit >= 0 && $unit <= 500) {
                                ?>
                                    <th> <?php echo $unit; ?> </th>
                                <?php
                                } else if ($unit > 500) {
                                ?>
                                    <th> 500 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $first_unit; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($second_unit) && $second_unit != 0) {
                    ?>
                        <tr>
                            <?php
                            if (isset($user_type) && $user_type == "home_use") {
                            ?>
                                <th> 50 x </th>
                                <?php
                                if ($unit >= 31 && $unit <= 50) {
                                ?>
                                    <th> <?php echo ($unit - 30); ?> </th>
                                <?php
                                } else if ($unit > 50) {
                                ?>
                                    <th> 20 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $second_unit; ?></td>
                            <?php
                            } else if (isset($user_type) && $user_type == "industry_use") {
                            ?>
                                <th> 135 x </th>
                                <?php
                                if ($unit >= 501 && $unit <= 5000) {
                                ?>
                                    <th> <?php echo ($unit - 500); ?> </th>
                                <?php
                                } else if ($unit > 5000) {
                                ?>
                                    <th> 4500 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $second_unit; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($third_unit) && $third_unit != 0) {
                    ?>
                        <tr>
                            <?php
                            if (isset($user_type) && $user_type == "home_use") {
                            ?>
                                <th> 70 x </th>
                                <?php
                                if ($unit >= 51 && $unit <= 75) {
                                ?>
                                    <th> <?php echo ($unit - 50); ?> </th>
                                <?php
                                } else if ($unit > 75) {
                                ?>
                                    <th> 25 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $third_unit; ?></td>
                            <?php
                            } else if (isset($user_type) && $user_type == "industry_use") {
                            ?>
                                <th> 145 x </th>
                                <?php
                                if ($unit >= 5001 && $unit <= 10000) {
                                ?>
                                    <th> <?php echo ($unit - 5000); ?> </th>
                                <?php
                                } else if ($unit > 10000) {
                                ?>
                                    <th> 5000 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $third_unit; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($foruth_unit) && $foruth_unit != 0) {
                    ?>
                        <tr>
                            <?php
                            if (isset($user_type) && $user_type == "home_use") {
                            ?>
                                <th> 90 x </th>
                                <?php
                                if ($unit >= 76 && $unit <= 100) {
                                ?>
                                    <th> <?php echo ($unit - 75); ?> </th>
                                <?php
                                } else if ($unit > 100) {
                                ?>
                                    <th> 25 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $foruth_unit; ?></td>
                            <?php
                            } else if (isset($user_type) && $user_type == "industry_use") {
                            ?>
                                <th> 155 x </th>
                                <?php
                                if ($unit >= 10001 && $unit <= 20000) {
                                ?>
                                    <th> <?php echo ($unit - 10000); ?> </th>
                                <?php
                                } else if ($unit > 20000) {
                                ?>
                                    <th> 10000 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $foruth_unit; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($fifth_unit) && $fifth_unit != 0) {
                    ?>
                        <tr>
                            <?php
                            if (isset($user_type) && $user_type == "home_use") {
                            ?>
                                <th> 110 x </th>
                                <?php
                                if ($unit >= 101 && $unit <= 150) {
                                ?>
                                    <th> <?php echo ($unit - 100); ?> </th>
                                <?php
                                } else if ($unit > 150) {
                                ?>
                                    <th> 50 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $fifth_unit; ?></td>
                            <?php
                            } else if (isset($user_type) && $user_type == "industry_use") {
                            ?>
                                <th> 167 x </th>
                                <?php
                                if ($unit >= 20001 && $unit <= 50000) {
                                ?>
                                    <th> <?php echo ($unit - 20000); ?> </th>
                                <?php
                                } else if ($unit > 50000) {
                                ?>
                                    <th> 30000 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $fifth_unit; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($sixth_unit) && $sixth_unit != 0) {
                    ?>
                        <tr>
                            <?php
                            if (isset($user_type) && $user_type == "home_use") {
                            ?>
                                <th> 120 x </th>
                                <?php
                                if ($unit > 150 && $unit <= 200) {
                                ?>
                                    <th> <?php echo ($unit - 150); ?>
                                    <?php
                                } else if ($unit > 200) {
                                    ?>
                                    <th> 50 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $sixth_unit; ?></td>
                            <?php
                            } else if (isset($user_type) && $user_type == "industry_use") {
                            ?>
                                <th> 175 x </th>
                                <?php
                                if ($unit > 50000 && $unit <= 100000) {
                                ?>
                                    <th> <?php echo ($unit - 50000); ?>
                                    <?php
                                } else if ($unit > 100000) {
                                    ?>
                                    <th> 50000 </th>
                                <?php
                                }
                                ?>
                                <td><?php echo $sixth_unit; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($seventh_unit) && $seventh_unit != 0) {
                    ?>
                        <tr>
                            <?php
                            if (isset($user_type) && $user_type == "home_use") {
                            ?>
                                <th> 125 x </th>
                                <?php
                                if ($unit > 200) {
                                ?>
                                    <th> <?php echo ($unit - 200); ?>
                                    <?php
                                }
                                    ?>
                                    <td><?php echo $seventh_unit; ?></td>
                                <?php
                            } else if (isset($user_type) && $user_type == "industry_use") {
                                ?>
                                    <th> 180 x </th>
                                    <?php
                                    if ($unit > 100000) {
                                    ?>
                                        <th> <?php echo ($unit - 100000); ?>
                                        <?php
                                    }
                                        ?>
                                        <td><?php echo $seventh_unit; ?></td>
                                    <?php
                                }
                                    ?>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($total) && $total != 0) {
                    ?>
                        <tr>
                            <th> Total </th>
                            <th><?php echo $unit; ?></th>
                            <td><?php echo $total; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-4">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                ?>
                    <table class="table table-striped table-bordered mt-5">
                        <?php
                        if (isset($user_type) && $user_type == "home_use") {
                        ?>
                            <tr>
                                <th colspan="3" class="text-center">Home Use</th>
                            </tr>
                        <?php
                        } else if (isset($user_type) && $user_type == "industry_use") {
                        ?>
                            <tr>
                                <th colspan="3" class="text-center">Industry Use</th>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <th>Previous Month Meter Unit</th>
                            <td><?php echo $previous_month_meter_unit; ?></td>
                        </tr>
                        <tr>
                            <th>Current Month Meter Unit</th>
                            <td><?php echo $current_month_meter_unit; ?></td>
                        </tr>

                        <tr>
                            <th>Total Unit</th>
                            <td><?php echo $unit; ?></td>
                        </tr>

                        <tr>
                            <th>Meter Service</th>
                            <td>500</td>
                        </tr>
                        <tr>
                            <th>Cost</th>
                            <td><?php echo $total; ?></td>
                        </tr>
                        <tr>
                            <th>Total Cost</th>
                            <td><?php echo 500 + $total; ?></td>
                        </tr>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- bootstrap4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>