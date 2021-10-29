<footer>
    <!-- Footer Start-->
    <div class="footer-area fix pt-50 background11">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-30">
                    {!! dynamic_sidebar('footer_sidebar_1') !!}
                </div>

                <div class="col-lg-3 col-md-6 mb-lg-0 mb-30">
                    {!! dynamic_sidebar('footer_sidebar_2') !!}
                </div>

                <div class="col-lg-3 col-md-6">
                    {!! dynamic_sidebar('footer_sidebar_3') !!}
                </div>

                <div class="col-lg-3 col-md-6">
                    {!! dynamic_sidebar('footer_sidebar_4') !!}
                </div>
            </div>
        </div>
    </div>

    <!-- footer-bottom aera -->
    <div class="footer-bottom-area background11">
        <div class="container">
            <div class="footer-border pt-30 pb-30">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="footer-copy-right">
                            <p class="font-medium">
                                {!! clean(theme_option('copyright')) !!} {!! clean(theme_option('designed_by')) !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-menu float-lg-right mt-lg-0 mt-3">
                            {!! dynamic_sidebar('footer_copyright_menu') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- End Footer -->
<div class="dark-mark"></div>
<!-- Vendor JS-->
{!! Theme::footer() !!}
</body>

</html>
