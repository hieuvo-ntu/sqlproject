<?php require('dbCon.php');?>
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
    

<h2 style="text-align:center">Thông tin các sản phẩm</h2>
    <table>
    <?php
    $query="SELECT s.ten_sua,s.Hinh,hs.ten_hang_sua,ls.ten_loai,s.trong_luong,s.don_gia
    FROM sua AS s 
    JOIN hang_sua AS hs
    ON s.ma_hang_sua=hs.ma_hang_sua
    JOIN loai_sua AS ls
    ON s.ma_loai_sua=ls.ma_loai_sua"
    ;
    $result=$conn->query($query);
    $n=0;
    if($result->num_rows>0){
      
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
    }
?>
</table>
</body>
</html>
