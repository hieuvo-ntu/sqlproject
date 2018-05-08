<?php
require'./dbCon.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];
}
$query="SELECT s.ten_sua,s.Hinh,hs.ten_hang_sua,s.tp_dinh_duong,s.loi_ich,s.trong_luong,s.don_gia
FROM sua AS s
JOIN hang_sua AS hs
ON s.ma_hang_sua=hs.ma_hang_sua
WHERE s.ma_sua='$id'";
$result=$conn->query($query);
if($result->num_rows>0){
  
   list($ten_sua,$hinh,$hang_sua,$tp,$loi_ich,$tl,$dg)=$result->fetch_array();
   $don_gia=number_format($dg,0,",",".");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        table,th,td,tr{
            border:1px solid black;
            border-collapse:collapse;
            
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th style="text-align:center" colspan="2"><?php echo "<h2><b>$ten_sua - $hang_sua</h2></b>" ?></th>
    </tr>
    <tr>
        <td><img height='200px' width='200px' src='./Hinh_sua/<?php echo $hinh?>'></td>
        </td>
        <td><?php
        echo"<b>Thành phần dinh dưỡng:</b></br>$tp<br>";
        echo"<b>Lợi ích:</b></br>$loi_ich</br>";
        echo"<p style='float:right'><b>Trọng lượng: </b>$tl gr - <b>Đơn giá: $don_gia VNĐ</b></p>";
        ?>
        </td>
    </tr>
</table>
    
</body>
</html>