

<?php
//創建檔案
$file=fopen("hello.txt","w");
$str="";
for($i=0;$i<=9;$i++){
    for($j=0;$j<=9;$j++){
        $str = $str. $j ." x " .$i ."=".($i*$j).",";
    }
    $str=$str."\r\n";
}
fwrite($file,$str);


//  發票亂數
// \r\n 斷行
// \t 跳格
// for($i=0;$i<100;$i++){
//     $num=rand(1000000,9999999);
//     $month =rand(1,12);
//     $str=$str.$num.",".$month."\r\n";
// }


//加新檔案或修改
fclose($file);
//可使用終端機機開起或 localhost
//終端機要打  php 檔名  網路要打 localhost/檔名
?>