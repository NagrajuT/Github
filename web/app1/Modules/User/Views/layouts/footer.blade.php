<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/assets/user/user-panel/global/plugins/respond.min.js"></script>
<script src="/assets/user/user-panel/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/assets/user/user-panel/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/assets/user/user-panel/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/assets/user/user-panel/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->

<script src="/assets/user/user-panel/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/user/user-panel/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/scripts/index3.js" type="text/javascript"></script>
<script src="/assets/user/user-panel/scripts/tasks.js" type="text/javascript"></script>

<script src="/assets/user/user-panel/global/plugins/dropify-master/dropify-master/dist/js/dropify.min.js"></script>

<script src="/assets/user/js/modernizr.js"></script>
<script src="/assets/user/js/sweetalert.min.js"></script>
<script src="/assets/user/js/bootbox.min.js"></script>
<script src="/assets/user/js/toastr.min.js"></script>



<script>
    jQuery(document).ready(function() {
        Layout.init(); // init current layout
    });
</script>
<script>

    // Wait for window load
    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
    $(document).ready(function(){
        $(function () {
//            $(document).ajaxSuccess(function(event, xhr, settings){
//                if(xhr.status==200 && xhr.responseText=='user session expired'){
//                    swal({
//                        title: 'Your Session Expired!',
//                        text: 'Please Login to continue...',
//                        timer: 5000
//                    },function () {
//                        window.location.href ="/";
//                    });
//                }
//            });
            $(document).ajaxError(function(event, xhr, settings)    {

                if(xhr.status==200 && xhr.responseText=='user session expired'){
                    swal({
                        title: 'Your Login Session Expired!',
                        text: 'Please Login to continue...',
                        timer: 5000
                    },function () {
                        window.location.href ="/";
                    });
                }
            });
        });

    });

</script>
<!-- END PAGE LEVEL SCRIPTS -->