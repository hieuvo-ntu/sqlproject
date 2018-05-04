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
    </style>
</head>
<body>
    

<h2 style="text-align:center">Thông tin hãng sữa</h2>
    <table>
    <tr>
        <th>Mã HS</th>
        <th>Tên hãng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
    </tr>
    <?php
    $query="SELECT * FROM hang_sua";
    $result=$conn->query($query);
    if($result->num_rows<>0){
        while($row=$result->fetch_array()){
    ?>
    <tr>
        <td><?php echo $row[0]?></td>
        <td><?php echo $row[1]?></td>
        <td><?php echo $row[2]?></td>
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
