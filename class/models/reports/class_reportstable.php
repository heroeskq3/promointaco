<?php
function class_reportsTable($array, $params)
{
    $limit = 10;
    if (isset($_GET['limit'])) {
        $limit = $_GET['limit'];
    }
    $resume = null;
    if (isset($_GET['resume'])) {
        $resume = $_GET['resume'];
    }

    $results = null;

    $results .= '<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">';
    $results .= '<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css" rel="stylesheet">';

    if ($array) {
        $results .= '<div class="table-responsive">';
        $results .= '<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">';
        $results .= '<thead>';
        $results .= '<tr>';

        if ($array) {
            $array_key = array_keys(current($array));
            foreach ($array_key as $key) {
                if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                    $results .= '<th>' . $key . '</th>';
                }
            }
        }

        $results .= '</tr>';
        $results .= '</thead>';
        $results .= '<tbody>';

        foreach ($array as $row_array) {

            //TODO: estos if hay que cambiarlos
            if (0) {
                $results .= '<tr class="danger">';
            }

            if (0) {
                $results .= '<tr class="warning">';
            }
            if (1) {
                $results .= '<tr>';
            }

            //values
            foreach ($array_key as $key) {
                if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {

                    if ($key == 'Porcentaje') {

                        $row_percentage = $row_array['Porcentaje'];

                        switch ($row_percentage) {
                            case ($row_percentage > 0 && $row_percentage <= 10):
                                $class_col = null;
                                break;
                            case ($row_percentage > 10 && $row_percentage <= 20):
                                $class_col = 'col-xs-3';
                                break;
                            case ($row_percentage > 20 && $row_percentage <= 30):
                                $class_col = 'col-xs-4';
                                break;
                            case ($row_percentage > 30 && $row_percentage <= 40):
                                $class_col = 'col-xs-5';
                                break;
                            case ($row_percentage > 40 && $row_percentage <= 50):
                                $class_col = 'col-xs-6';
                                break;
                            case ($row_percentage > 50 && $row_percentage <= 60):
                                $class_col = 'col-xs-7';
                                break;
                            case ($row_percentage > 60 && $row_percentage <= 70):
                                $class_col = 'col-xs-8';
                                break;
                            case ($row_percentage > 70 && $row_percentage <= 80):
                                $class_col = 'col-xs-9';
                                break;
                            case ($row_percentage > 80 && $row_percentage <= 90):
                                $class_col = 'col-xs-10';
                                break;
                            case ($row_percentage > 90 && $row_percentage <= 100):
                                $class_col = 'col-xs-12';
                                break;
                        }

                        $results .= '<td>';

                        $results .= '
                    <div class="progress progress-striped active style="height: 20px;"">
                      <div class="progress-bar progress-bar-success" role="progressbar" style="width: ' . $row_percentage . ';" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">' . $row_percentage . '</div>
                    </div>
                    ';
                        $results .= '</td>';
                    } else {
                        $results .= '<td>';
                        if ($resume) {
                            $results .= '<a href="?' . $_SERVER['QUERY_STRING'] . '&resume=&' . $resume . '=' . $row_array['Descripción'] . '">';
                            $results .= $row_array[$key];
                            $results .= '</a>';
                        } else {
                            $results .= $row_array[$key];
                        }
                        $results .= '</td>';

                    }
                }
            }
            $results .= '</tr>';
        } //end key foreach

        $results .= '</tbody>';
        $results .= '</table>';
        $results .= '</div>';
    } else {
        $results .= 'No hay resultados para esta busqueda';
    }

    $results .= '<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>';
    $results .= '<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>';
    $results .= '<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>';
    $results .= '<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>';
    $results .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>';
    $results .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>';
    $results .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>';
    $results .= '<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>';
    $results .= '<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>';
    $results .= '<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>';

    $results .= "<script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: {
                    buttons: true
                },
                lengthChange: false,
                searching: true,
                buttons: [
                    { extend: 'colvis', text: 'Mostrar' },
                    { extend: 'excel', text: 'Excel' },
                    { extend: 'pdf', text: 'PDF' },
                    { extend: 'print', text: 'Imprimir' }

                ],
                language: {
                    'lengthMenu': '" . LANG_SHOWING . " _MENU_ " . LANG_RECORDS . " " . LANG_PERPAGE . "',
                    'zeroRecords': '" . LANG_NOFOUND . "',
                    'info': '" . LANG_SHOW . " " . LANG_PAGE . " _PAGE_ " . LANG_FROM . " _PAGES_ " . LANG_TOTAL . " _MAX_ " . LANG_RECORDS . "',
                    'infoEmpty': '" . LANG_NORESULTS . "',
                    'infoFiltered': '(" . LANG_FILTERED . " _MAX_ " . LANG_RECORDS . ")',
                    sSearch: '" . LANG_SEARCH . "',
                    paginate: {
                      next: '" . LANG_NEXT . "',
                      previous: '" . LANG_PREVIOUS . "'
                    }
                  },";

    if ($params['hidecols'] && !$resume) {
        $results .= "'columnDefs' : [
                    { 'visible': false, 'targets': [" . $params['hidecols'] . "] }
                ],";
    }

    $results .= "pageLength: " . $limit . "

            } );

            table.buttons().container()
                .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
        } );
    </script>";

    return $results;
}
