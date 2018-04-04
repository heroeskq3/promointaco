<?php function class_tableGenerator3($array, $params, $formsParams, $formButtons, $ReportType)
{
    ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<?php
$results = null;
    $results .= '<table width="100%" class="table display nowrap" id="dataTables-example">';
    $results .= '<thead>';
    $results .= '<tr>';
//keys
    if ($array) {
        $array_key = array_keys(current($array));
        foreach ($array_key as $key) {
            if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                $results .= '<th>' . $key . '</th>';
            }
        }
    }
//TODO: hola
    $results .= '</tr>';
    $results .= '</thead>';
    $results .= '<tbody>';

//values
    foreach ($array as $row_array) {
        $results .= '<tr class="odd gradeX">';
        if ($params['checkbox']) {
            //$results .= '<td></td>';
        }

        //values
        foreach ($array_key as $key) {
            if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                $results .= '<td>' . $row_array[$key] . '</td>';
            }
        }

    } //end foreach

    if (!$ReportType) {
        //foot filter
        $results .= '<tfoot>';
        $results .= '<tr>';
        $results .= '<th>Name</th>';
        $results .= '<th>Position</th>';
        $results .= '<th>Office</th>';
        $results .= '<th>Age</th>';
        $results .= '<th>Start date</th>';
        $results .= '<th>Salary</th>';
        $results .= '</tr>';
        $results .= '</tfoot>';

    }
    $results .= '</tbody>';
    $results .= '</table>';
    echo $results;
    ?>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="<?php echo PATH_VENDOR; ?>datatables-responsive/dataTables.responsive.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
$(document).ready(function() {
    $('#dataTables-example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>
<?php }?>