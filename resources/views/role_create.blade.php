@include('layouts.navigation')
<link rel="stylesheet" href="{{asset('assets/css/custom_style.css')}}" />
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-6">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0"><b>Role create</b></h5>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{url('store/role')}}">
                        @csrf
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Role Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="Role name" />
                          </div>
                        </div>
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                          <div class="col-sm-10">
                          <input type="hidden" name="status" value="0">
                            <label class="switch">
                                <!-- Checkbox input to pass a value of '1' when checked -->
                                <input type="checkbox" name="status" value="1">
                                <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                        
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
               
            </div>
        
           
          </div>
          @include('layouts.footer')