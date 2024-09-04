@include('layouts.navigation')
<link rel="stylesheet" href="{{asset('assets/css/custom_style.css')}}" />
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">


        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row pb-0">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0">Role List</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-6 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                <div class="btn-group">
                                                 <button class="btn buttons-collection dropdown-toggle btn-label-primary me-4" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-export bx-sm me-sm-2"></i> <span class="d-none d-sm-inline-block">Export</span></span></button></div>
                                                  <a href="{{url('create/role')}}" class="btn btn-secondary create-new btn-primary text-white" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus bx-sm me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                        <option value="7">7</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-n6 mt-md-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label></div>
                        </div>
                    </div>
                    <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1391px;">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 60px;" aria-label="Name: activate to sort column ascending">No</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 316px;" aria-label="Name: activate to sort column ascending">Role Name</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-label="Email: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 106px;" aria-label="Date: activate to sort column ascending">Action</th>
                             </tr>
                        </thead>
                        <tbody>

                            @foreach($roles as $value) 
                             <?php $i=1; ?>
                            <tr class="odd">
                                 <td>{{$i}}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-danger">GG</span></div>
                                        </div>
                                        <div class="d-flex flex-column"><span class="emp_name text-truncate">{{$value->name}}</span></div>
                                    </div>
                                </td>
                                <td></td>
                                
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                       
                        </tbody>
                    </table>
                   
                   
                </div>
            </div>
        </div>



    </div>

</div>
@include('layouts.footer')