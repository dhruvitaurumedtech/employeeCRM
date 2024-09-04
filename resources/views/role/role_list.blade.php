@extends('layouts.app')
@section('main')

    <div class="container-xxl flex-grow-1 container-p-y ">


        <!-- DataTable with Buttons -->
        <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div id="alert-container">
                        <!-- Success and error messages will be injected here -->
                    </div>
                </div>
            </div>
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
                                    <a href="{{url('create/role')}}" class="btn btn-secondary create-new btn-primary text-white" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus bx-sm me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                   
                                </div>
                                <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end mt-n6 mt-md-0">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0"></label></div>
                                </div>
                            </div>
                            <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 60px;" aria-label="Name: activate to sort column ascending">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 316px;" aria-label="Name: activate to sort column ascending">Role Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-label="Email: activate to sort column ascending">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 106px;" aria-label="Date: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($roles as $value)
                                    <tr class="odd">
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="d-flex flex-column"><span class="emp_name text-truncate">{{$value->name}}</span></div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="hidden" name="status" value="0">
                                            <label class="switch">
                                                <input type="checkbox" class="status-toggle" name="status" data-id="{{ $value->id }}" value="1" {{ $value->status == 1 ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="{{url('role/edit/'.$value->id)}}" class="btn btn-primary text-white" role="tab">
                                                Edit
                                            </a>
                                            <a href="{{url('role/delete/'.$value->id)}}" class="btn btn-danger text-white">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach

                                </tbody>
                            </table>
                     </div>
                    </div>
                  </div>
              </div>
            <div class="col-3 offset-9 mt-5">
                    <div class="dataTables_paginate paging_simple_numbers">
                        {{ $roles->links('pagination::bootstrap-4') }}  
                    </div>
                </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
        $(document).ready(function() {
            $('.status-toggle').change(function() {
                let status = $(this).is(':checked') ? 1 : 0;
                let id = $(this).data('id');
            
                $.ajax({
                    url: '/role/update-status/' + id,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function(response) {
                        $('#alert-container').html(`
                            <div class="alert alert-success">
                                ${response.message}
                            </div>
                        `);
                        setTimeout(function() {
                            $('.alert.auto-close').addClass('fade-out');
                            setTimeout(function() {
                                $('.alert.auto-close').remove();
                            }, 500); 
                        }, 5000); 
                    },

                    error: function(xhr) {
                        $('#alert-container').html(`
                            <div class="alert alert-danger">
                                An error occurred. Please try again.
                            </div>
                        `);
                        setTimeout(function() {
                            $('.alert.auto-close').addClass('fade-out');
                            setTimeout(function() {
                                $('.alert.auto-close').remove();
                            }, 500); 
                        }, 5000);                     }
                });
                $('#alert-container').on('click', '.close', function() {
                    $(this).closest('.alert').addClass('fade-out');
                    setTimeout(function() {
                        $('.alert.fade-out').remove();
                    }, 500); 
                });
            });
        });
    </script>
    @include('layouts.footer')
