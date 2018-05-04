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
    

<h2 style="text-align:center">Thông tin khách hàng</h2>
    <table>
    <tr>
        <th>Mã KH</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
    </tr>
    <?php
    $query="SELECT * FROM khach_hang";
    $result=$conn->query($query);
    $n=0;
    if($result->num_rows<>0){
        while($row=$result->fetch_array()){
        $n++;
    ?>
    <tr class="<?php echo ($n%2==0)?'even':'odd' ?>">
        <td><?php echo $row[0]?></td>
        <td><?php echo $row[1]?></td>
        <td><img src="<?php if($row[2]=='1'){
            echo './female.png';
            }
            else{
                echo './male.png';
            }
        ?>"></td>
        <td><?php echo $row[3]?></td>
        <td><?php echo $row[4]?></td>
    </tr>
<?php
        }
    }
?>
</table>
</body>
</html>
