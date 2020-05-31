@include('partials.nav-2');


        <!-- Begin Page Content -->
    <div class="container-fluid">


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
            <h1 class="h3 mb-0 text-gray-800"> Register Adminstrator </h1>
          </div>



            <div class="col-lg-12">

                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Register Admin</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample5">
                        <div class="card-body">
                       <form action="{{ url('/admin/'.$userPermission->id.'/store') }}" method="POST">
                        @csrf
                        <label>Register</label>
                        <div>
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $userPermission->name }}" placeholder="Full Name" disabled/>
                           <span class="text-danger">{{ $errors->first('name') }} </span>
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                           <input type="email" name="email" class="form-control" value="{{ $userPermission->email }}"placeholder="Email"  disabled/>
                           <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                           <br>
                        <div>
                            <label>Select Roles / Permission Level </label>
                            <select class="form-control" name="role">
                                <option value="{{ $userPermission->role['id'] }}">{{ $userPermission->role['name'] }}</option>
                                <option value="{{ $roles[0]->id }}">{{ $roles[0]->name }}</option>
                                <option value="{{ $roles[1]->id }}">{{ $roles[1]->name }}</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        </div>

                         <br>
                       <button class="btn btn-info">Register</button>
                       </form>
                        </div>
                        </div>
                    </div>
                </div>
             </div>
          </div>

        </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bytesaddon 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>


            <a class="dropdown-item"  href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('Logout') }}
            </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
    {{-- <script>
$(document).ready(function(){

 $('#search').keyup(function(){

        var query = $(this).val();

        if(query != '')
        {
         var _token = $('input[name="_token"]').val();

         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){

           $('#searchList').fadeIn();
                    $('#searchList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){
        $('#search').val($(this).text());
        $('#searchList').fadeOut();
    });

});
</script> --}}

</body>

</html>
