<div class="row-fluid">

<div class="span12">

<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div class="portlet box green">

    <div class="portlet-title">

        <div class="caption"><i class="icon-globe"></i>list</div>

        <div class="tools">

            <a class="reload" href="<?php echo base_url('item/ItemList');?>">&nbsp</a>

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
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 280px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">项目名称</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 398px;" aria-label="Browser: activate to sort column ascending">当前轮次</th>
                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 360px;" aria-label="Platform(s): activate to sort column ascending">状态</th>
                    <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 240px;" aria-label="Engine version: activate to sort column ascending">操作</th>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                <tr class="odd">
                    <td class=" "><span class="">1</span></td>
                    <td class=" sorting_1">Gecko31</td>
                    <td class=" ">Firefox 1.0</td>
                    <td class="hidden-480 ">Win 98+ / OSX.2+</td>
                    <td class="hidden-480 ">1.7</td>
                </tr>
               </tbody></table>
            <div class="row-fluid"><div class="span6">
                    <div class="dataTables_info" id="sample_1_info">Showing 1 to 10 of 43 entries</div>
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