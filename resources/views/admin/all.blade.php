@include('partials.nav-2')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Admin</h1>
          {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Administrator</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Last Seen</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  {{-- <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </tfoot> --}}
                  <tbody>
                      @foreach($admins as $admin)
                    <tr>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>{{ $admin->role['name'] }}</td>
                      @if($admin->last_seen != null)
                      <td class="text-success">{{ $admin->last_seen->diffforhumans() }}</td>
                      @else
                      <td class="text-danger">User has never logged in</td>
                      @endif
                      <td>{{ $admin->created_at->format('D m, Y') }}</td>
                      <td>
                        <div class="dropdown no-arrow mb-4">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Action</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="">Reset Password</a>
                                <a class="dropdown-item" href="{{ url('/admin/'.$admin->id.'/permission') }}">Chnage Permission</a>
                                {{-- <br> --}}
                                <hr>
                                @if($admin->banned_at !== null)
                                <a class="dropdown-item" href="{{ url('/userUserRevoke/'.$admin->id) }}">Give Acess</a>
                                @else
                                <a class="dropdown-item" href="{{ url('userBan/'.$admin->id) }}">Ban Aceess</a>
                                @endif
                              {{-- <a class="dropdown-item" href="">Prescribe</a> --}}
                              {{-- <a class="dropdown-item" href="#">Remove Patient</a> --}}
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
{{ $admins->links() }}
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
