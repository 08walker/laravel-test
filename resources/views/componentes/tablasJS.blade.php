{{-- tablasJS.blade.php --}}
<!-- DataTables  & Plugins -->
<script src="{{asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/jszip/jszip.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>    
<script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>    

<script type="text/javascript">
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "buttons": ["excel", "pdf", "print", "colvis"],
      "order": [[0,'desc']],
      "language": {
        "search": "Buscar",
        "lengthMenu": "Ver _MENU_ entradas",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "sInfo": "Mostrando página _PAGE_ de _PAGES_",
        "sInfoEmpty": "Mostrando página _PAGE_ de _PAGES_",
        "sZeroRecords": "No hay resultados",
        "emptyTable": "No hay datos para mostrar",
        "paginate": {
            "last": "Última página",
            "first": "Primera página",
            "next": "Siguiente",
            "previous": "Anterior",
          }
      },
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

</script>