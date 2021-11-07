<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{url('dashboard')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{url('dashboard')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{url('dashboard')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('dashboard')}}/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('dashboard')}}/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{url('dashboard')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{url('dashboard')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{url('dashboard')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{url('dashboard')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{url('dashboard')}}/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{url('dashboard')}}/dist/js/pages/dashboard2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.4/jstree.min.js"></script>
<script src="{{url('dashboard')}}/plugins/GoogleMap/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJ67H5QBLVTdO2pnmEmC2THDx95rWyC1g&libraries=places&callback=initAutocomplete" async defer></script>
<script src="{{url('dashboard')}}/dist/js/pages/dashboard2.js"></script>


<!-- DataTables -->
<script src="{{url('dashboard')}}/dist/js/datatable/jquery.dataTables.min.js"></script>
<script src="{{url('dashboard')}}/dist/js/datatable/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/socket.io-client@2.1.1/dist/socket.io.js"></script>

<script>
    $(function () {
        $('#example1').DataTable()

        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })


</script>
<script>
    window.Echo = new Echo({
        broadcaster: 'socket.io',

        host: '{{url('/').':6001'}}',
    });
    Echo.private(`App.User.{{Auth::id()}}`) // private channel
        .listen('NewMessage', (e) => {
            console.log(e)

        });


</script>
