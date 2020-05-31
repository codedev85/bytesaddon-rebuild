@include('partials.nav-2');
    <!-- Begin Page Content -->

      <!-- /.container-fluid -->
        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Page Heading -->

         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> {{ $findProduct->name }} - <small>{{ $findProduct->created_at->format('D m, Y') }}</small></h1>
            <a href="{{ url('/update/'.$findProduct->id.'/product') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Update Product</a>
          </div>


         <div class="row">

            <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                Product Information
                </div>
                <div class="row">
                    <div class="card-body  col-md-5">
                        <h6><b>Product Name: </b>{{ $findProduct->name }}</h6>
                        <h6><b>Amount: </b> &#8358; {{ number_format($findProduct->amount) }}</h6>
                        <h6><b>Category: </b>{{ $findProduct->category['name']}}</h6>
                    </div>
                </div>
            </div>

            </div>

            <div class="col-lg-6">

            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Product Description</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                    <h6>{{ Ucfirst($findProduct->description) }}</h6>
                    </div>
                    </div>
                </div>


            </div>

            </div>

            <div class="col-lg-12">


                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Images</h6>
                    </div>
                    <div class="card-body">
<img src="{{ url('storage/'.$findProduct->image1) }}" width="250" height="250"/>
&nbsp;&nbsp;&nbsp;
<img src="{{ url('storage/'.$findProduct->image2) }}" width="250" height="250"/>
&nbsp;&nbsp;&nbsp;
<img src="{{ url('storage/'.$findProduct->image3) }}" width="250" height="250"/>
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
