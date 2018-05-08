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
    $query="SELECT s.ma_sua,s.ten_sua,s.Hinh,hs.ten_hang_sua,ls.ten_loai,s.trong_luong,s.don_gia
    FROM sua AS s 
    JOIN hang_sua AS hs
    ON s.ma_hang_sua=hs.ma_hang_sua
    JOIN loai_sua AS ls
    ON s.ma_loai_sua=ls.ma_loai_sua"
    ;
    $result=$conn->query($query);
    $n=0;
    $item=0;
    
    if($result->num_rows>0){
      
        while($row=$result->fetch_assoc()){
            if($item%5==0) echo "<tr>";
            echo "<td><a href='./list_chi_tiet.php?id={$row['ma_sua']}'>".$row['ten_sua']."</a></br>";
            echo $row['trong_luong']." gr - ".number_format($row['don_gia'],0,",",".")."</br>";
            echo '<img height="100px" width="100px" src="./Hinh_sua/' . $row['Hinh'] . '">'."</td>";
            
    ?>
   
<?php
       
        $item++;
        if($item%5==0 && $item>0) echo "</tr>";   
        }
        
    }
?>

</table>
</body>
</html>