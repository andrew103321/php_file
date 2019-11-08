<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new pdo($dsn,'root','');

if(!empty($_FILES)&& $_FILES['file']['error']==0){
     // 上傳檔案的檔案類型
    $type =$_FILES['file']['type'];
    // 上傳檔案後的暫存資料夾位置
    $filename=$_FILES['file']['name'];
    $path="./upload/";
    $updateTime=date("Y-m-d H:i:s");
    //  搬移檔案  move_uploaded_file (上傳檔案後的暫存資料夾位置,"要去的位置".去file陣列抓取名稱)
    move_uploaded_file($_FILES['file']['tmp_name'] ,$path.$filename);
   
    // 刪除資料庫黨案前要先，刪除檔案區資料
    $id=$_POST['id'];

    $sql="select * from files where id='$id'";
    $origin=$pdo->query($sql)->fetch();
    $origin_file=$origin['path'];
   
    unlink($origin_file);
    
    $desc=$_POST['desc'];
    //更新資料
    $sql="update files set name='$filename',type='$type',update_time='$updateTime',
    path='" . $path . $filename . "',`desc`= '$desc' where id='$id' ";
    echo "<br>";
    echo $sql;
    $result = $pdo->exec($sql);

    if($result=1){
        echo "成功";
        header("location:manage.php");
    }else{
        echo "沒有";
    }
}


// 顯示更新檔案
$id = $_GET['id'];
$sql="select *from files where id='$id'";
$data=$pdo->query($sql)->fetch();
?>

<!-- 將值傳給 edit_file.php -->
<form action="edit_file.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td colspan>
            <img src="<?=$data['path'];?>" style="width:200px;height:200px">
        </td>
    </tr>
    <tr>
        <td>name</td>
        <td><?=$data['name'];?></td>
    </tr>
    <tr>
        <td>path</td>
        <td><?=$data['path'];?></td>
    </tr>
    <tr>
        <td>type</td>
        <td><?=$data['type'];?></td>
    </tr>
    <tr>
        <td>說明</td>
        <td><input type="text" name="desc" value="<?=$data['desc'];?>"></td>
    </tr>
    <tr>
        <td>creat_time</td>
        <td><?=$data['create_time']?></td>
    </tr>
</table>
   檔案更新 <input type="file" name='file' >

    <input type="hidden" name='id' value="<?=$data['id'];?>" >
    <input type="submit" value="更新" >
 
</form>
