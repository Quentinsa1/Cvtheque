@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 col-xl-6 grid-margin stretch-card">
        <div class="row w-100 flex-grow">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Statistiques</p>
                <div class="row mb-3">
                  <div class="col-md-7">
                    <div class="d-flex justify-content-between traffic-status">
                      <div class="item">
                        <p class="mb-">Nombre de CV enregistrés</p>
                        <h5 class="font-weight-bold mb-0">{{ $totalCvs ?? 0 }}</h5>
                        <div class="color-border"></div>
                    </div>
                    
                      <div class="item">
                        <p class="mb-0">Nombre de CV améliorés</p>
                        <h5 class="font-weight-bold mb-0">{{ $totalImprovedCvs }}</h5>
                        <div class="color-border"></div>
                      </div>
                      <div class="item">
                        <p class="mb-0">Nombre d'offres publiées</p>
                        <h5 class="font-weight-bold mb-0">{{ $totalJobs }}</h5>
                        <div class="color-border"></div>
                      </div>
                    </div>
                  </div>                 
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-xl-6 grid-margin stretch-card">
        <div class="row w-100 flex-grow">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body pb-0">
                <div class="d-flex align-items-center mb-4">
                  <p class="card-title mb-0 me-1">Total Activités</p>
                </div>
                <div class="d-flex flex-wrap pt-2">
                  <div class="me-4 mb-lg-2 mb-xl-0">
                    <p>Pourcentage d'activité</p>
                    <h4 class="font-weight-bold mb-0">
                        {{ number_format(($totalPersons > 0 ? ($totalImprovedCvs / $totalPersons) * 100 : 0), 2) }} %
                    </h4>
                  </div>
                </div>
              </div>
              <canvas height="150" id="activity-chart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Affichage en grand format -->
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-facebook d-flex align-items-center">
          <div class="card-body py-5">
            <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
              <div class="ms-3 ml-md-0 ml-xl-3">
                <h5 class="text-white font-weight-bold">Nombre total de CV enregistrés : {{ $totalPersons }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
