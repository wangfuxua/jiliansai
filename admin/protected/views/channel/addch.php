
<script language="javascript" src="<?php echo base_url("js/upload.js") ?>"></script>
<script language="javascript" src="<?php echo base_url("js/jquery/jquery.uploadifive.min.js") ?>"></script>
<script language="javascript" src="<?php echo base_url("js/jquery/jquery.uploadify.min.js") ?>"></script>
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
                    <a href="index.html">Home</a>
                    <i class="icon-angle-right"></i>
                </li>



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

                    <div class="caption"><i class="icon-reorder"></i>添加渠道   <?php //  echo date("Y-m-d H:m:i", 1403513875);?></div>

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
                    <form class="form-horizontal" id='myform' action='<?php echo base_url('channel/GoAddCh')  ?>' method='post'  >
                        <input type="hidden" value="" name="logo" id="logo">
                        <div id="html1">
                            <div class="control-group">
                                <label class="control-label">渠道：</label>
                                <div class="controls">
                                    <select tabindex="1" class="small m-wrap" name="cln_id">
                                    <?php foreach($data as $v):?>
                                        <option value="<?php echo $v['id']?>"><?php echo '=='.$v['name']?></option>
                                    <?php endforeach;?>
                                        </select>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">合作名称：</label>
                                <div class="controls">
                                    <input type="text" name="name" class="b-wrap " data-trigger="hover"     datatype="*1-116" nullmsg="项目/游戏名称">
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">合作链接：</label>
                                <div class="controls">
                                    <input type="text" name="url" class="b-wrap " data-trigger="hover"     datatype="*1-116" nullmsg="项目/游戏名称">
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>

                                <div class="control-group">
                                    <label class="control-label">LOGO：</label>
                                    <div class="controls">
                                        <div class="usercr">


                                            <div class="utxtximg">
                                                <img class="zltx" id="header_photo" src="" onerror="this.src='<?php echo base_url() ?>images/usertx.png'"  width="100" height="100">
                                            </div>
                                            <div class="txupload">
                                                <input type="file"   name="btn_header3" id="btn_header3" style="display: none;background: red">
                                            </div>
                                            <div class="clear"></div>
                                            <div class="user_info_p1 mb10"></div>
                                        </div>
                                    </div>
                                </div>


                            <div class="control-group">
                                <label class="control-label">是否跳转：</label>
                                <div class="controls">
                                    <input type="checkbox" name="type" class="b-wrap" value="1">是
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">是否显示：</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" class="b-wrap" value="1">是
                                    <span class="help-inline  Validform_checktip"></span>
                                </div>
                            </div>
                            <div class="control-group" id="tiaoma">
                                <label class="control-label">描述：</label>
                                <div class="controls">
                                    <textarea class="large m-wrap" rows="6" cols="60"  name="desc"></textarea>
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

<script src="/media/js/form-fileupload.js"></script>
