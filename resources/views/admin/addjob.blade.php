@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card animated fadeInUp">
                <div class="card-body">
                    <h4 class="card-title text-primary"><i class="fas fa-briefcase"></i> Enregistrer une offre d'emploi</h4>
                    <p class="card-description text-muted">
                        Saisissez les informations de l'offre d'emploi avec précision.
                    </p>
                    <form class="forms-sample" action="{{ route('admin.storeJob') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="job_title" class="form-label">Titre du poste</label>
                            <input type="text" class="form-control form-control-lg rounded-3 shadow-sm" id="job_title" name="job_title" required>
                        </div>

                        <div class="mb-4">
                            <label for="job_description" class="form-label">Description de l'offre</label>
                            <textarea class="form-control rounded-3 shadow-sm" id="job_description" name="job_description" rows="4" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="job_requirements" class="form-label">Qualifications requises</label>
                            <textarea class="form-control rounded-3 shadow-sm" id="job_requirements" name="job_requirements" rows="3" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="skills" class="form-label">Compétences</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" id="skills" name="skills" required>
                        </div>

                        <div class="mb-4">
                            <label for="contract_type" class="form-label">Type de contrat</label>
                            <select class="form-control rounded-3 shadow-sm" id="contract_type" name="contract_type" required>
                                <option value="CDI">CDI</option>
                                <option value="CDD">CDD</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="job_location" class="form-label">Lieu de travail</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" id="job_location" name="job_location" required>
                        </div>

                        <div class="mb-4">
                            <label for="deadline" class="form-label">Date limite de candidature</label>
                            <input type="date" class="form-control rounded-3 shadow-sm" id="deadline" name="deadline" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg me-2 shadow-sm">Soumettre</button>
                            <button type="reset" class="btn btn-light btn-lg shadow-sm">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .animated {
        opacity: 0;
        animation: fadeIn 1s forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .form-control:focus {
        border-color: #17a2b8;
        box-shadow: 0 0 10px rgba(23, 162, 184, 0.5);
    }
    .form-control {
        border-radius: 8px;
    }
    .btn-primary {
        background: linear-gradient(135deg, #17a2b8, #0056b3);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #0056b3, #17a2b8);
    }
</style>
@endsection
