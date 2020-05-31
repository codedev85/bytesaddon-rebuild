@include('partials.nav-2')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Orders</h1>
          {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Order Status</th>
                      <th>Amount</th>
                      <th>Quantity</th>
                      <th>Payment Method</th>
                      <th>Country</th>
                      <th>City</th>
                      <th>Zip Code</th>

                      <th>Shipping Address</th>
                      <th>Tracking Number</th>
                      <th>Client's Name</th>
                      <th>Cleint's Phone Number</th>
                      <th>Client's Email</th>

                      <th>Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                      @foreach($orders as $order)
                    <tr>
                       <td>{{ $order->product['name']}}</td>
                       <td>
                       @if($order->status == 0)
                        <span class="rej">Rejected</span>
                            @elseif($order->status == 1)
                        <span class="ord">Ordered</span>
                            @elseif($order->status == 2)
                        <span class="pro">Processing</span>
                            @elseif($order->status == 3)
                        <span class="in-progress">Shipped</span>
                        @else
                        <span class="delivered">Delivered</span>
                       @endif
                       
                       </td>
                        <td>{{ $order->amount}}</td>
                        <td>{{ $order->quantity}}</td> 
                        <td>{{Ucfirst($order->payment_method)}}</td>
                        <td>{{Ucfirst($order->country)}}</td>
                        <td>{{Ucfirst($order->city)}}</td>
                        <td>{{Ucfirst($order->zip)}}</td>
                        <td>{{ $order->shipping_address}}</td>
                        <td>{{ $order->tracking_number}}</td>
                        <td>{{$order->user['name']}}</td>
                        <td>{{ $order->phone_number}}</td>
                        <td>{{ $order->user_email}}</td>


                      <td>
                        <div class="dropdown no-arrow mb-4">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Action</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              
                           
                                <a class="dropdown-item" href="{{ url('/order/'.$order->id.'/processing') }}">Processing</a>
                                <a class="dropdown-item" href="{{ url('/order/'.$order->id.'/shipped') }}">Shipped</a>
                                <a class="dropdown-item" href="{{ url('/order/'.$order->id.'/delivered') }}">Delivered</a>
                                <hr>
                                <a class="dropdown-item" href="{{ url('/order/'.$order->id.'/cancel') }}">Cancel Order</a>
                          
                            </div>
                          </div>
                      </td>

                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
{{ $orders->links() }}
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ByesAddon 2020</span>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  {{-- <script src="../js/demo/datatables-demo.js"></script> --}}

</body>

</html>
