
    <?php if($sectionParams['style']==1){ ?>

        </div>

        <!-- /#page-wrapper -->

    </div>
    
    <!-- /#wrapper -->
<?php } ?>
<?php require_once PATH_VIEWS.'/debug/debug.php';?>
<?php if($sectionParams['style']){ ?>
<script src="<?php echo PATH_ASSETS;?>bootstrap/js/bootstrap-select.min.js"></script>

<?php if(true){ ?>
<script src="<?php echo PATH_ASSETS;?>js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: "textarea",
  height: 350,
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],

  toolbar1: "bold italic | alignleft aligncenter alignright alignjustify | link image media",
  toolbar2: "formatselect | bullist numlist | outdent indent hr blockquote code ",
  //toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify ",
  //toolbar2: "formatselect bullist numlist | outdent indent blockquote | link image media code",
  //toolbar3: "table | hr  fullscreen",

  menubar: false,
  toolbar_items_size: 'small',
  
  init_instance_callback: function () {
    window.setTimeout(function() {
      $("#div").show();
     }, 1000);
  }
});

</script>
<?php } //style ?>
<?php } ?>
</body>
</html>