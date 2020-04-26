<!-- jQuery -->
<script src="/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="/vendors/Flot/jquery.flot.js"></script>
<script src="/vendors/Flot/jquery.flot.pie.js"></script>
<script src="/vendors/Flot/jquery.flot.time.js"></script>
<script src="/vendors/Flot/jquery.flot.stack.js"></script>
<script src="/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/vendors/moment/min/moment.min.js"></script>
<script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="/js/jquery.fancybox.min.js"></script>

<script src="/vendors/switchery/dist/switchery.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="/build/js/custom.min.js"></script>
<script src="/js/tinymce/tinymce.min.js"></script>

<script src="/vendors/pnotify/dist/pnotify.js"></script>
<script src="/vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="/vendors/pnotify/dist/pnotify.nonblock.js"></script>

<script src="/js/chart.js/Chart.bundle.js"></script>
<script src="/js/chart.js/utils.js"></script>
<script src="/js/chart.js/analyser.js"></script>
<link href="/css/select2.min.css" rel="stylesheet" />
<script src="/js/select2.min.js"></script>
<script src="/js/jquery.sortable.min.js"></script>
<script src="/js/sweetalert2.all.min.js"></script>
<script src="/js/dinero.min.js"></script>
<script src="/js/clipboard.js"></script>
<script>
    $(document).ready(function() {  
        var clipboard = new Clipboard('.btn');
        clipboard.on('success', function(e) {
            new PNotify({
                  title: "Clipboard",
                  type: 'info',
                  text: 'Copied: ' + e.text,
                  nonblock: {
                      nonblock: true
                  },
                  styling: 'bootstrap3',
                  addclass: 'dark'
              });
            e.clearSelection();
        });
        $(".select2").select2();   
        $('[data-toggle="popover"]').popover();   
        $('.fancybox').fancybox({
            'autoSize' : true,
            'height':800,
        });
        $(".are_you_sure").click(function (e) {
            e.preventDefault();
            var url = $(this).attr("href");
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Proceed!'
        }).then((result) => {
            if (result.value) {
               location.href = url;
                return;
            }
            });
        });
    });
</script>