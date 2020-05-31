@include('partials.nav-2');


        <!-- Begin Page Content -->
    <div class="container-fluid">

         <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong>  Ensure you upload image dimension that is the same or above the dimension specified Width:555px Height:600px
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
            <h1 class="h3 mb-0 text-gray-800"> Add New Product </h1>
          </div>



            <div class="col-lg-12">

                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample5">
                        <div class="card-body">
                       <form action="{{ url('/update/'.$product->id.'/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label>Product Name</label>
                            <input type="text" name="product_name" class="form-control" value="{{ $product->name }}" placeholder="Product Name"/>
                           <span class="text-danger">{{ $errors->first('product_name') }} </span>
                        </div>
                        <br>
                        <div>
                            <label>Amount</label>
                           <input type="text" name="amount" class="form-control" value="{{ $product->amount }}" placeholder="Amount" />
                           <span class="text-danger">{{ $errors->first('amount') }}</span>
                        </div>
                           <br>
                           <div>
                            <label>Image 1</label>
                           <input type="file" name="image1" class="form-control" />
                           <span class="text-danger">{{ $errors->first('image1') }}</span>
                        </div>
                           <br>
                           <div>
                            <label>Image 2</label>
                           <input type="file" name="image2" class="form-control"/>
                           <span class="text-danger">{{ $errors->first('image2') }}</span>
                        </div>
                           <br>
                           <div>
                            <label>Image 3</label>
                           <input type="file" name="image3" class="form-control"  />
                           <span class="text-danger">{{ $errors->first('image3') }}</span>
                        </div>
                           <br>
                        <div>
                            <label>Select Roles / Permission Level </label>
                            <select class="form-control" name="category">
                                <option value="{{ $product->category['id'] }}"> {{ $product->category['name'] }}</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ Ucfirst($category->name) }}</option>
                                @endforeach

                            </select>
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        </div>
                       <br>
                        <div>
                            <label>Description</label>
                            <br>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            <textarea name="description" class="form-control" rows="10"> {{ $product->description }}</textarea>
                        </div>
                           <br>

                         <br>
                       <button class="btn btn-info">Update</button>
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
