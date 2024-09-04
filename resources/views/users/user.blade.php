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
                                
                            </div>
                            <table class="datatables-basic table border-top  no-footer dtr-column dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                     </div>
                    </div>
                  </div>
              </div>
            
    </div>
    </div>   
  
<script type="text/javascript">
$(document).ready(function() {
    $('.dataTable').DataTable({
    
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.list') }}", // Adjust to your route
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', email: 'email' },
        ]
    });
});
</script>

@endsection
