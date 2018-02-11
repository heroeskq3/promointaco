<?php
function class_showMore($array){
    //SHOW MORE
    $results = '<script type="text/javascript">';
    $results .= '$(document).ready(function () {';
    foreach ($array as $row) {
        $results .= '$(".direct-expand-' . $row['index'] . '").click(function(){
        $(".direct-child-table-' . $row['index'] . '").slideToggle(300);
        $(this).toggleClass( "child-table-collapse" );
    });';
    }
    $results .= '});';
    $results .= '</script>';

    return $results;
}
 ?>
<?php function class_tableScripts($array,$params){ ?>
<?php echo class_showMore($array); ?>
<?php
//determine total rows for keys array
$array_key = array_keys(current($array));
$array_results = array();
foreach ($array_key as $key) {
    if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
        $array_results[] = $key;
    }
}
if(count($array_results)){
    $array_TotalRows = count($array_results);
}else{
    $array_TotalRows = 0;
}
?>
<!-- Datatable js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Datatable Bootstrap -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!-- Datatable responsive js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>

<!-- Datatable select js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>

<!-- Propeller Data table js-->
<script>
//Propeller Customised Javascript code 
$(document).ready(function() {
    $('#example-checkbox').DataTable({
        responsive: false,
        <?php if($params['checkbox']){ ?>
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:0,
        } ],
        <?php } ?>

        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        order: [ 0, 'asc' ],
        bFilter: true,
        bLengthChange: true,
        pagingType: "simple",
        "paging": true,
        "searching": true,
        "language": {
            "info": " _START_ - _END_ of _TOTAL_ ",
            "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
            "sSearch": "",
            "sSearchPlaceholder": "Search",
            "paginate": {
                "sNext": " ",
                "sPrevious": " "
            },
        },
        dom:
            "<'pmd-card-title'<'data-table-title'><'search-paper pmd-textfield'f>>" +
            "<'custom-select-info'<'custom-select-item'><'custom-select-action'>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
    });
    
    /// Select value
    $('.custom-select-info').hide();
    
    $('#example-checkbox tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
            $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
            if ($(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text() != null){
                $(this).closest('.dataTables_wrapper').find('.custom-select-info').show();
                //show delet button
            } else{
                $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
            }
        }
        else {
            var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
            $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
        }
        if($('#example-checkbox').find('.selected').length == 0){
            $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
        }
    } );
    $("div.data-table-title").html('<h2 class="pmd-card-title-text"><?php echo $params['name'];?></h2>');
    $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</button>');
    
} );
</script>

<!-- Responsive Data table js-->
<script>
//Propeller  Customised Javascript code 
$(document).ready(function() {
    var exampleDatatable = $('#example').DataTable({
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
            targets:   <?php echo $array_TotalRows-1; ?>
        } ],
        order: [ 0, 'asc' ],
        bFilter: true,
        bLengthChange: true,
        pagingType: "full_numbers",
        "paging": true,
        "searching": true,
        "language": {
            "info": " _START_ - _END_ of _TOTAL_ ",
            "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
            "sSearch": "",
            "sSearchPlaceholder": "Search",
            "paginate": {
                "sNext": " ",
                "sPrevious": " "
            },
        },
        dom:
            "<'pmd-card-title'<'data-table-responsive pull-left'><'search-paper pmd-textfield'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
    });
    
    /// Select value
    $('.custom-select-info').hide();
    
    $(".data-table-responsive").html('<h2 class="pmd-card-title-text"><?php echo $params['name'];?></h2>');
    $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</i></button>');
        
} );
</script>
<?php } ?>