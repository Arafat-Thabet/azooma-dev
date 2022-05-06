@extends('admin.index')
@section('content')
    
<div class="overflow">
    <div class="col-md-11 zero-padding">
        <ol class="breadcrumb">
            <li><a href="<?= route('adminhome'); ?>">Dashboard</a></li> 
            <li><a href="<?php echo URL::to('hungryn137/' . $action); ?>"> 
                    <?php
                    if (isset($rest)) {
                        echo stripslashes($rest->rest_Name);
                    }
                    ?> Polls </a></li>
            <li class="active">{{ $title }}</li>
        </ol>
    </div>
    <div class="col-md-1">
        <button type="button" class="btn pull-right" data-bs-toggle="collapse" data-bs-target="#filter-main">  <i data-feather="filter"></i> </button>
    </div>
</div>


<div id="filter-main" class="collapse well-white">
    <legend>   Filter Results </legend>  
    <form name="admin-form" id="jqValidate" class="form-horizontal" role="form" action="{{ route('adminpolls') }}" method="get" >
        <div class="form-group row">
            <label for="name" class="col-md-2 control-label">Name</label>
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" >
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-lg-2 col-md-6">
                <button type="submit" class="btn btn-primary-gradien">Filter</button>          
            </div>
        </div>
    </form>
</div>


<div class="well-white">
    <article>    
        <fieldset>
            <legend>
                {{ $pagetitle }}
                <a href="{{ route('adminpolloptionform').'?poll='.$pollID; }}" id="add-new-menu" class="btn btn-info btn-sm pull-right">Add new </a>
            </legend>        
        </fieldset>

        <div class="panel">
            <div class="panel-heading">
                <?php if (count($options) > 0) { ?> Results {{ $options->getFrom() }} to {{ $options->getTo() }} out of <span class="label label-info">{{ $options->getTotal() }}</span> <?php
                } else {
                    echo 'No Result Found';
                }
                ?>        
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <?php
                        foreach ($headings as $key => $option) {
                            if ($option == 'Location') {
                                ?>
                                <th class="col-md-2">{{ $option }}</th>
                                <?php
                            } else {
                                ?>
                                <th class="col-md-1">{{ $option }}</th>
                                <?php
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($options) > 0) {
                        $countries = Config::get('settings.countries');
                        foreach ($options as $option) {
                            ?>
                            <tr <?php
                            if (isset($option->status)) {
                                if ($option->status == 0) {
                                    echo 'class=" line-through"';
                                }
                            }
                            ?>>
                                <td>
                                    <?php echo $option->field; ?>
                                </td>
                                <td>
                                    <?php echo $option->votes; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($option->createdAt == "") {
                                        echo date('d/m/Y', strtotime($option->createdAt));
                                    } else {
                                        echo date('d/m/Y', strtotime($option->updatedAt));
                                    }
                                    ?>
                                </td>
                                <td class="sufrati-action">
                                    <a class="btn btn-xs btn-info mytooltip" href="{{ route('adminpolloptionform/', $option->id).'?poll='.$pollID; }}" title="Edit Content">
                                        <i data-feather="edit"></i> 
                                    </a>
                                    <a class="btn btn-xs btn-info mytooltip" href="<?php echo route('adminpolloptionstatus/', $option->id) . '?poll=' . $pollID; ?>" rel="tooltip" title="Poll">
                                        <?php
                                        if ($option->status == 1) {
                                            ?>
                                            <i data-feather="minus-circle"></i> 
                                            <?php
                                        } else {
                                            ?>
                                            <i data-feather="plus-circle"></i> 
                                        <?php } ?>
                                    </a>
                                    <a onclick="return confirm('Do You Want to Delete?')" class="btn btn-xs btn-danger mytooltip" href="{{ route('adminpolloptiondelete/', $option->id).'?poll='.$pollID; }}" title="Delete">
                                        <i data-feather="trash-2"></i> 
                                    </a>

                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="100%">No record found.</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (count($options) > 0) {
                $get = array();
                if (count($_GET) > 0) {
                    foreach ($_GET as $key => $val) {
                        if ($key == "page") {
                            continue;
                        } else {
                            $get[$key] = $val;
                        }
                    }
                }
                if (count($get) > 0) {
                    echo $options->appends($get)->links();
                } else {
                    echo $options->links();
                }
            }
            ?>
        </div>
    </article>
</div>

@endsection