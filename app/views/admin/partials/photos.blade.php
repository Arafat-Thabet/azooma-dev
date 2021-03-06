@extends('admin.index')
@section('content')

<div class="overflow row">
    <div class="col-md-8">
        <ol class="breadcrumb">
            <li><a href="<?= route('adminhome'); ?>">Dashboard</a></li>
            <li class="active">{{ $title }}</li>
        </ol>
    </div>
    <div class="col-md-4">
        <button type="button" class="btn pull-right" data-bs-toggle="collapse" data-bs-target="#filter-main">  <i data-feather="filter"></i> </button>
    </div>
</div>


<div id="filter-main" class="collapse well-white">
    <legend>   Filter Results </legend>  
   
        <div class="form-group row">
            <label for="sort" class="col-md-2 control-label">Restaurants</label>
            <div class="col-md-6">
                <select name="rest" id="rest" class="form-control">
                    <option value="">please select </option>
                    <?php
                    $allrest = MRestActions::getAllRestaurants($country, "", 1, "", false, "", 0, "", "", "", "", "", "name");
                    if (count($allrest) > 1) {
                        foreach ($allrest as $rest) {
                            ?>
                            <option value="<?php echo $rest->rest_ID; ?>"><?php echo $rest->rest_Name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="statu" class="col-md-2 control-label">Status</label>
            <div class="col-md-6">
                <select name="status" id="status" class="form-control">
                    <option value="">please select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-lg-2 col-md-6">
                <input type="hidden" name="type" id="type" value="<?php if(isset($_GET['type'])){ echo $_GET['type']; } ?>">
                <button type="button"  onclick="reloadTable('admin-gallery-table');" class="btn btn-primary-gradien">Filter</button>          
            </div>
        </div>
</div>


<div class="well-white">

    <article>    
        <fieldset>
            <legend>
                {{ $pagetitle }}
                <a href="{{ route('admingallery/form'); }}" class="btn btn-info btn-sm pull-right">Add new </a>
            </legend>        
        </fieldset>

        <div class="panel">
            <div class="panel-heading">
          
            </div>
            <div class="table-responsive">
            <table id="admin-gallery-table" class="table table-hover">
                    <thead>
                        <tr>
                            <?php
                            foreach ($headings as $key => $value) {
                                ?>
                                    <th >{{ $value }}</th>
                                    <?php
                                
                            }
                            ?>
                        </tr>
                    </thead>
                <tbody>
   
                </tbody>
            </table>
            </div>
  
        </div>
    </article>
</div>
<script type="text/javascript">
    var tab_config= {columns:[
        {data:"image_full"},
        {data:"rest_Name",name:"restaurant_info.rest_Name"},
        {data:"user_name",name:'user_FullName',searchable:false},
        {data:"status_html",name:"status",searchable:false},
        {data:"updatedAt"},
        {data:"action",searchable:false,sortable:false}],
        order:[[4,'desc']],
         data:function(d){
                    return $.extend({},d,{
                        "status":$('#status').val(),
                        "rest":$('#rest').val(),
                        "type":$('#type').val(),
                        
                        
                    })
                }
         

    };
    $(document).ready(function(){
    startDataTable("admin-gallery-table","<?=route('getgallerydata')?>",tab_config);
});
    function reloadTable(table_id){
   
        reloadDataTable(table_id);
    }
    </script>
@endsection