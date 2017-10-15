
/* CSS Document */
function doPrint(how) {
var myDoc = {
settings:{paperName:'B5'},   // 选择a4纸张进行打印,
//这里的页面设计没有作用，打印页面使用b5，左15.05，右9.05 上9.05 下9.05
settings:{orientation:1},   // 选择横向打印,1为纵向，2为横向
 documents: document,
copyrights: '杰创软件拥有版权  www.jatools.com' 
}; 
if (how == '打印预览...'){
//alert("aaaaaaaaa");
jatoolsPrinter.printPreview(myDoc); // 打印预览 
}else if (how == '打印...'){
alert("bbbbbbb");
jatoolsPrinter.print(myDoc, true); // 打印前弹出打印设置对话框 
}else 
jatoolsPrinter.print(myDoc, false); // 不弹出对话框打印 
}   

