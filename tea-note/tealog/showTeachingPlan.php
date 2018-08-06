<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}
?>
 <!DOCTYPE html> 
<html>
<head>
<title>
</title>
<object  id="jatoolsPrinter" classid="CLSID:B43D3361-D075-4BE2-87FE-057188254255"  codebase="jatoolsPrinter.cab#version=5,7,0,0"></object>  
<script type="text/jscript" src="js/showTeachingPlan.js" ></script>
<script type="text/jscript" src="js/print_word.js" ></script>
<script type="text/jscript" src="js/print_pdf.js" ></script>

</head>
<body>
    
    
    
<div  style='margin:0 auto;' align='center' border="0" cellspacing='0' cellpadding='0'  bordercolor='#000' style=" margin-top:-20px;">
<thead>
<?php
//获取到页面输入的数据
error_reporting(0);
$tea_name=$_POST['tea_name'];
$tea_class=$_POST['tea_class'];
$tea_cou=$_POST['tea_cou'];
$tea_term=$_POST['tea_term'];
$year_month=$_POST['month'];
$month=substr($year_month,-2);
$year=substr($year_month,0,4);

setcookie('tea_name',$tea_name);
setcookie('tea_class',$tea_class);
setcookie('tea_cou',$tea_cou);
setcookie('tea_term',$tea_term);
setcookie('month',$month);
setcookie('year',$year);
//echo "month=".$month."<br/>";
//连接
@$id = mysql_connect("localhost","root","root");
//打开
@$db=mysql_select_db("db_tealog",$id);
$sql_id="select tea_id from tb_teachinginfo where tea_name='$tea_name' and tea_class='$tea_class' and tea_cou='$tea_cou' and tea_term='$tea_term'";
//echo "sql=".$sql_id."<br/>";

$result = mysql_query($sql_id,$id); 
$tea_id='';
if($row=mysql_fetch_array($result)){
   $tea_id=$row['tea_id'];
}
if($tea_id!=''){
 $sql_plan="select tp_id,tea_id,tp_content,tp_kewai,tp_time from  tb_teachingPlanInfo where tea_id=$tea_id and month(tp_time)='$month' order by tp_time"; 
//echo "sql_plan=".$sql_plan."<br/>";
 $result = mysql_query($sql_plan,$id); 

 echo "<div id='page1'>";
 echo "<table id='tableExcel' style='width:600px;border-spacing:0px 0px;text-align:center;'  border='1' cellspacing='0' cellpadding='4'>";
 echo "<tr><td colspan='7' align='center' style='border-bottom:none;font-size:15px;'><br/></td></tr>";
 echo "<tr><td colspan='7' align='center' style='border-bottom:none;border-top:none;font-size:15px;'>北  京  工  业  职  业  技  术  学  院</td></tr>";
echo "<tr><td colspan='7' align='center' style='border-top:none;font-size:25px;'>教   师   课   堂   教   学   日   志</td></tr>";
echo "<tr style='font-size:10px;'>";
echo "<td  colspan='2' style='border-left: none;border-right: none;border-top:none;border-bottom:none;'>教师姓名:$tea_name</td>";

echo "<td  colspan='2'style='border-left: none;border-right: none;border-top:none;border-bottom:none;'>任课班级:$tea_class</td>";

echo "<td  colspan='2'style='border-left: none;border-right: none;border-top:none;border-bottom:none;'>课程名称:$tea_cou</td>";

echo "<td  style='border-left: none;border-right: none;border-top:none;border-bottom:none;'>".$year."年".$month."月</td>";
echo "</tr>";

echo "<tr align='center' border='1' cellspacing='0' cellpadding='8'  bordercolor='#000'><td>月/日</td>";
echo "<td colspan='4'>教&nbsp;学&nbsp;内&nbsp;容&nbsp;摘&nbsp;要</td>";
echo "<td colspan='2'>课&nbsp;外&nbsp;作&nbsp;业</td></tr>";

 $rows=0;
 while($row=mysql_fetch_array($result)){
   $rows=$rows+1;
   $tp_id=$row['tp_id'];
   $tea_id=$row['tea_id'];
   $tp_content=$row['tp_content'];
   $tp_kewai=$row['tp_kewai'];
   $tp_time=$row['tp_time'];
    echo "<tr style='font-size:12px;'>";
	echo"<td style='width:50px;text-align:center;'>".date('m',strtotime($tp_time)).'/'.date('d',strtotime($tp_time))."</td><td colspan='4' style='text-align:center;'>$tp_content</td><td colspan='2' style='width:200px;text-align:center;'>$tp_kewai</td>";
	echo"</tr>";
   
 }
 
 while(($rows++)<20){
 echo "<tr><td style='text-align:center;'>&nbsp;</td><td colspan='4' style='text-align:center;'>&nbsp;</td><td colspan='2'  style='width:200px;text-align:center;'>&nbsp;</td></tr>";
 }

echo "<tr><td colspan='7' align='left' style='font-size:13px; border-bottom:none;'>&nbsp;说明: 1、本表必须由任课教师认真填写，学校以此作为计算每月课堂教学工作量的依据。</td></tr>";
echo "<tr><td colspan='7' align='left' style='font-size:13px;border-top:none;border-bottom:none;'>&nbsp;&nbsp;2、本表必须按教学班及时填写，月底交系(部)汇总。</td></tr>";
echo "<tr><td colspan='7' style='text-align:right; border-top:none;'>&nbsp;系(部)主任(签字):&nbsp;</td></tr>";
 echo "</table>";

 echo "</div>";


}


