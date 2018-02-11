<?php function class_formScripts(){ ?>
<!-- Scripts Starts -->
<script src="components/file-upload/js/upload-image.js"></script>

<!-- Select2 js-->
<script type="text/javascript" src="components/select2/js/select2.full.js"></script>

<!-- Propeller Select2 -->
<script type="text/javascript">
    $(document).ready(function() {
        <!-- Simple Selectbox -->
        $(".select-simple").select2({
            theme: "bootstrap",
            minimumResultsForSearch: Infinity,
        });
        <!-- Selectbox with search -->
        $(".select-with-search").select2({
            theme: "bootstrap"
        });
        <!-- Select Multiple Tags -->
        $(".select-tags").select2({
            tags: false,
            theme: "bootstrap",
        });
        <!-- Select & Add Multiple Tags -->
        $(".select-add-tags").select2({
            tags: true,
            theme: "bootstrap",
        });
    });
</script>
<script type="text/javascript" src="components/select2/js/pmd-select2.js"></script>
<!-- login page sections show hide -->
<script type="text/javascript">
    $(document).ready(function(){
     $('.app-list-icon li a').addClass("active");
        $(".login-for").click(function(){
            $('.login-card').hide()
            $('.forgot-password-card').show();
        });
        $(".signin").click(function(){
            $('.login-card').show()
            $('.forgot-password-card').hide();
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
        $(".login-register").click(function(){
            $('.login-card').hide()
            $('.forgot-password-card').hide();
            $('.register-card').show();
        });
        
        $(".register-login").click(function(){
            $('.register-card').hide()
            $('.forgot-password-card').hide();
            $('.login-card').show();
        });
        $(".forgot-password").click(function(){
            $('.login-card').hide()
            $('.register-card').hide()
            $('.forgot-password-card').show();
        }); 
});
</script> 
<!-- Scripts Ends -->
<?php } ?>