<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holidays selection</title>
    <style>
        .first{
            border: 3px solid black; 
        }
    </style>
</head>
<body>
<?php
require('connApi.php');
$res = new apiConn();
$reses1 = $res->responses1;
$reses2 = $res->responses2; 
?>
<h1>Holidays To Observe</h1>
<div class='first'>
<?php
$x = 0;
foreach ($reses1 as $i){
    ?>
    <label for=<?=$i['nameEn']?>><?=$i['nameEn']?> || Current Year: <?=$i['observedDate']?> || Next year: <?=$reses2[$x]['observedDate']?></label>
    <input type="checkbox" class="checks" value=<?=$i['nameEn']?>>
    <br>
    <?php
    $x++; 
}
?>
    <br><a href='#' onClick="getValue(); return false;"> Save</a>
    <script>
        function getValue(){
        var checks = document.getElementsByClassName('checks');
        var str = '';
        for (i = 0; i < 9; i++){
           if ( checks[i].checked === true ){
               str += checks[i].value + " ";

           } 
        }
        alert(str);
        } 
    </script>
</div>     
</body>
</html>



