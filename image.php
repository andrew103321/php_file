<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳圖案機制
 * 3.取得圖檔資源
 * 4.進行圖形處理
 *   ->圖形縮放
 *   ->圖形加邊框
 *   ->圖形驗證碼
 * 5.輸出檔案
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
<h1 class="header">圖形處理練習</h1>
<!---建立檔案上傳機制--->



<!----縮放圖形----->
<?php
// 建立圖片大小
// $img = imagecreatetruecolor(100,100);
// $bg = imagecreatetruecolor(25,25);

// $background = imagecolorallocate($bg,255,0,0);
// imagefill($bg,0,0,$background);

// imagecopymerge(目標圖像,被拷貝的源圖像,目標圖像開始x 坐標,
// 目標圖像開始y 坐標,拷貝圖像開始x 坐標,拷貝圖像開始y 坐標,拷貝的寬度,拷貝的高度,透明度);
// imagecopymerge($img,$bg,15,20,0,0,30,30,100);
// imagecopymerge($img,$bg,60,20,0,0,30,30,100);
// imagecopymerge($img,$bg,40,70,0,0,30,30,100);

//存取圖片以png
// imagepng($img,"test.png");
// imagepng($bg,"bg.png");


// 複製
//  $thm=imagecreatetruecolor(50,50);
//  $src=imagecreatefrompng("test.png");
// // 調整複製大小
// imagecopyresampled($thm,$src,0,0,0,0,50,50,100,100);
// //存取圖片以png
// imagepng($thm,"thm.png");


//  縮放放圖片
 $imgSrc="1.png";
// 函數用於獲取圖像尺寸，類型等信息
 $imgInfo=getimagesize($imgSrc);
 $rate=0.5;

// // 計算縮放後的大小  他是一個陣列 ARRAY 0是寬 1是高
 $dst_w=$imgInfo[0]*$rate;
 $dst_h=$imgInfo[1]*$rate;

//  產生一個縮小的圖框 為黑色
 $thm=imagecreatetruecolor($dst_w,$dst_h);

 //產生原圖大小
$src=imagecreatefrompng($imgSrc);

// dst_image : 輸出目標檔案
// src_image : 來源檔案
// dst_x: 目標檔案開始點的 x 座標
// dst_y: 目標檔案開始點的 y 座標
// src_x: 來源檔案開始點的 x 座標
// src_y: 來源檔案開始點的 y 座標
// dst_w: 目標檔案的長度
// dst_h: 目標檔案的高度
// src_w: 來源檔案的長度
// src_h: 來源檔案的高度

// imagecopyresampled ( resource dst_image, resource src_image, int dst_x, int dst_y, 
// int src_x, int src_y, int dst_w, int dst_h, int src_w, int src_h )
imagecopyresampled($thm,$src,0,0,0,0,$dst_w,$dst_h,$imgInfo[0],$imgInfo[1]);

imagepng($thm,"thm.png");


?>
<!-- <img src="test.png" alt=""> -->
<img src="1.png" alt="">
<img src="thm.png" alt="">
<!-- <img src="bg.png" alt=""> -->

<!----圖形加邊框----->


<!----產生圖形驗證碼----->



</body>
</html>