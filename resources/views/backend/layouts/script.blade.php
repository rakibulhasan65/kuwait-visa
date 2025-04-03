 <!-- jQuery -->
 <script src="{{ asset('backend/assets') }}/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap -->
 <script src="{{ asset('backend/assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('backend/assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('backend/assets') }}/dist/js/adminlte.js"></script>

 <!-- PAGE PLUGINS -->
 <!-- jQuery Mapael -->
 <script src="{{ asset('backend/assets') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
 <script src="{{ asset('backend/assets') }}/plugins/raphael/raphael.min.js"></script>
 <script src="{{ asset('backend/assets') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
 <script src="{{ asset('backend/assets') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
 <!-- ChartJS -->
 <script src="{{ asset('backend/assets') }}/plugins/chart.js/Chart.min.js"></script>

 <!-- AdminLTE for demo purposes -->
 {{-- <script src="{{ asset('backend/assets') }}/dist/js/demo.js"></script> --}}
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('backend/assets') }}/dist/js/pages/dashboard2.js"></script>
 <!-- Include CKEditor CDN -->
 <script src="{{ asset('backend/assets') }}/ckeditor5-editor-classic/build/ckeditor.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

 <script type="text/javascript">
    @if(session('success'))
        toastr.success("{{ session('success') }}", "Success");
    @endif

    @if(session('info'))
        toastr.info("{{ session('info') }}", "Info");
    @endif

    @if(session('warning'))
        toastr.warning("{{ session('warning') }}", "Warning");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}", "Error");
    @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @stack('script')
