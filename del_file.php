<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new pdo($dsn,'root','');

$id=$_GET['id'];

if(!empty($_GET['do'])){

    // get回傳後為字串，所以判斷要變成字串判斷
    if($_GET['do']=="true"){
    
        // 刪除資料庫黨案前要先，刪除檔案區資料

        $sql="select * from files where id='$id'";
        $origin=$pdo->query($sql)->fetch();
        $origin_file=$origin['path'];
        unlink($origin_file);    

        $sql="delete from files where id='$id'";
        $pdo->exec($sql);
        header("location:manage.php");
    }else{
        header("location:manage.php");
    }
}
?>
你是否確認刪除?
<a href="?do=true&id=<?=$id;?>">確認刪除</a>=====
<a href="?do=false&id=<?=$id;?>">取消</a>