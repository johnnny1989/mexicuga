</div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2014 Grupo Mexicuga S.A. de C.V. Todos Los Derechos Reservados
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Barra derecha -->

            <!-- /Barra derecha -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
            var AssetUrl = "{{ url('resources/assets/admin/assets') }}";
            var MAINURL = "{{ url('/') }}";
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('resources/assets/admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/detect.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/waves.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/jquery.scrollTo.min.js') }}"></script>

        <script src="{{ asset('resources/assets/admin/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/jquery.app.js') }}"></script>

        <!-- Tablas -->

        <script src="{{ asset('resources/assets/admin/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/pages/jquery.bs-table.js') }}"></script>

        <!-- /Tablas -->

        <!--   -->

        <!-- jQuery  -->

        <script src="{{ asset('resources/assets/admin/assets/plugins/waypoints/lib/jquery.waypoints.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

        <!-- Chart JS -->
        <script src="{{ asset('resources/assets/admin/assets/plugins/Chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('resources/assets/admin/assets/js/chartjs.init_.js') }}"></script>

        <!--FooTable-->
        <script src="{{ asset('resources/assets/admin/assets/plugins/footable/js/footable.all.min.js') }}"></script>

        <script src="{{ asset('resources/assets/admin/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>

        <!--FooTable Example-->
        <script src="{{ asset('resources/assets/admin/assets/pages/jquery.footable.js') }}"></script>
        
        <!--Form Wizard-->
        <script type="text/javascript" src="{{ asset('resources/assets/admin/assets/plugins/jquery.steps/build/jquery.steps.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('resources/assets/admin/assets/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        
        
        <!--wizard initialization-->
        <script src="{{ asset('resources/assets/admin/assets/pages/jquery.wizard-init.js') }}" type="text/javascript"></script>
        <!-- CUSTOME JS -->
        <script type="text/javascript" src="{{ asset('resources/assets/common/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('resources/assets/admin/assets/js/custom.js') }}"></script>
        
        
        <!-- Google Map -->
        <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
        <script src="{{ asset('resources/assets/admin/assets/js/locationpicker.jquery.min.js') }}"></script>
        <script>
    $('#mapa_usuario').locationpicker({
        location: {latitude: 19.33800842950329, longitude: -99.20590474856567},
        locationName: "",
        radius: 500,
        zoom: 15,
        scrollwheel: true,
        inputBinding: {
            latitudeInput: null,
            longitudeInput: null,
            radiusInput: null,
            locationNameInput: null
        },
        enableAutocomplete: false,
        enableReverseGeocode: true,
        streetViewControl: true
    });
        </script>
        <script>
            $('#mapa_usuario2').locationpicker({
                location: {latitude: 19.33800842950329, longitude: -99.20590474856567},
                locationName: "",
                radius: 500,
                zoom: 15,
                scrollwheel: true,
                inputBinding: {
                    latitudeInput: null,
                    longitudeInput: null,
                    radiusInput: null,
                    locationNameInput: null
                },
                enableAutocomplete: false,
                enableReverseGeocode: true,
                streetViewControl: true
            });
        </script>
        <script>
            $('#mapa_usuario3').locationpicker({
                location: {latitude: 19.33800842950329, longitude: -99.20590474856567},
                locationName: "",
                radius: 500,
                zoom: 15,
                scrollwheel: true,
                inputBinding: {
                    latitudeInput: null,
                    longitudeInput: null,
                    radiusInput: null,
                    locationNameInput: null
                },
                enableAutocomplete: false,
                enableReverseGeocode: true,
                streetViewControl: true
            });
        </script>
        <script>
            $('#mapa_usuario4').locationpicker({
                location: {latitude: 19.33800842950329, longitude: -99.20590474856567},
                locationName: "",
                radius: 500,
                zoom: 15,
                scrollwheel: true,
                inputBinding: {
                    latitudeInput: null,
                    longitudeInput: null,
                    radiusInput: null,
                    locationNameInput: null
                },
                enableAutocomplete: false,
                enableReverseGeocode: true,
                streetViewControl: true
            });
        </script>
        <script>
            $('#mapa_usuario5').locationpicker({
                location: {latitude: 19.33800842950329, longitude: -99.20590474856567},
                locationName: "",
                radius: 500,
                zoom: 15,
                scrollwheel: true,
                inputBinding: {
                    latitudeInput: null,
                    longitudeInput: null,
                    radiusInput: null,
                    locationNameInput: null
                },
                enableAutocomplete: false,
                enableReverseGeocode: true,
                streetViewControl: true
            });
        </script>
        <script>
            $('#mapa_usuario6').locationpicker({
                location: {latitude: 19.33800842950329, longitude: -99.20590474856567},
                locationName: "",
                radius: 500,
                zoom: 15,
                scrollwheel: true,
                inputBinding: {
                    latitudeInput: null,
                    longitudeInput: null,
                    radiusInput: null,
                    locationNameInput: null
                },
                enableAutocomplete: false,
                enableReverseGeocode: true,
                streetViewControl: true
            });
        </script>

@yield('footjs')
    </body>
</html>