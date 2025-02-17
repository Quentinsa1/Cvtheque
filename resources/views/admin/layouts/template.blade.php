<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body>
    <div class="container-scroller d-flex">
        @include('admin.layouts.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layouts.navbar')
            @yield('content')
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-facebook d-flex align-items-center">
                  <div class="card-body py-5">
                    <div
                      class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                      <div class="ms-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Nombre de CV enregistrés</h5>
                        <p class="mt-2 text-white card-text" style="text-align: center; font-weight: bold; font-size: 38px;">{{ $totalImprovedCvs }}</p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card bg-google d-flex align-items-center">
                  <div class="card-body py-5">
                    <div
                      class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                      <div class="ms-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Nombe d'offres publiées : </h5>
                        <p class="mt-2 text-white card-text" style="text-align: center; font-weight: bold; font-size: 38px;">{{ $totalJobs }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            @include('admin.layouts.footer')
        </div>

        
    </div>


    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
              $(document).ready(function () {
                $(".file-upload-browse").click(function () {
                  $(this).closest(".form-group").find(".file-upload-default").click();
                });
            
                $(".file-upload-default").change(function () {
                  var fileName = $(this).val().split("\\").pop(); // Récupérer le nom du fichier
                  $(this).closest(".form-group").find(".file-upload-info").val(fileName);
                });
              });
            </script>


</body>
</html>