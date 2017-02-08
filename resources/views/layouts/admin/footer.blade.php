

<!-- js placed at the end of the document so the pages load faster -->
<script src="{!! asset('assets/js/jquery.js') !!}"></script>
<script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.dcjqaccordion.2.7.js') !!}" class="include" type="text/javascript"></script>
<script src="{!! asset('assets/js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.nicescroll.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/js/jquery.sparkline.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/js/jquery.easy-pie-chart.js') !!}"></script>
<script src="{!! asset('assets/js/owl.carousel.js') !!}" ></script>
<script src="{!! asset('assets/js/jquery.customSelect.min.js') !!}" ></script>
<script src="{!! asset('assets/js/respond.min.js') !!}" ></script>

<!--right slidebar-->
<script src="{!! asset('assets/js/slidebars.min.js') !!}"></script>



<!--script for this page-->
<script src="{!! asset('assets/js/sparkline-chart.js') !!}"></script>
<script src="{!! asset('assets/js/easy-pie-chart.js') !!}"></script>
<script src="{!! asset('assets/js/count.js') !!}"></script>



<script src="{!! asset('assets/js/jquery-ui-1.9.2.custom.min.js') !!}"></script>
<!--custom switch-->
<script src="{!! asset('assets/js/bootstrap-switch.js') !!}"></script>
<!--custom tagsinput-->
<script src="{!! asset('assets/js/jquery.tagsinput.js') !!}"></script>
<!--custom checkbox & radio-->


<script type="text/javascript" src="/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="{!! asset('assets/js/form-component.js') !!}"></script>


<!--common script for all pages-->
<script src="{!! asset('assets/js/common-scripts.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/js/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('assets/js/form-validation-script.js') !!}"></script>
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