<div class="row-fluid">

<div class="span12">

<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div class="portlet box green">

    <div class="portlet-title">

        <div class="caption"><i class="icon-globe"></i><a href="<?php echo base_url('item/games');?>"><<返回比赛列表</a></div>

        <div class="tools">

            <a class="reload" href="">&nbsp</a>

            <a class="remove" href="javascript:;"></a>

        </div>

    </div>

    <div class="portlet-body">

        <div role="grid" class="dataTables_wrapper form-inline" id="sample_1_wrapper">
            <div class="row-fluid">
                <form action="<?php echo base_url('group/index');?>" method="get">
                    <input type="hidden" value="<?php echo $gameid?>" name="gameid">
                <div class="span6">
                    <div class="dataTables_filter" id="sample_1_filter" ><label>轮次选择:
                            <select  name="turn">
                                <?php for($i=1;$i<=$turn;$i++):?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php endfor;?>

                            </select>
                    </div>
                </div>
                    <input type="submit" value="提交">

                </form>
            </div>
            <form action="<?php echo base_url('group/AddGroup');?>" method="post">
            <table id="sample_1" class="table table-striped table-bordered table-hover table-full-width dataTable" aria-describedby="sample_1_info">

                <thead>

                <tr role="row">
                <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 58px;" aria-label="">选择</th>
                    <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 58px;" aria-label="">序号</th>
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 280px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">队伍名称</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 398px;" aria-label="Browser: activate to sort column ascending">队伍负责人</th>
                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">队伍胜利次数</th>
                <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">状态</th>

                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php foreach($data as $v):?>
                <tr class="odd">
                    <td ><input type="checkbox" id="subcheck"  value="<?php echo $v['id']?>" name="teamid[]"></td>
                    <td class=" "><span class=""><?php echo $v['id']?></span></td>
                    <td class=" sorting_1"><?php echo $v['tname']?></td>
                    <td class=" "><?php echo $v['name']?></td>
                    <td class=" ">0</td>
                    <td class=" ">55555555</td>

                </tr>
                <?php endforeach;?>
               </tbody>
                <tr class="odd">
                        <input type="hidden" value="<?php echo $turn?>" name="turn">
                    <input type="hidden" value="<?php echo $gameid?>" name="gameid">
                    <td class=" "><span class=""><input type="checkbox" onclick="selectAll()" class="group-checkable" id="SelectAll" data-set="#sample_1 .checkboxes"></span></td>
                    <td class=" "><span class="">
                            <select name="goup">
                                <option value="0">添加为一个新组</option>
                                <?php if(!empty($group)):?>
                                    <?php foreach($group as $v):?>
                                <option value="<?php echo $v['group']?>">组<?php echo $v['group']?></option>
                                        <?php endforeach;?>
                                <?php endif;?>
                            </select>
                    </span></td>
                        <td class=" ">
                    <input type="submit"  value="添加">
                        </td>
                    </form>
                </tr>
            </table>
            <div class="row-fluid"><div class="span6">

                </div>
                <div class="span6">
                    <div class="row-fluid">
                        <?php
                        $this->widget('CLinkPager',array(
                                'header'=>'',
                                'firstPageLabel' => '首页',
                                'lastPageLabel' => '末页',
                                'prevPageLabel' => '上一页',
                                'nextPageLabel' => '下一页',
                                'pages' => $page,
                                'maxButtonCount'=>10
                            )
                        );
                        ?>


                    </div>
                </div></div>
    </div>

</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>

    <script>
        function selectAll(){
            if ($("#SelectAll").attr("checked")) {
                $("INPUT[type='checkbox']").each( function() {
                    $(this).attr('checked', true);
                    $(this).parents('.checker').find('span').addClass('checked');
                });
            } else {

                $("INPUT[type='checkbox']").each( function() {
                    $(this).attr('checked', false);
                    $(this).parents('.checker').find('span').removeClass('checked');
                });
            }
        }
    </script>
