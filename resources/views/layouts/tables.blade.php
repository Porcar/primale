@section('tables')

<!-- Datatables -->
   <script>

     $(document).ready(function() {



           // Setup - add a text input to each footer cell
           $('tfoot th').each( function () {
               var title = $(this).text();
                 $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
           } );






       var handleDataTableButtons = function() {

       var asc = $("table.asc").DataTable({
             dom: "lfBrtip",
             buttons: [

                           {
                             extend: 'excel',
                             exportOptions: {
                               columns: ':visible:not(.not-export-col)'
                             }},
                           {
                           extend: 'pdfHtml5',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( doc ) {

                               doc.content.splice( 0, 0, {
                                   margin: [ 0, 0, 0, 0 ],
                                   alignment: 'left',
                                   pageSize: 'LETTER',
                                   image: '',
                                   width: 150
                                 });
                           }
                         },

                       {
                           extend: 'print',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( win ) {
                           $(win.document.body)
                           .css( 'font-size', '10pt' )
                           .prepend(
                           '<img src="{{url(Auth::user()->image)}}" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); zoom: 150%; opacity:0.1"/>'
                           );

                           $(win.document.body).find( 'table' )
                           .addClass( 'compact' )
                           .css( 'font-size', 'inherit' );
                           }
                       }
                   ],

             responsive: true,
             "order": [[ 0, "asc" ]]

           });


           // Apply the search
           asc.columns().every( function () {
               var that = this;

               $( 'input', this.footer() ).on( 'keyup change', function () {
                   if ( that.search() !== this.value ) {
                       that
                           .search( this.value )
                           .draw();
                   }
               } );
           } );


           var asc1 = $("table.asc1").DataTable({
             dom: "lfBrtip",
             buttons: [

                           {
                             extend: 'excel',
                             exportOptions: {
                               columns: ':visible:not(.not-export-col)'
                             }},
                           {
                           extend: 'pdfHtml5',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( doc ) {

                               doc.content.splice( 0, 0, {
                                   margin: [ 0, 0, 0, 0 ],
                                   alignment: 'left',
                                   pageSize: 'LETTER',
                                   image: '',
                                   width: 150
                                 });
                           }
                         },

                       {
                           extend: 'print',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( win ) {
                           $(win.document.body)
                           .css( 'font-size', '10pt' )
                           .prepend(
                           '<img src="{{url(Auth::user()->image)}}" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); zoom: 150%; opacity:0.1"/>'
                           );

                           $(win.document.body).find( 'table' )
                           .addClass( 'compact' )
                           .css( 'font-size', 'inherit' );
                           }
                       }
                   ],

             responsive: true,
             "order": [[ 1, "asc" ]]

           });


           // Apply the search
           asc1.columns().every( function () {
               var that = this;

               $( 'input', this.footer() ).on( 'keyup change', function () {
                   if ( that.search() !== this.value ) {
                       that
                           .search( this.value )
                           .draw();
                   }
               } );
           } );

           var asc2 = $("table.asc2").DataTable({
             dom: "lfBrtip",
             buttons: [

                           {
                             extend: 'excel',
                             exportOptions: {
                               columns: ':visible:not(.not-export-col)'
                             }},
                           {
                           extend: 'pdfHtml5',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( doc ) {

                               doc.content.splice( 0, 0, {
                                   margin: [ 0, 0, 0, 0 ],
                                   alignment: 'left',
                                   pageSize: 'LETTER',
                                   image: '',
                                   width: 150
                                 });
                           }
                         },

                       {
                           extend: 'print',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( win ) {
                           $(win.document.body)
                           .css( 'font-size', '10pt' )
                           .prepend(
                           '<img src="{{url(Auth::user()->image)}}" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); zoom: 150%; opacity:0.1"/>'
                           );

                           $(win.document.body).find( 'table' )
                           .addClass( 'compact' )
                           .css( 'font-size', 'inherit' );
                           }
                       }
                   ],

             responsive: true,
             "order": [[ 2, "asc" ]]

           });


           // Apply the search
           asc2.columns().every( function () {
               var that = this;

               $( 'input', this.footer() ).on( 'keyup change', function () {
                   if ( that.search() !== this.value ) {
                       that
                           .search( this.value )
                           .draw();
                   }
               } );
           } );

           var desc = $("table.desc").DataTable({
             dom: "lfBrtip",
             buttons: [

                           {
                             extend: 'excel',
                             exportOptions: {
                               columns: ':visible:not(.not-export-col)'
                             }},
                           {
                           extend: 'pdfHtml5',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( doc ) {

                               doc.content.splice( 0, 0, {
                                   margin: [ 0, 0, 0, 0 ],
                                   alignment: 'left',
                                   pageSize: 'LETTER',
                                   image: '',
                                   width: 150
                                 });
                           }
                         },

                       {
                           extend: 'print',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( win ) {
                           $(win.document.body)
                           .css( 'font-size', '10pt' )
                           .prepend(
                           '<img src="{{url(Auth::user()->image)}}" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); zoom: 150%; opacity:0.1"/>'
                           );

                           $(win.document.body).find( 'table' )
                           .addClass( 'compact' )
                           .css( 'font-size', 'inherit' );
                           }
                       }
                   ],

             responsive: true,
             "order": [[ 0, "desc" ]]

           });

           // Apply the search
           desc.columns().every( function () {
               var that = this;

               $( 'input', this.footer() ).on( 'keyup change', function () {
                   if ( that.search() !== this.value ) {
                       that
                           .search( this.value )
                           .draw();
                   }
               } );
           } );

           var desc1 = $("table.desc1").DataTable({
             dom: "lfBrtip",
             buttons: [

                           {
                             extend: 'excel',
                             exportOptions: {
                               columns: ':visible:not(.not-export-col)'
                             }},
                           {
                           extend: 'pdfHtml5',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( doc ) {

                               doc.content.splice( 0, 0, {
                                   margin: [ 0, 0, 0, 0 ],
                                   alignment: 'left',
                                   pageSize: 'LETTER',
                                   image: '',
                                   width: 150
                                 });
                           }
                         },

                       {
                           extend: 'print',
                           exportOptions: {
                           columns: ':visible:not(.not-export-col)'
                           },
                           customize: function ( win ) {
                           $(win.document.body)
                           .css( 'font-size', '10pt' )
                           .prepend(
                           '<img src="{{url(Auth::user()->image)}}" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); zoom: 150%; opacity:0.1"/>'
                           );

                           $(win.document.body).find( 'table' )
                           .addClass( 'compact' )
                           .css( 'font-size', 'inherit' );
                           }
                       }
                   ],

             responsive: true,
             "order": [[ 1, "desc" ]]

           });

           // Apply the search
           desc1.columns().every( function () {
               var that = this;

               $( 'input', this.footer() ).on( 'keyup change', function () {
                   if ( that.search() !== this.value ) {
                       that
                           .search( this.value )
                           .draw();
                   }
               } );
           } );

       };



       TableManageButtons = function() {
         "use strict";
         return {
           init: function() {
             handleDataTableButtons();
           }
         };
       }();

       $('#datatable').dataTable();

       $('#datatable-keytable').DataTable({
         keys: true
       });

       $('#datatable-responsive').DataTable();

       $('#datatable-scroller').DataTable({
         ajax: "js/datatables/json/scroller-demo.json",
         deferRender: true,
         scrollY: 380,
         scrollCollapse: true,
         scroller: true
       });


       var $datatable = $('#datatable-checkbox');

       $datatable.dataTable({
         'order': [[ 1, 'asc' ]],
         'columnDefs': [
           { orderable: false, targets: [0] }
         ]
       });
       $datatable.on('draw.dt', function() {
         $('input').iCheck({
           checkboxClass: 'icheckbox_flat-green'
         });
       });

       TableManageButtons.init();
     });
   </script>
 <!-- /Datatables -->

@endsection
