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
                        <input type="number" required name="previous_month_meter_unit" id="previous_month_meter_unit" class="form-control" id="previous_month_meter_unit">
                    </div>

                    <div class="form-group">
                        <label for="current_month_meter_unit"> Current Month Meter Unit </label>
                        <input type="number" required name="current_month_meter_unit" id="current_month_meter_unit" class="form-control" id="current_month_meter_unit">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-success btn-sm" id="calc_btn">Calculate</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">

                <table class="table table-striped table-bordered mt-5">
                    <tbody id="unit_table"></tbody>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-striped table-bordered mt-5">
                    <tbody id="form_table" align="right"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- bootstrap4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#calc_btn').bind('click', function() {
                var form_table = "";
                var unit_table = "";
                $.ajax({
                    url: 'electric_ajax.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        previous_month_meter_unit: $('#previous_month_meter_unit').val(),
                        current_month_meter_unit: $('#current_month_meter_unit').val(),
                        // home_use: $('#home_use').val(),
                        // industry_use: $('#industry_use').val(),
                        // $('#btn_get').val(var_name);
                        user_type: $("input[name='user_type']:checked").val(),
                    },
                    success: function(data) {
                        var total_cost = data.total_cost;
                        var total = data.total;
                        var unit = data.unit;
                        var first_unit = data.first_unit;
                        var second_unit = data.second_unit;
                        var third_unit = data.third_unit;
                        var fourth_unit = data.fourth_unit;
                        var fifth_unit = data.fifth_unit;
                        var sixth_unit = data.sixth_unit;
                        var seventh_unit = data.seventh_unit;
                        var diff_unit = 0;
                        var user_type = data.user_type;
                        if(user_type == "home_use") {
                            form_table += `<tr>
                            <th colspan="2" class="text-center">Home Use</th>
                            `;
                            unit_table += `<tr>
                            <th colspan="3" class="text-center">Home Use</th>
                            `;
                        } else if(user_type == "industry_use") {
                            form_table += `<tr>
                            <th colspan="2" class="text-center">Industry Use</th>
                            `;
                            unit_table += `<tr>
                            <th colspan="3" class="text-center">Industry Use</th>
                            `;
                        }
                        form_table += `<tr>
                         <th>Previous Month Meter Unit</th>
                         <td>` + $('#previous_month_meter_unit').val() + `</td>
                         </tr>
                         <tr>
                         <th>Current Month Meter Unit</th>
                         <td>` + $('#current_month_meter_unit').val() + `</td>
                         </tr>
                         <tr>
                         <th>Total Unit</th>
                         <td>${unit}</td>
                         </tr>
                         <tr>
                         <th>Meter Service</th>
                         <td>500</td>
                         </tr>
                         <tr>
                         <th>Cost</th>
                         <td>${total}</td>
                         </tr>
                         <tr>
                        <th>Total Cost</th>
                        <th>${total_cost}</th></tr>`;
                        $("#form_table").html(form_table);

                        unit_table += `<tr>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Cost</th>
                        </tr>`;

                        if (first_unit == 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>35 x</th>
                            <th>${unit}</th>
                            <th>${first_unit}</th></tr>`;
                        } else if (first_unit == 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>125 x</th>
                            <th>${unit}</th>
                            <th>${first_unit}</th></tr>`;
                        }
                        if (first_unit != 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>35 x</th>`;
                            if (unit <= 30) {
                                unit_table += `<th>${unit}</th>`;
                            } else if (unit > 30) {
                                unit_table += `<th>30</th>`;
                            }
                            unit_table += `<th>${first_unit}</th></tr>`;
                        } else if (first_unit != 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>125 x</th>`;
                            if (unit <= 500) {
                                unit_table += `<th>${unit}</th>`;
                            } else if (unit > 500) {
                                unit_table += `<th>500</th>`;
                            }
                            unit_table += `<th>${first_unit}</th></tr>`;
                        }
                        if (second_unit != 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>50 x</th>`;
                            if (unit >= 31 && unit <= 50) {
                                diff_unit = unit - 30;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 50) {
                                unit_table += `<th>20</th>`;
                            }
                            unit_table += `<th>${second_unit}</th></tr>`;
                        } else if (second_unit != 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>135 x</th>`;
                            if (unit >= 501 && unit <= 5000) {
                                diff_unit = unit - 500;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 5000) {
                                unit_table += `<th>4500</th>`;
                            }
                            unit_table += `<th>${second_unit}</th></tr>`;
                        }
                        if (third_unit != 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>70 x</th>`;
                            if (unit >= 51 && unit <= 75) {
                                diff_unit = unit - 50;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 75) {
                                unit_table += `<th>25</th>`;
                            }
                            unit_table += `<th>${third_unit}</th></tr>`;
                        } else if (third_unit != 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>145 x</th>`;
                            if (unit >= 5001 && unit <= 10000) {
                                diff_unit = unit - 5000;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 10000) {
                                unit_table += `<th>5000</th>`;
                            }
                            unit_table += `<th>${third_unit}</th></tr>`;
                        }
                        if (fourth_unit != 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>90 x</th>`;
                            if (unit >= 76 && unit <= 100) {
                                diff_unit = unit - 75;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 100) {
                                unit_table += `<th>25</th>`;
                            }
                            unit_table += `<th>${fourth_unit}</th></tr>`;
                        } else if (fourth_unit != 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>155 x</th>`;
                            if (unit >= 10001 && unit <= 20000) {
                                diff_unit = unit - 10000;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 2000) {
                                unit_table += `<th>10000</th>`;
                            }
                            unit_table += `<th>${fourth_unit}</th></tr>`;
                        }
                        if (fifth_unit != 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>110 x</th>`;
                            if (unit >= 101 && unit <= 150) {
                                diff_unit = unit - 100;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 150) {
                                unit_table += `<th>50</th>`;
                            }
                            unit_table += `<th>${fifth_unit}</th></tr>`;
                        } else if (fifth_unit != 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>167 x</th>`;
                            if (unit >= 20001 && unit <= 50000) {
                                diff_unit = unit - 20000;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 50000) {
                                unit_table += `<th>30000</th>`;
                            }
                            unit_table += `<th>${fifth_unit}</th></tr>`;
                        }
                        if (sixth_unit != 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>120 x</th>`;
                            if (unit >= 151 && unit <= 200) {
                                diff_unit = unit - 150;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 200) {
                                unit_table += `<th>50</th>`;
                            }
                            unit_table += `<th>${sixth_unit}</th></tr>`;
                        } else if (sixth_unit != 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>175 x</th>`;
                            if (unit > 50000 && unit <= 100000) {
                                diff_unit = unit - 50000;
                                unit_table += `<th>${diff_unit}</th>`;
                            } else if (unit > 100000) {
                                unit_table += `<th>50000</th>`;
                            }
                            unit_table += `<th>${sixth_unit}</th></tr>`;
                        }
                        if (seventh_unit != 0 && user_type == "home_use") {
                            unit_table += `<tr>
                            <th>125 x</th>`;
                            if (unit > 200) {
                                diff_unit = unit - 200;
                                unit_table += `<th>${diff_unit}</th>`;
                            }
                            unit_table += `<th>${seventh_unit}</th></tr>`;
                        } else if (seventh_unit != 0 && user_type == "industry_use") {
                            unit_table += `<tr>
                            <th>180 x</th>`;
                            if (unit > 100000) {
                                diff_unit = unit - 100000;
                                unit_table += `<th>${diff_unit}</th>`;
                            }
                            unit_table += `<th>${seventh_unit}</th></tr>`;
                        }
                        unit_table += `<th>Total</th>
                        <th>${unit}</th>
                        <th>${total}</th></tr>`;
                        $("#unit_table").html(unit_table);

                    }
                });
            });
        });
    </script>
</body>

</html>