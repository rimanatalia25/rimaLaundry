 <!-- footer content -->
 <footer>
    <div class="pull-right">
      <b> rimaLaundry -  by IG: <a href="https://instagram/rimantlia.com">@rimantlia</a> </b>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{{ asset('assets') }}/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('assets') }}/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{ asset('assets') }}/vendors/nprogress/nprogress.js"></script>
 <!-- jQuery -->
 <script src="{{ asset('assets') }}/vendors/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap -->
<script src="{{ asset('assets') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
 <!-- FastClick -->
 <script src="{{ asset('assets') }}/vendors/fastclick/lib/fastclick.js"></script>
 <!-- NProgress -->
 <script src="{{ asset('assets') }}/vendors/nprogress/nprogress.js"></script>
 <!-- bootstrap-progressbar -->
 <script src="{{ asset('assets') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
 <!-- iCheck -->
 <script src="{{ asset('assets') }}/vendors/iCheck/icheck.min.js"></script>
 <!-- PNotify -->
 <script src="{{ asset('assets') }}/vendors/pnotify/dist/pnotify.js"></script>
 <script src="{{ asset('assets') }}/vendors/pnotify/dist/pnotify.buttons.js"></script>
 <script src="{{ asset('assets') }}/vendors/pnotify/dist/pnotify.nonblock.js"></script>

 <!-- Custom Theme Scripts -->
 <script src="{{ asset('assets') }}/build/js/custom.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('assets') }}/build/js/custom.min.js"></script>
{{-- data table --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#tableOutlet').DataTable({
      "aLengthMenu": [[10,15,20], [10, 15, 20]]
    });

    $('#tablePaket').DataTable({
      "aLengthMenu": [[10,15,20], [10, 15, 20]]
    });

    $('#tableMember').DataTable({
      "aLengthMenu": [[10,15,20], [10, 15, 20]]
    });

    $('#tableBarang').DataTable({
      "aLengthMenu": [[10,15,20], [10, 15, 20]]
    });

    $('#tableInventaris').DataTable({
      "aLengthMenu": [[10,15,20], [10, 15, 20]]
    });
} );
</script>

@stack('scripts')
</body>
</html>
