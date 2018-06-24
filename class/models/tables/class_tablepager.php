<?php
function class_tablePager()
{

    $results = '
            <div class="pmd-card-footer">
                <ul class="pmd-pagination pull-right list-inline">
                    <span>Rows per page:</span> <span class="dropdown pmd-dropdown">
              <button class="btn pmd-ripple-effect pmd-btn-flat btn-link dropdown-toggle" type="button" id="dropdownMenuDivider" data-toggle="dropdown" aria-expanded="false">10 <span class="caret"></span></button>
                    <ul aria-labelledby="dropdownMenuDivider" role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">10</a></li>
                        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">20</a></li>
                        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">30</a></li>
                        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">40</a></li>
                        <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">50</a></li>
                    </ul>
                    </span> <span>1-10 of 100</span> <a href="javascript:void(0);" aria-label="Previous"><i class="material-icons md-dark pmd-sm">keyboard_arrow_left</i></a> <a href="javascript:void(0);" aria-label="Next"><i class="material-icons md-dark pmd-sm">keyboard_arrow_right</i></a>
                </ul>
            </div>';
  /*          
            $results .= '<script>
    $(document).ready(function() {
        var sPath=window.location.pathname;
        var sPage = sPath.substring(sPath.lastIndexOf("/"") + 1);
        $(".pmd-sidebar-nav").each(function(){
            $(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
            $(this).find("a[href='"+sPage+"']").parents(".dropdown").find(".dropdown-menu").css("display", "block");
            $(this).find("a[href='"+sPage+"']").parents(".dropdown").find("a.dropdown-toggle").addClass("active");
            $(this).find("a[href='"+sPage+"']").addClass("active");
        });
        $(".auto-update-year").html(new Date().getFullYear());
    });
</script>';
*/

    return $results;
}
