<div class="row-fluid">

    <div class="span12">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet box green">

            <div class="portlet-title">

                <div class="caption"><i class="icon-globe"></i><a href="<?php echo base_url('item/games');?>"><<返回比赛列表</a></div>

                <div class="tools">

                    <a class="reload" href=""></a>

                    <a class="remove" href="javascript:;"></a>

                </div>

            </div>

            <div class="portlet-body">

                <div role="grid" class="dataTables_wrapper form-inline" id="sample_1_wrapper">
                    <div class="row-fluid">
                        <form action="<?php echo base_url('group/Flight');?>" method="post">
                            <input type="hidden" value="<?php echo $gameid?>" name="gameid">
                            <div class="span6">
                                <div class="dataTables_filter" id="sample_1_filter" ><label>小组选择:
                                        <select  name="group">
                                            <?php if($group==0 || empty($group)):?>
                                                <option value="1">1</option>
                                            <?php else:?>
                                                <?php foreach($group as $v):?>
                                                    <option value="<?php echo $v['group']?>"><?php echo $v['group']?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                </div>
                            </div>
                            <input type="submit" value="提交">

                        </form>
                    </div>

                    <table id="sample_1" class="table table-striped table-bordered table-hover table-full-width dataTable" aria-describedby="sample_1_info">

                        <thead>

                        <tr role="row">

                        <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 280px;" aria-label="">序号</th>
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 280px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">对战队伍1名称</th>

                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">对战队伍2名称</th>
                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">状态</th>

                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php foreach($data as $v):?>
                            <tr class="odd">

                                <td class=" "><span class=""><?php echo $v['id']?></span></td>
                                <td class=" sorting_1"><?php echo $v['ainfo']['tname']?>
                                    <?php if(!$v['status'] and $v['winteam']== $v['teamA']):?>
                                        <span style="color: #008000">胜利</span>
                                    <?php endif;?>
                                    <?php if($v['status']):?>
                                        <a class="btn" onclick="win('<?php echo $v['id']?>','<?php echo $v['teamA']?>')">胜利队伍</a>
                                    <?php endif?>
                                </td>
                                <td class=" sorting_1"><?php echo $v['binfo']['tname']?>
                                    <?php if(!$v['status'] and $v['winteam']== $v['teamB']):?>
                                        <span style="color: #008000">胜利</span>
                                    <?php endif;?>
                                    <?php if($v['status']):?>
                                        <a class="btn green" onclick="win('<?php echo $v['id']?>','<?php echo $v['teamB']?>')">胜利队伍</a>
                                    <?php endif?>
                                        </td>

                                <td class=" ">
                                    <?php if($v['status']):?>
                                        比赛进行中
                                <?php else:?>
                                        比赛已经结束
                                <?php endif;?>
                                </td>

                            </tr>
                        <?php endforeach;?>
                        </tbody>

                        <tr class="odd">

                        </tr>
                    </table>

                </div>

            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

    </div>

    <script>
            function win(fid,tid){
                $.ajax(
                    {
                        url:"<?php echo base_url('Fight/UpFight');?>",
                        dataType:'json',
                        type:'post',
                        data:{
                            fid:fid,
                            tid:tid
                        },
                        success:function(msg){
                            if(msg==1){
                                window.location.reload();rerurn ;
                            }
                        }
                    }

                );
            }
    </script>
