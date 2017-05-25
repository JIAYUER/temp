<?php
	//ini_set("max_execution_time",'0');
	  // set_time_limit(200);
	//实验一--------------------------------------------------------------------------------------------
	 include 'conn.php';
	
	$filename1="temp.txt";
	$fps1=fopen($filename1,'r');
	$filename2='E:/data.txt';
	$fps2=fopen($filename2,'w');

	while(!feof($fps1)){  //检测流上的文件结束符，如果文件结束返回非0值，否则返回0
		$contents=fgets($fps1);  //与feof配套使用，每次读取一行
		if(empty($contents)){
			break;
		}
	 
		$contents1=substr($contents,15,4);	//用substr获取字符串，从15开始不包括15，长度为4
		if(preg_match("/^0*/",$contents1)){    //match方法返回的是匹配的字符串
			if(preg_match("/^[0]*$/",$contents1)){
		 		$contents1='0';	 
		 	}else{
		 		$contents1=preg_replace('/^0*/','',$contents1);	
		 	}
		}
		//$contents1=intval($contents1);   //转换成整形f(substr($contents,15,4)){
		//echo $contents1 ."<br>";
						
			
		
		$contents2=substr($contents,19,2);
		if(preg_match("/^0*/",$contents2)){
			if(preg_match("/^[0]*$/",$contents2)){
		 		$contents2='0';	 
		 	}else{
		 		$contents2=preg_replace('/^0*/','',$contents2);	
		 	}
		 }
		//$contents2=intval($contents2);
		//echo $contents2 ."<br>";		
			
				
		$contents3=substr($contents,21,2);
		if(preg_match("/^0*/",$contents3)){
			if(preg_match("/^[0]*$/",$contents3)){
		 		$contents3='0';	 
		 	}else{
		 		$contents3=preg_replace('/^0*/','',$contents3);	
		 	}
		}
		//$contents3=intval($contents3);
		//echo $contents3 ."<br>";		
		
		
		$contents4=substr($contents,23,2);
		if(preg_match("/^0*/",$contents4)){
			if(preg_match("/^[0]*$/",$contents4)){
		 		$contents4='0';	 
		 	}else{
		 		$contents4=preg_replace('/^0*/','',$contents4);	
		 	}
		}
		//$contents4=intval($contents4);
		//echo $contents1 ."<br>";		
		
		
		
		$contents5=substr($contents,87,1);
		if(preg_match("/^0*/",$contents5)){
			if(preg_match("/^[0]*$/",$contents5)){
		 		$contents5='0';	 
		 	}else{
		 		$contents5=preg_replace('/^0*/','',$contents5);	
		 	}
		}
		//echo $contents5 ."<br>";
				
		
		$contents6=substr($contents,88,4);
		if(preg_match("/^0*/",$contents6)){
			if(preg_match("/^[0]*$/",$contents6)){
		 		$contents6='0';	 
		 	}else{
		 		$contents6=preg_replace('/^0*/','',$contents6);	
		 	}
		}
	 	// if($contents6=='0000'){
	 		// $contents6='0';	 
	 	// }else{
	 		// $contents6=preg_replace('/^0*/','',$contents6);	
	 	// }
						 
					
		//echo $contents6 ."<br>";
		//$contents6=intval($contents6);
				
		$contents='('."$contents1".','."$contents2".','."$contents3".','."$contents4".','."$contents5"."$contents6".')'; 
	 fwrite($fps2,$contents."\r\n");
	}
	fclose($fps1);
	fclose($fps2); 
	
	// $id_item = 1;
//实验二-------------------------------------------------------------------------------------------
	
	 $fps3=fopen($filename2,'r');
	 $str = "";
	 while (!feof($fps3)) {
		 $contentss=fgets($fps3);//与feof配套使用，每次读取一行
		 if (empty($contentss)) {
			 break;
		 }
		 $contentss=preg_replace('/\(/','',$contentss);
		 $contentss=preg_replace('/\)/','',$contentss);
		 $arr=explode(',', $contentss);   //按逗号切割字符串
		 $str.= '(\''."$arr[0]".'-'."$arr[1]".'-'."$arr[2]".' '."$arr[3]".':00:00'.'\','.'\''."$arr[4]".'\'),';
		         //('1901-01-01 06:00:00','-78'),
	 }
	
	  $str = substr($str, 0,strlen($str)-1);    //去掉最后一个逗号
	   echo $str;
	  	 // $str2 ="('','e','f'),('','e','z'),('','e','i'),('','e','h')";
	     // $str3 = "('1901','1'),('1901','1')";
	 $sql="insert into tempt(time,temperature) values".$str;
	 $query=mysqli_query($link,$sql); 
	 

	 
	 // while(!feof($fps3)){  //检测流上的文件结束符，如果文件结束返回非0值，否则返回0
		 // $contentss=fgets($fps3);//与feof配套使用，每次读取一行
		 // if (empty($contentss)) {
			 // break;
		 // }
		 // $contentss=preg_replace('/\(/','',$contentss);
		 // $contentss=preg_replace('/\)/','',$contentss);
		 // $arr=explode(',', $contentss);   //按逗号切割字符串
		 // //var_dump($filename2);
		 // //$time=array_slice($arr, 0, 4 );   //从数组中取出一段	
		 // $time="$arr[0]".'-'."$arr[1]".'-'."$arr[2]".' '."$arr[3]";
		 // // echo $time;
		 // // $num=count($arr)-1;
		 // $temperature="$arr[4]";
// 		 
		 // //echo $temperature."<br>";
// 		 
		 // //echo $time.$temperature."<br>";
// 		 
		 // $sql="insert into tempt(id,time,temperature) values($id_item,'$time','$temperature')";
		 // $query=mysqli_query($link,$sql); 
		 // $id_item++;
// 		 
// 		 
		 // echo $time.$temperature."<br>";
// 		 
	// }
	fclose($fps3);
	// //$time=substr($time,0,strlen($time)-1);
	// //$temperature=substr($temperature,0,strlen($temperature)-1);
	// //$sql="insert ignore into tempt(time,temperature) values('$time','$temperature')";  //存在不改变，不存在就添加
// 		
// 	
	
?>