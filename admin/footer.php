<?php if($section_style==1){ ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php } ?>
<?php require_once 'debug.php';?>
</body>
</html>
<!-- esta parte se debe mejorar para hacer que bootstrap sea actualizable y unificado con el frontend -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
  <script src="../resources/js/tinymce/tinymce.min.js"></script>
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