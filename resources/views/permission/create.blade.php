@extends('layouts.app')
@section('main')
<div class="container-xxl flex-grow-1 container-p-y ">
        
        <div class="card">
      
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row pb-0">
                        <div class="head-label text-center">
                            <h5 class="card-title mb-0">Permission Create</h5>
                        </div>
                        
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 mt-5">
                                   
                                </div>
                             </div>
                            <form action="{{ route('role.permissions.store', $roleId) }}" method="POST">
                            @csrf
                            <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 60px;" aria-label="Name: activate to sort column ascending">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 316px;" aria-label="Name: activate to sort column ascending">Menu Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 306px;" aria-label="Date: activate to sort column ascending">Add</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 306px;" aria-label="Date: activate to sort column ascending">Edit</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 306px;" aria-label="Date: activate to sort column ascending">View</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 306px;" aria-label="Date: activate to sort column ascending">Delete</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($menu as $value)
                                            <tr class="odd">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <label>{{ $value->name }}</label>
                                                </td>
                                                <td>
                        <input type="hidden" name="role_id" value="{{ $roleId }}">
                        <label class="switch">
                            <input type="checkbox" name="permissions[{{ $value->id }}][add]"
                                {{ isset($permissions[$value->id]['add']) && $permissions[$value->id]['add'] == '1' ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" name="permissions[{{ $value->id }}][edit]"
                                {{ isset($permissions[$value->id]['edit']) && $permissions[$value->id]['edit'] == '1' ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" name="permissions[{{ $value->id }}][view]"
                                {{ isset($permissions[$value->id]['view']) && $permissions[$value->id]['view'] == '1' ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" name="permissions[{{ $value->id }}][delete]"
                                {{ isset($permissions[$value->id]['delete']) && $permissions[$value->id]['delete'] == '1' ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                                            </tr>
                                        @endforeach


                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary text-white mt-5 mb-5" style="float:right">Submit</button>
                            </form>
                     </div>
                    </div>
                  </div>
              </div>
          
    </div>
 
@endsection
