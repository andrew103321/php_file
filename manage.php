<?php
/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */
$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new pdo($dsn,'root','');

if(!empty($_FILES)&& $_FILES['file']['error']==0){
  
     $type =$_FILES['file']['type'];
     
  
    // 上傳檔案後的暫存資料夾位置
    $filename=$_FILES['file']['name'];
    $path="./upload/";
    //  搬移檔案  move_uploaded_file (上傳檔案後的暫存資料夾位置,"要去的位置".去file陣列抓取名稱)
    move_uploaded_file($_FILES['file']['tmp_name'],$path.$filename);
    


    $sql="insert into `files`(`name`, `type`,  `path`) 
    values ('$filename','$type','".$path.$filename."')";

   $result = $pdo->exec($sql);

   if($result=1){
        echo "成功";
    }else{
        echo "沒有";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <style>
    a{
        /* 自動填滿表格 */
        display: inline-block;
        border: 1px solid #ccc;
        padding: 5px 15px;
        border-radius: 20px;
        box-shadow: 1px 1px 3px #ccc;
    }
    a:visited{
         background-color:red;
   
    }
    </style>
</head>
<body>
<h1 class="header">檔案管理練習</h1>
<!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->


<form action="manage.php" method="post" enctype="multipart/form-data">
 <!--  file 以陣列方式傳檔案 -->
  檔案：<input type="file" name="file" ><br>
 
  <input type="submit" value="上傳">
</form>





<!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->

<table >
     <tr>
         <td>id</td>
         <td>name</td>
         <td>type</td>
         <td>path</td>
         <td>create time</td>
         <td>操作</td>
     </tr>

    <?php
        $sql="select *from files";
       
        $rows = $pdo->query($sql)->fetchAll();
        foreach($rows as $key => $file){
    ?>
     <tr>
         <td><?=$file["id"];?></td>
         <td><?=$file["name"];?></td>
         <td><?=$file["type"];?></td>
         <td><?=$file["path"];?></td>
         <td><?=$file["create_time"];?>

         <td ><a href="edit_file.php?id=<?=$file["id"];?>">更新檔案</a>
               <a href="edit_file.php?id=<?=$file["id"];?>">刪除檔案</a>
         </td>
     </tr>

<?php
}
?>
 </table>
</body>
</html>