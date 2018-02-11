<?php function class_tableGenerator($array, $params){ ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $params['name'] ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                            <?php
                                //keys
                            $results = null;
                            if($array){
                                $array_key = array_keys(current($array));
                                    foreach ($array_key as $key) {
                                        if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                                            $results .= '<th>' . $key . '</th>';
                                        }
                                    }
                                }

                                $results .= '<th>Actions</th>';
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
        $results .= '<td>';

        if ($params['showactions']) {
            //Update
            $results .= '<a href="?action=update&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="fa fa-edit fa-fw" style="font-size:15px;"></i></a>';
            //Delete

            if(!$row_array['childs']){
                $results .= '<a href="?action=delete&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="fa fa-trash-o fa-fw"" style="font-size:15px;"></i></a>';
            }

            //Show More
            if($params['showmore']){
                $results .= '<a href="?action=add&Id=' . $row_array['index'] . '" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm"><i class="fa fa-plus fa-fw"" style="font-size:15px;"></i></a>';
            }
        }
        $results .= '</td>';
        $results .= '</tr>';
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
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
            columnDefs: [ {
                className: 'control',
                orderable: false,
                targets: 1
            } ],
            order: [ 0, 'asc' ]
        });
    });
    /// Select value
    $('.custom-select-info').hide();
    
    $(".data-table-responsive").html('<h2 class="pmd-card-title-text"><?php echo $params['name'];?></h2>');
    $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</i></button>');
      
    </script>

<?php } ?>
