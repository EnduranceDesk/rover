<!-- Bootstrap -->
<link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- bootstrap-progressbar -->
<link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap -->
<link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="/build/css/custom.min.css" rel="stylesheet">
<link href="/css/custom.css" rel="stylesheet">

<link rel="stylesheet" href="/css/jquery.fancybox.min.css" />
<link rel="stylesheet" href="/css/sweetalert2.min.css" />
<link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

<!-- PNotify -->
<link href="/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
<link href="/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
<script>
    function refreshItemProduct(item_id) {
        var uid = window.parent.$(".uid_" + item_id);
        console.log(uid);
        var brand = window.parent.$(".brand_" + item_id);
        var model = window.parent.$(".model_" + item_id);
 
        $.get("{{url("/")}}/orders/items/" + item_id + "/product/get/json", {}, function (product) {
            product = JSON.parse(product);
            if (product.uid) {
                console.log("Making changes");
                uid.each(function(index,ui) {
                    $(this).attr("href", "{{url("/")}}/products/view-" + product.uid);
                    $(this).text(product.uid);
                });
                brand.each(function(index,singleBrand) {
                    $(this).text(product.brand);
                });
                model.each(function(index,singleModel) {
                    $(this).text(product.model);
                });
            }
            
        });
    }
    
</script>
