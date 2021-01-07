<?php
require('connApi.php');

$res = new apiConn();
$reses1 = $res->responses1;
$reses2 = $res->responses2; 
?>
<h1>Holidays To Observe</h1>
<?php
$x = 0;
foreach ($reses1 as $i){
    ?>
    <h3><?=$i['nameEn']?> || Current Year: <?=$i['observedDate']?> || Next year: <?=$reses2[$x]['observedDate']?></h3>
    <?php
    $x++; 
}
?>
