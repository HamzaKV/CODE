<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Search</title>
        <style>
            body{margin: 0;}
            #chooser{width: 30%;}
        </style>
    </head>
    <body style="background-color: #B9BAB8;" >
        <?php
            include("Header.php")
        ?>
        <div>
            <div id="changer" style="width: 60%; margin-left: auto; margin-right: auto">
                <div id="write" style="padding-bottom: 30px; padding-top: 50px;">
                    <form action="readandget.php" method="post">
                        Age Group:<br/>
                        <select name="age" id="chooser">
                            <option selected>choose</option>
                            <option value="1">15+</option>
                            <option value="2">15-24</option>
                            <option value="3">25-45</option>
                        </select>
                        <br><br>
                        Sex:<br/>
                        <select name="sex" id="chooser">
                            <option selected>choose</option>
                            <option value="1">both</option>
                            <option value="2">male</option>
                            <option value="3">female</option>
                        </select>
                        <br><br>
                        Province:<br/>
                        <select name="province" id="chooser">
                            <option selected>choose</option>
                            <option value="7">Ontario</option>
                            <option value="6">Quebec</option>
                            <option value="4">Nova Scotia</option>
                            <option value="5">New Brunswick</option>
                            <option value="8">Manitoba</option>
                            <option value="11">British Columbia</option>
                            <option value="3">Prince Edward Island</option>
                            <option value="9">Saskatchewan</option>
                            <option value="10">Alberta</option>
                            <option value="2">Newfoundland and Labrador</option>
                            <option value="14">Northwest Territories</option>
                            <option value="12">Yukon</option>
                            <option value="15">Nunavut</option>
                        </select>
                        <br><br>
                        Union Coverage:<br/>
                        <select name="union" id="chooser">
                            <option selected>choose</option>
                            <option value="1">Total employees, covered and not covered by union</option>
                            <option value="2">Union coverage</option>
                            <option value="3">No union coverage</option>
                        </select>
                        <br><br>
                        Job permanence:<br/>
                        <select name="job" id="chooser">
                            <option selected>choose</option>
                            <option value="1">Total employees, permanent and temporary</option>
                            <option value="2">Permanent employees</option>
                            <option value="3">Temporary employees</option>
                        </select>
                        <br><br>
                        Wage:<br/>
                        <select name="wage" id="chooser">
                            <option selected>choose</option>
                            <option value="1">Total employees, all wages</option>
                            <option value="2">Average hourly wage rate</option>
                            <option value="3">Average weekly wage rate</option>
                            <option value="4">Median hourly wage rate</option>
                            <option value="5">Median weekly wage rate</option>
                        </select>
                        <br><br>
                        <?php
                            $number = array();
                            $name = array();
                            $detail = array();
                            $file = fopen("../Data/Jobopens/COPS_Occupational_Groupings.csv","r");
                            while(!feof($file)) {
                                $line = (fgetcsv($file));
                                array_push($number, $line[0]);
                                array_push($name, $line[1]);
                                array_push($detail, $line[2]);
                            }
                            fclose($file);
                            $titles = array();
                            for($i = 0; $i < count($detail); $i++) {
                                $temp = explode(";", $detail[$i]);
                                for($j = 0; $j < count($temp); $j++) {
                                    array_push($titles, $temp[$j]);
                                }
                            }
                            //print_r($titles);
                        ?>
                        Industry:<br/>
                        <select name="jobTitle" id="chooser">
                            <option selected>choose</option>
                            <?php
                                for($j = 0; $j < count($name); $j++) {
                                    echo "<option value='" . $j . "'>" . $name[$j] . "</option>";
                                }
                            ?>
                        </select>
                        <br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <?php
            include("Footer.php")
        ?>
    </body>
</html>
