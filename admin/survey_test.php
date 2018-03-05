<?php
//Section Parameters
$section_tittle      = "Booking";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';
?>
<?php require_once 'header.php';?>
<script src="../resources/js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: "textarea",
  height: 300,
  plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],

  toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify |  formatselect ",
  toolbar2: "bullist numlist | outdent indent blockquote | link image media code",
  toolbar3: "table | hr  fullscreen",

  menubar: false,
  toolbar_items_size: 'small',
  
  init_instance_callback: function () {
    window.setTimeout(function() {
      $("#div").show();
     }, 1000);
  }
});

</script>

<textarea>Next, start a free trial!</textarea>
<?php require_once 'footer.php';
