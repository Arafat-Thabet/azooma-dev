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
        <button type="button" class="btn pull-right" data-bs-toggle="collapse" data-bs-target="#filter-main"> <i data-feather="filter"></i> </button>
    </div>
</div>


<div id="filter-main" class="collapse well-white">
    <legend> Filter Results </legend>

    <div class="form-group row">
        <label for="statu" class="col-md-2 control-label">Restaurant Status</label>
        <div class="col-md-6">
            <select name="status" id="status" class="form-control">
                <option value="">please select Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-md-2 control-label">Restaurant City</label>
        <div class="col-md-6">
            <?php
            $cities = MGeneral::getAllCities($country);
            echo MGeneral::generate_list($cities, "city_ID", "city_Name", 'city', 'city');
            ?>
        </div>
    </div>

    <div class="form-group row">
        <label for="cuisine" class="col-md-2 control-label">Cuisine</label>
        <div class="col-md-6">
            <?php
            $cuisines = MGeneral::getAllCuisine(1);
            echo MGeneral::generate_list($cuisines, "cuisine_ID", "cuisine_Name", 'cuisine', 'cuisine');
            ?>
        </div>
    </div>

    <div class="form-group row">
        <label for="best" class="col-md-2 control-label">Best For</label>
        <div class="col-md-6">
            <?php
            $bestfor = MGeneral::getAllBestFor(1);
            echo MGeneral::generate_list($bestfor, "bestfor_ID", "bestfor_Name", 'best', 'best');
            ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="membership" class="col-md-2 control-label">Membership</label>
        <div class="col-md-6">
            <?php
            $bestfor = MGeneral::getAllSubscriptionTypes($country);
            echo MGeneral::generate_list($bestfor, "id", "accountName", 'membership', 'membership');
            ?>
        </div>
    </div>


    <div class="form-group row">
        <div class="offset-lg-2 col-md-6">
            <button type="button" onclick="reloadTable('invoice-table');" class="btn btn-primary-gradien">Filter</button>
        </div>
    </div>

</div>



<div class="well-white">
    <article>
        <fieldset>
            <legend>{{ $pagetitle }}</legend>
        </fieldset>

        <div class="panel">
            <div class="table-responsive">
                <table id="invoice-table" class="table table-striped">
                    <thead>
                        <tr>
                            <?php
                            foreach ($headings as $key => $value) {
                                if ($value == 'Restaurant Name') {
                            ?>
                                    <th style="width:13%;" class="col-md-1">{{ $value }}</th>
                                <?php
                                } else {
                                ?>
                                    <th class="col-md-1">{{ $value }}</th>
                            <?php
                                }
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
    var tab_config = {
        columns: [{
                data: "rest_Name"
            },
            {
                data: "referenceNo",
                name: "booking_management.referenceNo"
            },
            {
                data: "rest_Subscription"
            },

            {
                data: "member_date"
            },

            {
                data: "status_html",
                name: "status",
                searchable: false
            },
            {
                data: "lastUpdatedOn"
            },
            {
                data: "member_duration"
            },

            {
                data: "action",
                searchable: false,
                sortable: false
            }
        ],
        order: [
            [3, 'desc']
        ],
        data: function(d) {
            return $.extend({}, d, {
                "status": $('#status').val(),
                "city": $('#city').val(),
                "cuisine": $('#cuisine').val(),
                "best": $('#best').val(),
                "membership": $('#membership').val(),
                "is_paid": "0",

            })
        }



    };
    $(document).ready(function() {
        startDataTable("invoice-table", "<?= route('admininvoicedata') ?>", tab_config);
    });

    function reloadTable(table_id) {

        reloadDataTable(table_id);
    }
</script>
@endsection