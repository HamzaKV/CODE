<?php
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Youth Employment</title>
        <link type="text/css" href="CSS/StyleSheet.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="JS/Script.js"></script>
        <style>
            body{margin: 0;}
            a{text-decoration: underline;}
            #padlink{
    color: #fff;}
        </style>
    </head>
    <body style="background-color: #B9BAB8;" ondragstart="return false" >
        <div style="height: 100px; background-color: #373D33; color: #fff;">
            <div style="width: 60%; margin-left: auto; margin-right: auto">
                <div style="float: left">
                    <p style="font: 40px/40px Helvetica, sans-serif;">
                        Youth Employment
                    </p>
                </div>
                <div style="float: right">
                    <p style="font: 16px/80px Helvetica, sans-serif;">
                        <a id="padlink" href="Index.php">Home</a>
                        <a id="padlink" href="Pages/search.php">Search</a>
                    </p>
                </div>
            </div>
        </div>
        <div>
            <?php
                include("Pages/Body.php")
            ?>
        </div>
        <?php
            include("Pages/Footer.php")
        ?>
    </body>
</html>
