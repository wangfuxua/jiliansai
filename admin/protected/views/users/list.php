<div class="row-fluid">

<div class="span12">

<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div class="portlet box green">

    <div class="portlet-title">

        <div class="caption"><i class="icon-globe"></i>list</div>

        <div class="tools">

            <a class="reload" href="<?php echo base_url('news/List');?>">&nbsp</a>

            <a class="remove" href="javascript:;"></a>

        </div>

    </div>

    <div class="portlet-body">

        <div role="grid" class="dataTables_wrapper form-inline" id="sample_1_wrapper">
            <div class="row-fluid"><div class="span6">
                    <div id="sample_1_length" class="dataTables_length"><label>
                            <div class="select2-container m-wrap small" id="s2id_autogen1">

                                <input type="text" class="select2-focusser select2-offscreen" id="s2id_autogen2"><div style="display:none" class="select2-drop select2-with-searchbox">
                                    <div class="select2-search">       <input type="text" class="select2-input" autocomplete="off">   </div>   <ul class="select2-results">   </ul></div>
                            </div>

                      </label></div></div><div class="span6"><div class="dataTables_filter" id="sample_1_filter"><label>搜索: <input type="text" aria-controls="sample_1" class="m-wrap small"></label>
                    </div></div></div><table id="sample_1" class="table table-striped table-bordered table-hover table-full-width dataTable" aria-describedby="sample_1_info">

                <thead>

                <tr role="row">
                    <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 58px;" aria-label="">序号</th>
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 280px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">手机</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 398px;" aria-label="Browser: activate to sort column ascending">姓名</th>
                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">注册时间</th>
                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 240px;" aria-label="Engine version: activate to sort column ascending">操作</th>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php if(!empty($data)):?>
                <?php foreach($data as $k=>$v):?>
                <tr class="odd">
                    <td class=" "><span class=""><?php echo $v['id']?></span></td>
                    <td class=" sorting_1"><?php echo $v['phone']?></td>
                    <td class=" "><?php echo $v['name']?></td>
                    <td class="hidden-480 "><?php echo date('Y-m-d H:i:s',$v['timeline'])?></td>
                    <td class="hidden-480 "><a href="<?php ?>">查看</a></td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
               </tbody></table>
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