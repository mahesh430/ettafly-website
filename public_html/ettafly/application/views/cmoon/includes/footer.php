  



<footer class="footer text-center"> <?php echo date('Y'); ?> &copy; <?php echo $site->tittle ?> </footer>




<script src="adminfiles/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="adminfiles/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<script src="adminfiles/js/jquery.slimscroll.js"></script>

<script src="adminfiles/js/waves.js"></script>

<script src="adminfiles/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="adminfiles/plugins/bower_components/counterup/jquery.counterup.min.js"></script>

<script src="adminfiles/plugins/bower_components/raphael/raphael-min.js"></script>
<!--<script src="adminfiles/plugins/bower_components/morrisjs/morris.js"></script>-->

<script src="adminfiles/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="adminfiles/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="adminfiles/js/dashboard1.js"></script>

<script src="adminfiles/plugins/bower_components/editor_ck/ckeditor.js"></script>

<!--Style Switcher -->
<script src="adminfiles/js/custom.min.js"></script>
<!--<script src="adminfiles/js/dashboard1.js"></script>-->
<!--<script src="adminfiles/js/myjs.js"></script>-->
<script src="adminfiles/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>

<script src="adminfiles/plugins/bower_components/jsgrid/db.js"></script>
<script type="text/javascript" src="adminfiles/plugins/bower_components/jsgrid/dist/jsgrid.min.js"></script>
<script src="adminfiles/js/jsgrid-init.js"></script>
        <!--<script src="adminfiles/js/date_picker/jquery.datetimepicker.full.js"></script>-->


<script src="adminfiles/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script src="adminfiles/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="adminfiles/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="adminfiles/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<script src="adminfiles/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript" src="adminfiles/plugins/bower_components/gallery/js/animated-masonry-gallery.js"></script>
<script type="text/javascript" src="adminfiles/plugins/bower_components/gallery/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="adminfiles/plugins/bower_components/fancybox/ekko-lightbox.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script type="text/javascript">
 jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
      });
      
//    $('#datepicker').datepicker();
//    $('#datepicker').on('changeDate', function () {
//        $('#my_hidden_input').val(
//                $('#datepicker').datepicker('getFormattedDate'));
//        autoclose: true,
//        todayHighlight: true
//    });

</script> 

<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Drag and drop a file here or click',
                replace: 'Delete-Drop-file or click to replace',
                remove: 'Remove',
                error: 'Sorry, the file is too large'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "columnDefs": [
                    {"visible": false, "targets": 2}
                ],
                "order": [[2, 'asc']],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({page: 'current'}).nodes();
                    var last = null;

                    api.column(2, {page: 'current'}).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                    );

                            last = group;
                        }
                    });
                }
            });

// Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
<!--Style Switcher -->
<script type="text/javascript">
    $(document).ready(function ($) {
        // delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function (event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function () {
                    if (window.console) {
                        return console.log('Checking our the events huh?');
                    }
                },
                onNavigate: function (direction, itemIndex) {
                    if (window.console) {
                        return console.log('Navigating ' + direction + '. Current item: ' + itemIndex);
                    }
                }
            });
        });

        //Programatically call
        $('#open-image').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-youtube').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });

        // navigateTo
        $(document).delegate('*[data-gallery="navigateTo"]', 'click', function (event) {
            event.preventDefault();

            var lb;
            return $(this).ekkoLightbox({
                onShown: function () {

                    lb = this;

                    $(lb.modal_content).on('click', '.modal-footer a', function (e) {

                        e.preventDefault();
                        lb.navigateTo(2);

                    });

                }
            });
        });


    });
</script>

</body>
</html>
