
<script language="javascript" type="text/javascript" src="/js/ueditor/ueditor.all.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/ueditor/ueditor.config.js"></script>
<script language="javascript" type="text/javascript" src="/js/ueditor/ueditor.parse.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="container-fluid">

    <!-- BEGIN PAGE HEADER-->

    <div class="row-fluid">

        <div class="span12">

            <!-- BEGIN STYLE CUSTOMIZER -->

            <!-- END BEGIN STYLE CUSTOMIZER -->

            <!-- BEGIN PAGE TITLE & BREADCRUMB-->

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?php echo base_url('index/index')?>">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/news/list">新闻管理</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="/news/list">新闻列表</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/news/addnews">添加文章</a></li>

            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->

        </div>

    </div>

    <!-- END PAGE HEADER-->

    <!-- BEGIN PAGE CONTENT-->

    <div class="row-fluid">

        <div class="span12">
            <div class="portlet box blue">

                <div class="portlet-title">

                    <div class="caption"><i class="icon-reorder"></i>添加文章   <?php //  echo date("Y-m-d H:m:i", 1403513875);?></div>

                    <!-- <div class="tools">

                        <a href="javascript:;" class="collapse"></a>

                        <a href="#portlet-config" data-toggle="modal" class="config"></a>

                        <a href="javascript:;" class="reload"></a>

                        <a href="javascript:;" class="remove"></a>

                    </div> -->

                </div>

                <div class="portlet-body form">

                    <!-- BEGIN FORM-->


                    <?php if(isset($_GET['error']) && $_GET['error']==1){echo "<span style='color: red'>您输入的信息不完整,请重新输入</span>";}?>
                    <hr />
                    <form class="form-horizontal" id='myform' action='<?php echo base_url('news/GoAddnew')  ?>' method='post'  >
                        <div class="control-group">
                            <label class="control-label">所属栏目：</label>
                            <div class="controls">
                                <select tabindex="1" class="small m-wrap" name="cln_id">
                                    <?php foreach ($cln as $v):?>
                                        <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div id="html1">
                            <div class="control-group">
                                <label class="control-label">标题：</label>
                                <div class="controls">
                                    <input type="text" name="title" class="b-wrap " data-trigger="hover"     datatype="*1-116" nullmsg="栏目名称">
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>





                                    <div class="control-group">
                                        <label class="control-label">创建时间：</label>
                                        <div class="controls">
                                            <input type="text" name="timeline" class="m-wrap big" data-trigger="hover"  value="<?php echo date('Y-m-d H:i:s',time())?>"     datatype="*1-255" nullmsg="创建时间">
                                            <span class="help-inline  Validform_checktip"></span>
                                        </div>
                                    </div>

                            <div class="control-group" id="tiaoma">
                                <label class="control-label">描述：</label>
                                <div class="controls">
                                    <textarea class="large m-wrap" rows="6" cols="60"  name="desc"></textarea>

                                </div>

                            </div>
                                    <div style=" ">
                                    <!-- 加载编辑器的容器 -->
                                    <script id="container" name="text" type="text/plain">

                                    </script>
                                    <!-- 配置文件 -->
                                    <script type="text/javascript" src="/js/ueditor/ueditor.config.js"></script>
                                    <!-- 编辑器源码文件 -->
                                    <script type="text/javascript" src="/js/ueditor/ueditor.all.js"></script>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('container');
                                    </script>
                                        </div>



                                    <div class="form-actions">
                                <button type="submit" class="btn blue">保存</button>
                                <button type="button" class="btn" onclick="history.go(-1)">返回</button>
                            </div>
                        </div>
                    </form>


                    <!-- END FORM-->

                </div>

            </div>

        </div>

    </div>

    <!-- END PAGE CONTENT-->

</div>

<!-- END PAGE CONTAINER-->

</div>

<!-- END PAGE -->

</div>