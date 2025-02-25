@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-xl-6 grid-margin stretch-card">
            <div class="card animated fadeInUp">
                <div class="card-body">
                    <p class="card-title">Statistiques</p>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between traffic-status">
                                <div class="item">
                                    <p class="mb-1">Nombre de CV enregistrés :</p>
                                    <h5 class="counter" data-target="{{ $totalPersons }}">0</h5>
                                    <div class="color-border"></div>
                                </div>
                                <div class="item">
                                    <p class="mb-1">Nombre de CV améliorés</p>
                                    <h5 class="counter" data-target="{{ $totalImprovedCvs }}">0</h5>
                                    <div class="color-border"></div>
                                </div>
                                <div class="item">
                                    <p class="mb-1">Nombre d'offres publiées</p>
                                    <h5 class="counter" data-target="{{ $totalJobs }}">0</h5>
                                    <div class="color-border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6 grid-margin stretch-card">
            <div class="card animated fadeInUp delay-1s">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center mb-4">
                        <p class="card-title mb-0">Total Activités</p>
                    </div>
                    <div class="d-flex flex-wrap pt-2">
                        <div>
                            <p>Pourcentage d'activité</p>
                            <h4 class="counter" data-target="{{ number_format(($totalPersons > 0 ? ($totalImprovedCvs / $totalPersons) * 100 : 0), 2) }}">0</h4>
                        </div>
                    </div>
                </div>
                <canvas height="150" id="activity-chart"></canvas>
            </div>
        </div>
    </div>

   {{--  <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card bg-facebook d-flex align-items-center animated fadeInUp delay-2s">
                <div class="card-body py-5">
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <h5 class="text-white">Nombre total de CV enregistrés : <span class="counter" data-target="{{ $totalPersons }}">0</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 12px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    }
    .animated {
        opacity: 0;
        animation: fadeIn 1s forwards ease-in-out;
    }
    .delay-1s { animation-delay: 0.5s; }
    .delay-2s { animation-delay: 1s; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .counter {
        font-size: 28px;
        font-weight: bold;
        color: #17a2b8;
    }
    .color-border {
        width: 60px;
        height: 4px;
        background: #17a2b8;
        border-radius: 2px;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            counter.innerText = '0';
            const updateCounter = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / 100;
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCounter, 20);
                } else {
                    counter.innerText = target;
                }
            };
            updateCounter();
        });
    });
</script>
@endsection
