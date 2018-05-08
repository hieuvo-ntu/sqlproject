<?php require('dbCon.php');
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET['search']) && !empty($_GET['search'])){
        $search=$_GET['search'];
        
    }else{
        $search="";
    }
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
        table{
            width:100%;
        }
        tr.even{
            background-color:#fce620;
        }
        tr.odd{
            background-color:#b1ddda;
        }
        
    </style>
</head>
<body>
    
<div style="text-align:center">
<h2>Tìm kiếm thông tin sữa</h2>
<form action="" method="get">
<label for="">Tên sữa</label><input style="margin-bottom:10px" type="text" name="search">
<input type="submit" value="Tìm kiếm">
</form>
</div>
    <table>
    <?php
    $query="SELECT s.ten_sua,s.Hinh,hs.ten_hang_sua,ls.ten_loai,s.tp_dinh_duong,s.loi_ich,s.trong_luong,s.don_gia
    FROM sua AS s 
    JOIN hang_sua AS hs
    ON s.ma_hang_sua=hs.ma_hang_sua
    JOIN loai_sua AS ls
    ON s.ma_loai_sua=ls.ma_loai_sua
    WHERE s.ten_sua LIKE N'%".$search."%'"
    ;
    $result=$conn->query($query);
    $n=0;
    if($result->num_rows>0){
        $sl=$result->num_rows;
        if($sl>0)
        echo"<tr>
        <td style='text-align:center' colspan='2'>Tìm thấy ".$sl." sản phẩm</td>
        </tr>";
        while($row=$result->fetch_assoc()){
        $n++;
        $str="";
    ?>

    <tr class="<?php echo ($n%2==0)?'even':'odd' ?>">
        <td><img height="100px" width="100px" src="./Hinh_sua/<?php echo $row['Hinh'] ?>"></td>
        <td><?php $str="<b>".$row['ten_sua']."</b>"."</br>";
        $str.="Nhà sản xuất".$row['ten_hang_sua']."</br>";
        $str.=$row['ten_loai']." - ".$row['trong_luong']." gr";
        $str.=$row['don_gia']." VNĐ";
        echo $str;
        ?></td>

    </tr>
<?php
        }
    }else{
        echo "<div style='text-align:center'>Không tìm thấy sản phẩm</div>";
    }
?>
</table>
</body>
</html>
