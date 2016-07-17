
if (!fg$)
	var fg$ = {};
 
fg$.flv = {//start
	/**cu
	 * 用于用户自己设定cfg的参数
	 * @param  {option}   option   传入的参数
	 * @param  {function} callback 回调函数
	 */
	option : function(option){
	 	var el = this;
	 	el.cfg = option;
        var d;
		//alert(fg$.flv.cfg.uid);
	}
}//end

function flv_load(){
    var cfg=fg$.flv.cfg;
   
    var url =  cfg.root + "case/case_change/id/"+cfg.id+"/"+Math.floor(Math.random()*9999+1000);
    $.get( url,  function(data){
        if(data=='ok'){
        $("#msg").hide();//隐藏
        flv_show();
       }else{
            var auto = setInterval(function(){
            var url =  cfg.root + "Case/case_change/id/"+cfg.id+"/"+Math.floor(Math.random()*9999+1000);
            $.get( url,  function(data){
                if(data=='ok'){
                clearInterval(auto);
                $("#msg").hide();//隐藏
                flv_show();
               }
            } 
            );  
            },6000)  
       }
    } 
    );  
     

}

 function flv_show(){
        var cfg=fg$.flv.cfg;
        //alert(cfg.SWFFile);
        $('#documentViewer').FlexPaperViewer(
            { config : {

                jsDirectory : cfg.jsDirectory,
                //FlexPaperViewer文件位置
                SWFFile : cfg.SWFFile,
                //需要使用FlexPaper打开的文档
                Scale : 0.6,
                //初始化缩放比例，参数值应该是大于零的整数（1=100%）
                ZoomTransition : 'easeOut',
                //FlexPaper中缩放样式，它使用和Tweener一样的样式，默认参数值为easeOut，其他可选值包括：easenone，easeout，linear，easeoutquad
                ZoomTime : 0.5,
       

                //从一个缩放比例变为另外一个缩放比例需要花费的时间，该参数值应该为0或更大
                ZoomInterval : 0.2,
                //缩放比例之间间隔，默认值为0.1，该值应该为正数
                FitPageOnLoad : true,
                //初始化时自适应页面，与使用工具栏上的适应页面按钮同样的效果
                FitWidthOnLoad : false,
                //初始化时自适应页面宽度，与工具栏上的适应宽度按钮同样的效果
                FullScreenAsMaxWindow : false,
                //当设置为true时，单击全拼按钮会打开一个FlexPaper最大化的新窗口而不是全屏，当由于flash播放器因为安全而禁止全屏，而使用flexpaper作为独立的flash播放器的时候设置为true是个优先选择
                ProgressiveLoading : false,
                //当设置为true时，展示文档时不会加载完整个文档，而是逐步加载，但是需要将文档中转化为9以上的版本（使用pdf2swf的时候使用-T 9标签）
                MinZoomSize : 0.2,
                //设置最小的缩放比例
                MaxZoomSize : 5,
                //设置最大的缩放比例
                SearchMatchAll : false,
                //设置为true时，单击搜索所有符合条件的地方高亮显示
                InitViewMode : 'Portrait',
                //设置启动模式如“Portrait”或“TowPage”
                RenderingOrder : 'flash',
                StartAtPage : '',

                ViewModeToolsVisible : true,
                //工具栏上是否显示样式选择框
                ZoomToolsVisible : true,
                //工具栏上时候显示缩放工具
                NavToolsVisible : true,
                //工具栏上是否显示导航工具
                CursorToolsVisible : true,
                //工具栏上是否显示光标工具
                SearchToolsVisible : true,
                //工具栏上是否显示搜索工具
                WMode : 'window',
                localeChain: 'zh_CN'
            }}
    );

    }


 
//$(function() {
jQuery(document).ready(function() {
    $("#msg").html("文件读取中。。。请稍后");
	flv_load();
    //flv_show();
});