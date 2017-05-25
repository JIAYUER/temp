


<script>
	
function dataTime(){
	
	var oSel1 = document.getElementById("sel1");
			var oSel2 = document.getElementById("sel2");
			var oSel3 = document.getElementById("sel3");
       function creatDate(){
		//生成1900年-2100年
		for(var i = 1900; i<=2100;i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oSel1.appendChild(option);
		}
		//生成1月-12月
		for(var i = 1; i <=12; i++){
		 var option = document.createElement('option');
		 option.setAttribute('value',i);
		 option.innerHTML = i;
		 oSel2.appendChild(option); 
		}
	 //生成1日—31日
		 for(var i = 1; i <=31; i++){
		  var option = document.createElement('option');
		  option.setAttribute('value',i);
		  option.innerHTML = i;
		 oSel3.appendChild(option); 
		 }	
}
	
	creatDate();
	//保存某年某月的天数
	var days;
	//年份点击
	oSel1.onclick = function(){//实现必须从年开始选择---------
		//月份显示默认值
		
		oSel2.options[0].selected = true;
		//天数显示默认值
		oSel3.options[0].selected = true;
	};
	//月份点击
	oSel2.onclick = function(){
		//天数显示默认值
		oSel3.options[0].selected = true;
		//计算天数的显示范围
		
		//如果是2月
		if(oSel2.value == 2){
		    //如果是闰年
		    if((oSel1.value % 4 === 0 && oSel1.value % 100 !== 0)  || oSel1.value % 400 === 0){
		        days = 29;
		    //如果是平年
		    }else{
		        days = 28;
		    }
		//如果是第4、6、9、11月
		}else if(oSel2.value == 4 || oSel2.value == 6 ||oSel2.value == 9 ||oSel2.value == 11){
		    days = 30;
		}else{
		    days = 31;
		}
		//增加或删除天数
		//如果是28天，则删除29、30、31天(即使他们不存在也不报错)
		if(days == 28){
			oSel3.remove(31);
			oSel3.remove(30);
			oSel3.remove(29);
		}
		//如果是29天
		if(days == 29){
			oSel3.remove(31);
			oSel3.remove(30);
			//如果第29天不存在，则添加第29天
			if(!oSel3.options[29]){
				oSel3.add(new Option('29','29'),undefined);//Option(文本,value)
			}
		}
		//如果是30天
		if(days == 30){
			oSel3.remove(31);
			//如果第29天不存在，则添加第29天
			if(!oSel3.options[29]){
				oSel3.add(new Option('29','29'),undefined);
			}
			//如果第30天不存在，则添加第30天
			if(!oSel3.options[30]){
				oSel3.add(new Option('30','30'),undefined);
			}
		}
		//如果是31天
		if(days == 31){
			//如果第29天不存在，则添加第29天
			if(!oSel3.options[29]){
				oSel3.add(new Option('29','29'),undefined);
			}
			//如果第30天不存在，则添加第30天
			if(!oSel3.options[30]){
				oSel3.add(new Option('30','30'),undefined);
			}
			//如果第31天不存在，则添加第31天
			if(!oSel3.options[31]){
				oSel3.add(new Option('31','31'),undefined);
			}
		}
	};
	
	//结果显示
	box.onclick = function(){
		//当年、月、日都已经为设置值时
		if(oSel1.value !='year' && oSel2.value != 'month' && oSel3.value !='day'){
			result.innerHTML = oSel1.value + '年' + oSel2.value + '月' +  oSel3.value + '日';
		}else{
			result.innerHTML = '';
		}
	};

	
	
};
	</script>
		
		

	


			