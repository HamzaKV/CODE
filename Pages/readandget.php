<?php
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $province = $_POST["province"];
    $union = $_POST["union"];
    $job = $_POST["job"];
    $wage = $_POST["wage"];
    $jobTitle = $_POST["jobTitle"];
    //echo $province . "<br/>" . $wage . "<br/>" . $job . "<br/>" . $union . "<br/>" . $sex . "<br/>" . $age . "<br/>";
    if($age == "choose" || $sex == "choose" || $province == "choose" || $union == "choose" || $job == "choose" || $wage == "choose" || $jobTitle == "choose" ) {
        echo "You have missed one or more fields!";
    }
    $year = date("Y");
    $month = date("m");
    if($month < 10) {
        if($month == 1) {
            $month = 13;
            $year -= 1;
        }
        $date = $year . "-0" . ($month - 1);
    } else {
        $date = $year . "-" . ($month - 1);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Options</title>
        <style>
            body{margin: 0;}
            /*products table*/
            #proTable {
                margin-left: auto;
                margin-right: auto;
                border: 2px solid #000;
                text-align: center;
            }
            #features {
                display: inline-block;
                margin: 0 auto;
                vertical-align: top;
                padding: 10px 10px 10px 10px;
                width: 70%;
            }
            #products {
                display: inline-block;
                margin: 0 auto;
                vertical-align: top;
                padding: 10px 10px 10px 10px;
                width: 20%;
            }
            #proHead {
                height: 50px;
            }
            #proRow {
                height: 50px;
            }
        </style>
    </head>
    <body style="background-color: #B9BAB8;" >
        <?php
            include("Header.php")
        ?>
        <div id="changer" style="width: 60%; margin-left: auto; margin-right: auto">
            <div id="write" style="padding-bottom: 30px; padding-top: 50px;">
        <?php
            //Opening xml file and parsing
            $xml = simplexml_load_file("../Data/wages/02820073_1.xml") or die("Error: Cannot get 02820073_1.xml");
            $xmlOne = simplexml_load_file("../Data/wages/02820073_2.xml") or die("Error: Cannot get 02820073_2.xml");
            $xmlTwo = simplexml_load_file("../Data/wages/02820073_3.xml") or die("Error: Cannot get 02820073_3.xml");
            $xmlThree = simplexml_load_file("../Data/wages/02820073_4.xml") or die("Error: Cannot get 02820073_4.xml");
            $xmlFour = simplexml_load_file("../Data/wages/02820073_5.xml") or die("Error: Cannot get 02820073_5.xml");
            //$xmlFive = simplexml_load_file("../Data/wages/02820073_6.xml") or die("Error: Cannot get 02820073_6.xml");
            
            $seriesGeo = array_map('strval', $xml->xpath('//cansim:Series/@GEOGRAPHY'));
            $seriesGeoOne = array_map('strval', $xmlOne->xpath('//cansim:Series/@GEOGRAPHY'));
            $seriesGeoTwo = array_map('strval', $xmlTwo->xpath('//cansim:Series/@GEOGRAPHY'));
            $seriesGeoThree = array_map('strval', $xmlThree->xpath('//cansim:Series/@GEOGRAPHY'));
            $seriesGeoFour = array_map('strval', $xmlFour->xpath('//cansim:Series/@GEOGRAPHY'));
            //$seriesGeoFive = array_map('strval', $xmlFive->xpath('//cansim:Series/@GEOGRAPHY'));
            
            $seriesWage = array_map('strval', $xml->xpath('//cansim:Series/@WAGES'));
            $seriesWageOne = array_map('strval', $xmlOne->xpath('//cansim:Series/@WAGES'));
            $seriesWageTwo = array_map('strval', $xmlTwo->xpath('//cansim:Series/@WAGES'));
            $seriesWageThree = array_map('strval', $xmlThree->xpath('//cansim:Series/@WAGES'));
            $seriesWageFour = array_map('strval', $xmlFour->xpath('//cansim:Series/@WAGES'));
            //$seriesWageFive = array_map('strval', $xmlFive->xpath('//cansim:Series/@WAGES'));
            
            $seriesJob = array_map('strval', $xml->xpath('//cansim:Series/@JOBPERMANENCE'));
            $seriesJobOne = array_map('strval', $xmlOne->xpath('//cansim:Series/@JOBPERMANENCE'));
            $seriesJobTwo = array_map('strval', $xmlTwo->xpath('//cansim:Series/@JOBPERMANENCE'));
            $seriesJobThree = array_map('strval', $xmlThree->xpath('//cansim:Series/@JOBPERMANENCE'));
            $seriesJobFour = array_map('strval', $xmlFour->xpath('//cansim:Series/@JOBPERMANENCE'));
            //$seriesJobFive = array_map('strval', $xmlFive->xpath('//cansim:Series/@JOBPERMANENCE'));

            $seriesUnion = array_map('strval', $xml->xpath('//cansim:Series/@UNIONCOVERAGE'));
            $seriesUnionOne = array_map('strval', $xmlOne->xpath('//cansim:Series/@UNIONCOVERAGE'));
            $seriesUnionTwo = array_map('strval', $xmlTwo->xpath('//cansim:Series/@UNIONCOVERAGE'));
            $seriesUnionThree = array_map('strval', $xmlThree->xpath('//cansim:Series/@UNIONCOVERAGE'));
            $seriesUnionFour = array_map('strval', $xmlFour->xpath('//cansim:Series/@UNIONCOVERAGE'));
            //$seriesUnionFive = array_map('strval', $xmlFive->xpath('//cansim:Series/@UNIONCOVERAGE'));

            $seriesSex = array_map('strval', $xml->xpath('//cansim:Series/@SEX'));
            $seriesSexOne = array_map('strval', $xmlOne->xpath('//cansim:Series/@SEX'));
            $seriesSexTwo = array_map('strval', $xmlTwo->xpath('//cansim:Series/@SEX'));
            $seriesSexThree = array_map('strval', $xmlThree->xpath('//cansim:Series/@SEX'));
            $seriesSexFour = array_map('strval', $xmlFour->xpath('//cansim:Series/@SEX'));
           //$seriesSexFive = array_map('strval', $xmlFive->xpath('//cansim:Series/@SEX'));

            $seriesAge = array_map('strval', $xml->xpath('//cansim:Series/@AGEGROUP'));
            $seriesAgeOne = array_map('strval', $xmlOne->xpath('//cansim:Series/@AGEGROUP'));
            $seriesAgeTwo = array_map('strval', $xmlTwo->xpath('//cansim:Series/@AGEGROUP'));
            $seriesAgeThree = array_map('strval', $xmlThree->xpath('//cansim:Series/@AGEGROUP'));
            $seriesAgeFour = array_map('strval', $xmlFour->xpath('//cansim:Series/@AGEGROUP'));
            //$seriesAgeFive = array_map('strval', $xmlFive->xpath('//cansim:Series/@AGEGROUP'));
            
            $obs = array_map('strval', $xml->xpath('//cansim:Obs[@TIME_PERIOD="' . $date . '"]/@OBS_VALUE'));
            $obsOne = array_map('strval', $xmlOne->xpath('//cansim:Obs[@TIME_PERIOD="' . $date . '"]/@OBS_VALUE'));
            $obsTwo = array_map('strval', $xmlTwo->xpath('//cansim:Obs[@TIME_PERIOD="' . $date . '"]/@OBS_VALUE'));
            $obsThree = array_map('strval', $xmlThree->xpath('//cansim:Obs[@TIME_PERIOD="' . $date . '"]/@OBS_VALUE'));
            $obsFour = array_map('strval', $xmlFour->xpath('//cansim:Obs[@TIME_PERIOD="' . $date . '"]/@OBS_VALUE'));
            //$obsFive = array_map('strval', $xmlFive->xpath('//cansim:Obs[@TIME_PERIOD="' . $date . '"]/@OBS_VALUE'));

            $seriesGeo = forLoopFun($seriesGeoOne, $seriesGeo);
            $seriesGeo = forLoopFun($seriesGeoTwo, $seriesGeo);
            $seriesGeo = forLoopFun($seriesGeoThree, $seriesGeo);
            $seriesGeo = forLoopFun($seriesGeoFour, $seriesGeo);
            //$seriesGeo = forLoopFun($seriesGeoFive, $seriesGeo);

            $seriesWage = forLoopFun($seriesWageOne, $seriesWage);
            $seriesWage = forLoopFun($seriesWageTwo, $seriesWage);
            $seriesWage = forLoopFun($seriesWageThree, $seriesWage);
            $seriesWage = forLoopFun($seriesWageFour, $seriesWage);
            //$seriesWage = forLoopFun($seriesWageFive, $seriesWage);

            $seriesJob = forLoopFun($seriesJobOne, $seriesJob);
            $seriesJob = forLoopFun($seriesJobTwo, $seriesJob);
            $seriesJob = forLoopFun($seriesJobThree, $seriesJob);
            $seriesJob = forLoopFun($seriesJobFour, $seriesJob);
            //$seriesJob = forLoopFun($seriesJobFive, $seriesJob);

            $seriesUnion = forLoopFun($seriesUnionOne, $seriesUnion);
            $seriesUnion = forLoopFun($seriesUnionTwo, $seriesUnion);
            $seriesUnion = forLoopFun($seriesUnionThree, $seriesUnion);
            $seriesUnion = forLoopFun($seriesUnionFour, $seriesUnion);
            //$seriesUnion = forLoopFun($seriesUnionFive, $seriesUnion);

            $seriesSex = forLoopFun($seriesSexOne, $seriesSex);
            $seriesSex = forLoopFun($seriesSexTwo, $seriesSex);
            $seriesSex = forLoopFun($seriesSexThree, $seriesSex);
            $seriesSex = forLoopFun($seriesSexFour, $seriesSex);
            //$seriesSex = forLoopFun($seriesSexFive, $seriesSex);

            $seriesAge = forLoopFun($seriesAgeOne, $seriesAge);
            $seriesAge = forLoopFun($seriesAgeTwo, $seriesAge);
            $seriesAge = forLoopFun($seriesAgeThree, $seriesAge);
            $seriesAge = forLoopFun($seriesAgeFour, $seriesAge);
            //$seriesAge = forLoopFun($seriesAgeFive, $seriesAge);
            
            $obs = forLoopFun($obsOne, $obs);
            $obs = forLoopFun($obsTwo, $obs);
            $obs = forLoopFun($obsThree, $obs);
            $obs = forLoopFun($obsFour, $obs);
            //$obs = forLoopFun($obsFive, $obs);

            for($i = 0; $i < count($seriesGeo); $i++) {
                if($seriesGeo[$i] == $province && $seriesWage[$i] == $wage && $seriesJob[$i] == $job && $seriesUnion[$i] == $union && $seriesSex[$i] == $union && $seriesAge[$i] == $age) {
                    $string = $obs[$i];
                    break;
                }
            }
            
            function forLoopFun($array, $pushArray) {
                for($i = 0; $i < count($array); $i++) {
                    array_push($pushArray, $array[$i]);
                }
                return $pushArray;
            }

            /*Opening COPS_Occupational_Groupings*/
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
                array_push($titles, explode(";", $detail[$i]));
            }
            
            /*Opening jo_pe*/
            $availNumbers = array();
            $yearPercent = array();
            $fie = fopen("../Data/Jobopens/jo_pe.csv","r");
            while(!feof($fie)) {
                $line = (fgetcsv($fie));
                array_push($availNumbers, $line[0]);
                array_push($yearPercent, $line[4]);
            }
            fclose($fie);
        ?>
            <div>
                <?php
                    echo "Estimated Salary: &#36;" . $string . "<br/><br/>";
                    echo "Available Jobs:<br/>";
                    /*for($j = 0; $j < count($titles[$jobTitle]); $j++) {
                        echo ($titles[$jobTitle][$j]) . $yearPercent[$j] . "<br/>";
                    }*/
                ?>
                <div id='proTable'>
                    <div id='features'>
                        <div id='proHead'><h3>Title</h3></div>
                        <?php
                            for($j = 0; $j < count($titles[$jobTitle]); $j++) {
                                echo "<p id='proRow'>" . ($titles[$jobTitle][$j]) . "</p>";
                            }
                        ?>
                    </div>
                    <div id='products'>
                        <div id='proHead'><h3>Job Openings<br/>(Estimated)</h3></div>
                        <?php
                            for($j = 0; $j < count($titles[$jobTitle]); $j++) {
                                echo "<p id='proRow'>" . ($yearPercent[$jobTitle] * 1000) . "</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
            include("Footer.php")
        ?>
    </body>
</html>
