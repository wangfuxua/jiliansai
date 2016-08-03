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

                <div class="span6">
                    <div class="dataTables_filter" id="sample_1_filter"><label>组别选择:
                            <select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>

                    </div>
                </div>
            </div>
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
                    <td class=" "><input type="checkbox" value="1" name="teamid[]"></td>
                    <td class=" "><span class=""><?php echo $v['id']?></span></td>
                    <td class=" sorting_1"><?php echo $v['tname']?></td>
                    <td class=" "><?php echo $v['name']?></td>
                    <td class=" ">0</td>
                    <td class=" ">55555555</td>

                </tr>
                <?php endforeach;?>
               </tbody>
                <tr class="odd">
                    <form action="" method="get">
                    <td class=" "><span class=""><a>全选</a></span></td>
                    <td class=" "><span class="">
                            <select name="goup">
                                <option value="0">添加为一个新组</option>
                                <option value="1">组1</option>
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