?>

<div style='text-align:center;width:500px;border:0px solid red;margin:0 auto;padding:20px;'>
<input type="button" value="打印预览..."   onclick="doPrint('打印预览...')"/>
<input type="button" value="导出Excel..."  onclick="method2('tableExcel')"/>
<input type="button" value="导出Pdf..."   onclick="AllAreaPdf('导出Pdf...')"/>  
</div>

    <div class="pagin">
    	
    </div>
    
    
    <div class="tip">
    	
    
    </div>
    
    
    
   

</thead>
</div>      
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	function method2(tableid)
        {

            var curTbl = document.getElementById(tableid);
			var oXL = new ActiveXObject("Excel.Application");
			var oWB = oXL.Workbooks.Add();
			var xlsheet = oWB.Worksheets(1);
			var sel = document.body.createTextRange();
			sel.moveToElementText(curTbl);
			sel.execCommand("Copy");
			xlsheet.Paste();
			var fname = oXL.Application.GetSaveAsFilename(name+".xlsx", "Excel Spreadsheets (*.xlsx), *.xlsx");
			oWB.SaveAs(fname);
			oWB.Close(savechanges = false);
			oXL.Quit();
			oXL = null;
            oXL.Visible = true;
			// mergeCell(tableid,0,7,3);
			// mergeCell(tableid,6,20,3);
			// mergeCell(tableid,20,20,3);
			// mergeCell(tableid,21,21,3);
			// mergeCell(tableid,24,24,3);
			// mergeCell(tableid,26,28,5);
			// mergeCell(tableid,20,21,3);
        }
		
		/**
		 * 合并单元格
		 * @param table1    表格的ID
		 * @param startRow  起始行
		 * @param endRow    结束行
		 * @param col   合并的列号，对第几列进行合并(从0开始)。如果传下来为0就是从第一列开头到结束合并
		 */
		function mergeCell(table1, startRow, endRow, col) {
			
			var tb = document.getElementById(table1);
			console.log(tb.rows[0].cells.length);
			if (col >= tb.rows[0].cells.length) {
				return;
			}
			if (col == 0) { endRow = tb.rows.length-1; }
			for (var i = startRow; i < endRow; i++) {
				if (tb.rows[startRow].cells[col].innerHTML == tb.rows[i + 1].cells[0].innerHTML) {
					//console.log(111111);
					tb.rows[i + 1].removeChild(tb.rows[i + 1].cells[0]);
					tb.rows[startRow].cells[col].rowSpan = (tb.rows[startRow].cells[col].rowSpan | 0) + 1;
					if (i == endRow - 1 && startRow != endRow) {
						//console.log(22222);
						mergeCell(table1, startRow, endRow, col + 1);
					}
				} else {
						//console.log(33333);
					mergeCell(table1, startRow, i + 0, col + 1);
					startRow = i + 1;
				}
			}
		}
	</script> 
	<script>
	function export_data(){
    $.post("datagrid_getusertestdata_excel.php", 
     { from_time: $('#from_time').val(), 
       end_time: $('#end_time').val(), 
       user_name: $('#user_name').combobox('getText'), 
     },
        function(data){
          //$('#dg').datagrid('loadData', data);
          //alert($('#user_name').combobox('getValue'));
          location.href = $('#user_name').combobox('getText')+"_user_test_record_table"+".xlsx"; 
        });
       
   }
   </script>
</body>
</html>
