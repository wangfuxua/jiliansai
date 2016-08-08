<div class="row-fluid">

<div class="span12">

<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div class="portlet box green">

    <div class="portlet-title">

        <div class="caption"><i class="icon-globe"></i>list</div>

        <div class="tools">

            <a class="reload" href="">&nbsp</a>

            <a class="remove" href="javascript:;"></a>

        </div>

    </div>

    <div class="portlet-body">

        <div role="grid" class="dataTables_wrapper form-inline" id="sample_1_wrapper">
            <div class="row-fluid">
                <form action="<?php echo base_url('group/searchGroup');?>" method="post">
                    <input type="hidden" value="<?php echo $gameid?>" name="gameid">
                <div class="span6">
                    <div class="dataTables_filter" id="sample_1_filter" ><label>小组选择:
                            <select  name="turn">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
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
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 280px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">队伍名称</th>

                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">队伍胜利次数</th>
                <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">操作</th>

                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php foreach($data as $v):?>
                <tr class="odd">

                    <td class=" "><span class=""><?php echo $v['id']?></span></td>
                    <td class=" sorting_1"><?php echo $v['tname']?></td>

                    <td class=" ">0</td>
                    <td class=" ">
                        <a class="btn" onclick="AddTeam1('<?php echo $v['tname']?>','<?php echo $v['tid']?>')">选为队伍1</a>
                        <a class="btn blue" onclick="AddTeam2('<?php echo $v['tname']?>','<?php echo $v['tid']?>')">选为队伍2</a>
                    </td>

                </tr>
                <?php endforeach;?>
               </tbody>

                <tr class="odd">
                    <form action="<?php echo base_url('group/AddFight');?>" method="post">
                        <input type="hidden" value="<?php echo $turn?>" name="turn">
                        <input type="hidden" value="<?php echo $dqgroup?>" name="group">
                    <input type="hidden" value="<?php echo $gameid?>" name="gameid">

                    <td class=" "><span class="">
                           队伍1： <input type="text" id="team1" value="" >
                                   <input type="hidden" id="team1id" value="" name="teamA">
                    </span></td>
                    <td class=" "><span class="">
                          队伍2： <input type="text" value="" id="team2" name="teamB">
                               <input type="hidden" id="team2id" value="" name="teamB">
                    </span></td>
                        <td class=" ">
                    <input type="submit"  value="添加对战">
                        </td>
                    </form>
                </tr>
            </table>

    </div>

</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>

</div>

    <script>
            function AddTeam1(name,id){
                var team2=$('#team2id').val();
                if(team2==id){
                    alert('不能和队伍2相同');return;
                }
                $('#team1').val(name);
                $('#team1id').val(id);
            }
            function AddTeam2(name,id){
               var team1=$('#team1id').val();
                if(team1==id){
                    alert('不能和队伍1相同');return;
                }
                $('#team2').val(name);
                $('#team2id').val(id);
            }
    </script>
