<?php function class_tableGenerator($array, $params, $formsParams, $formButtons)
{
    ?>
<?php if ($formsParams) {?>
<form action="<?php echo $formsParams['action']; ?>" method="<?php echo $formsParams['method']; ?>">
    <?php }?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $params['name'] ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
<?php
// define buttons for form
    if (0) {
        $formButtons_add = array(
            'Add New' => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => 'action', 'value' => 'add', 'action' => $params['addnew']),
        );
        echo class_formButtons($formButtons_add);
    }
    ?>
                    <table width="100%" class="table table-striped table-bordered table-hover display nowrap" id="dataTables-example">
                        <thead>
                            <tr>

                            <?php
//keys
    $results = null;
    if ($array) {
        $array_key = array_keys(current($array));
        foreach ($array_key as $key) {
            if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                $results .= '<th>' . $key . '</th>';
            }
        }
    }
    if ($params['showactions']) {
        $results .= '<th>Actions</th>';
    }
    echo $results;
    ?>
                            </tr>
                        </thead>
                        <tbody>
<?php
//values
    $results = null;
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
        //actions
        if ($params['showactions']) {
            $results .= '<td>';

            if ($params['showactions']) {
                //Update
                $results .= '<a href="?action=update&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="fa fa-edit fa-fw" style="font-size:15px;"></i></a>';
                //Delete

                if (!$row_array['childs']) {
                    $results .= '<a href="?action=delete&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="fa fa-trash-o fa-fw"" style="font-size:15px;"></i></a>';
                }
                if (isset($params['schedule'])) {
                    $results .= '<a href="?action=schedule&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="fa fa-calendar fa-fw" style="font-size:15px;"></i></a>';
                }

                //Show More
                if ($params['showmore']) {
                    if ($params['showmore'] > 'a') {
                        $showmore = $params['showmore'];
                    } else {
                        $showmore = 'add';
                    }
                    $results .= '<a href="?action=' . $showmore . '&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="fa fa-plus fa-fw"" style="font-size:15px;"></i></a>';
                }
            }
            $results .= '</td>';
            $results .= '</tr>';
        }
        //end actions

    } //end foreach
    echo $results;
    ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
<?php
if (isset($formButtons)) {
        echo class_formButtons($formButtons);
    }
    ?>
<?php if ($formsParams) {?>
</form>
    <?php }?>
    <!-- DataTables JavaScript -->
    <script src="<?php echo PATH_VENDOR; ?>datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo PATH_VENDOR; ?>datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo PATH_VENDOR; ?>datatables-responsive/dataTables.responsive.js"></script>


    <script>

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
                language: {
                    'lengthMenu': '<?php echo LANG_SHOWING; ?> _MENU_ <?php echo LANG_RECORDS; ?> <?php echo LANG_PERPAGE; ?>',
                    'zeroRecords': '<?php echo LANG_NOFOUND; ?>',
                    'info': '<?php echo LANG_SHOW; ?> <?php echo LANG_PAGE; ?> _PAGE_ <?php echo LANG_FROM; ?> _PAGES_ <?php echo LANG_TOTAL; ?> _MAX_ <?php echo LANG_RECORDS; ?>',
                    'infoEmpty': '<?php echo LANG_NORESULTS; ?>',
                    'infoFiltered': '(<?php echo LANG_FILTERED; ?> _MAX_ <?php echo LANG_RECORDS; ?>)',
                    sSearch: '<?php echo LANG_SEARCH; ?>',
                    paginate: {
                      next: '<?php echo LANG_NEXT; ?>',
                      previous: '<?php echo LANG_PREVIOUS; ?>'
                    }
                  },
            order: [ 0, 'asc' ]
        });

    });

    /// Select value
    $('.custom-select-info').hide();

    $(".data-table-responsive").html('<h2 class="pmd-card-title-text"><?php echo $params['name']; ?></h2>');
    $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</i></button>');

    </script>


<?php }?>

