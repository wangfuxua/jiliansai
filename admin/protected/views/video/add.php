<script language="javascript" src="<?php echo base_url("js/upload.js") ?>"></script>
<script language="javascript" src="<?php echo base_url("js/jquery/jquery.uploadifive.min.js") ?>"></script>
<script language="javascript" src="<?php echo base_url("js/jquery/jquery.uploadify.min.js") ?>"></script>
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
                    <a href="/video/list">视频列表</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="/video/add">添加视频</a></li>

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

                    <div class="caption"><i class="icon-reorder"></i>添加视频  <?php //  echo date("Y-m-d H:m:i", 1403513875);?></div>

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
                    <form class="form-horizontal" id='myform' action='<?php echo base_url('video/GoAdd')  ?>' method='post'  >
                        <input type="hidden" value="" name="logo" id="logo">
                        <div class="control-group">
                            <label class="control-label">所属：</label>
                            <div class="controls">
                                <select tabindex="1" class="small m-wrap" name="item_id">
                                    <?php foreach ($cln as $v):?>
                                        <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div id="html1">
                            <div class="control-group">
                                <label class="control-label">视频名称：</label>
                                <div class="controls">
                                    <input type="text" name="name" class="b-wrap " data-trigger="hover"     datatype="*1-116" nullmsg="栏目名称">
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">是否显示：</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" value="1" >
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">视频地址：</label>
                                <div class="controls">
                                    <input type="text" name="url" class="b-wrap span12"  data-trigger="hover"   nullmsg="栏目名称">
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="control-group" id="tiaoma">
                                <label class="control-label">描述：</label>
                                <div class="controls">
                                    <textarea class="large m-wrap" rows="6" cols="60"  name="intr"></textarea>
                                </div>
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