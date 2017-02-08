

<!-- js placed at the end of the document so the pages load faster -->
<script src="{!! asset('admin/assets/js/jquery.js') !!}"></script>
<script src="{!! asset('admin/assets/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('admin/assets/js/jquery.dcjqaccordion.2.7.js') !!}" class="include" type="text/javascript"></script>
<script src="{!! asset('admin/assets/js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! asset('admin/assets/js/jquery.nicescroll.js') !!}" type="text/javascript"></script>
<script src="{!! asset('admin/assets/js/jquery.sparkline.js') !!}" type="text/javascript"></script>
<script src="{!! asset('admin/assets/js/jquery.easy-pie-chart.js') !!}"></script>
<script src="{!! asset('admin/assets/js/owl.carousel.js') !!}" ></script>
<script src="{!! asset('admin/assets/js/jquery.customSelect.min.js') !!}" ></script>
<script src="{!! asset('admin/assets/js/respond.min.js') !!}" ></script>

<!--right slidebar-->
<script src="{!! asset('admin/assets/js/slidebars.min.js') !!}"></script>



<!--script for this page-->
<script src="{!! asset('admin/assets/js/sparkline-chart.js') !!}"></script>
<script src="{!! asset('admin/assets/js/easy-pie-chart.js') !!}"></script>
<script src="{!! asset('admin/assets/js/count.js') !!}"></script>



<script src="{!! asset('admin/assets/js/jquery-ui-1.9.2.custom.min.js') !!}"></script>
<!--custom switch-->
<script src="{!! asset('admin/assets/js/bootstrap-switch.js') !!}"></script>
<!--custom tagsinput-->
<script src="{!! asset('admin/assets/js/jquery.tagsinput.js') !!}"></script>
<!--custom checkbox & radio-->


<script type="text/javascript" src="/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/admin/assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="/admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="{!! asset('admin/assets/js/form-component.js') !!}"></script>
<script src="{!! asset('admin/assets/toaster-master/toastr.js') !!}"></script>


<!--common script for all pages-->
<script src="{!! asset('admin/assets/js/common-scripts.js') !!}"></script>
<script src="{!! asset('admin/assets/js/ajax.js') !!}"></script>

<script type="text/javascript" src="{!! asset('admin/assets/js/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('admin/assets/js/form-validation-script.js') !!}"></script>
<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>
</body>
</html>