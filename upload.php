<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */
    //  判斷是否有檔案，判斷檔案是否沒有錯誤代碼   
    if(!empty($_FILES)&& $_FILES['img']['error']==0){
        echo "post有東西喔";
        // $_FILES['img'] 為你要抓的表單檔案  ['error'] 顯示錯誤代碼
        echo $_FILES['img']['error'];
        echo "<br>";
        // 上傳檔案的檔案類型
        echo $_FILES['img']['type'];
        echo "<br>";
        // 上傳的檔案原始大小
        echo $_FILES['img']['size'];
        // 上傳檔案後的暫存資料夾位置
        echo$_FILES['img']['tmp_name'];
        echo "<br>";
        //  搬移檔案  move_uploaded_file (上傳檔案後的暫存資料夾位置,"要去的位置".去file陣列抓取名稱)
        move_uploaded_file($_FILES['img']['tmp_name'],"./img/".$_FILES['img']['name']);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->
 <!-- 上傳方式必打  enctype="multipart/form-data" -->
 <form action="upload.php" method="post" enctype="multipart/form-data">
 <!--  file 以陣列方式傳檔案 -->
  檔案：<input type="file" name="img" ><br>
 
  <input type="submit" value="上傳">
</form>


<!----建立一個連結來查看上傳後的圖檔---->  
<br><br>
<a href="./img/">查看上傳表單</a>

</body>
</html>