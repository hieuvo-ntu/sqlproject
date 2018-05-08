<?php require('dbCon.php');
		$rowsperPage=5;
		if(!isset($_GET['page'])){
            $_GET['page']=1;
            
		}
		$page=$_GET['page'];
		$offer=($page-1)*$rowsperPage;
		
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
    

<h2 style="text-align:center">Thông tin khách hàng</h2>
    <table>
    <tr>
        <th>STT</th>
        <th>Tên sữa</th>
        <th>Hãng sữa</th>
        <th>Loại sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
    </tr>
    <?php
    $query="SELECT s.ten_sua,hs.ten_hang_sua,ls.ten_loai,s.trong_luong,s.don_gia
    FROM sua AS s 
    JOIN hang_sua AS hs
    ON s.ma_hang_sua=hs.ma_hang_sua
    JOIN loai_sua AS ls
    ON s.ma_loai_sua=ls.ma_loai_sua
    LIMIT ".$offer.",".$rowsperPage;
   	
    $result=$conn->query($query);
    $n=0;
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
        $n++;
    ?>
    <tr class="<?php echo ($n%2==0)?'even':'odd' ?>">
        <td><?php echo $n?></td>
        <td><?php echo $row['ten_sua']?></td>
        <td><?php echo $row['ten_hang_sua']?></td>
        <td><?php echo $row['ten_hang_sua']?></td>
        <td><?php echo $row['trong_luong']?></td>
        <td><?php echo number_format($row['don_gia'],0,",",".")." VNĐ"?></td>
    </tr>
<?php
        }
    }
?>
</table>
<?php
	
	$kq=$conn->query('SELECT s.ten_sua,hs.ten_hang_sua,ls.ten_loai,s.trong_luong,s.don_gia
    FROM sua AS s 
    JOIN hang_sua AS hs
    ON s.ma_hang_sua=hs.ma_hang_sua
    JOIN loai_sua AS ls
    ON s.ma_loai_sua=ls.ma_loai_sua');
    $numrows=$kq->num_rows;
    echo "<div style='text-align:center'>";
    if($numrows>0){
        $maxPage=ceil($numrows/$rowsperPage);
        echo"<a href=".$_SERVER['PHP_SELF']."?page=1><< </a>";
        if($_GET['page']>1)
        echo"<a href=".$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."><</a>";
    	for($i=1;$i<=$maxPage;$i++){
            if($i==$_GET['page']){
                echo '<b>Trang'.$i.'</b>';
            }else{
                echo"<a href=".$_SERVER['PHP_SELF']."?page=$i>Trang ".$i."</a>";
            }
        }
        if($_GET['page']<$maxPage)
        echo"<a href=".$_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">></a>";
        
        echo"<a href=".$_SERVER['PHP_SELF']."?page=$maxPage> >></a>";
    }
    echo "</div>"
   
?>
</body>
</html>