<?php
    // //打开数据库连接
	// $link= mysqli_connect('localhost','root','','trdb');
//     
    // //选择数据库
    // @mysqli_select_db($link,'trdb') or die('数据库连接失败');设置传输编码
//     
    // //设置传输编码
    // mysqli_set_charset($link,'UTF8');
    $link=@mysqli_connect('localhost','root','') or die('数据库连接失败');
    
    @mysqli_select_db($link,'trdb') or die('数据库连接失败');
    
    mysqli_set_charset($link,'UTF8');
     
	
?>
