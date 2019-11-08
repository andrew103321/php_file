<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">文字檔案匯入練習</h1>
<!---建立檔案上傳機制--->
<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=retired";
$pdo = new pdo($dsn,'root','');

// 讀取檔案 "r"  寫檔案檔案 "w" 
$file=fopen("台灣糖業公司_近5年退休人數.csv","r");
$line=fgets($file);  
// 檢查有待文件尾端嗎
while(!feof($file)){
  
    $line=fgets($file);  
    // 去除到逗號，輸出為陣列
    $data=explode(",",$line);
    if(count($data)>1){
        $sql = "INSERT INTO `retire`(`id`, `year`, `num`, `pro`) 
        VALUES (null,".$data[0].",".$data[1].",".$data[2].")";
        echo    $sql;
        echo "<br>";
        $pdo->exec($sql);
    }
}



?>


<!----讀出匯入完成的資料----->
<?php
?>

</body>
</html>