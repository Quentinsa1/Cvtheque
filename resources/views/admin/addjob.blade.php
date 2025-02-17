@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Enregistrer une offre d'emploi</h4>
            <p class="card-description">
              Saisir les informations de l'offre d'emploi
            </p>
            <!-- Formulaire pour l'enregistrement de l'offre -->
            <form class="forms-sample" action="{{ route('admin.storeJob') }}" method="POST">
                @csrf
                <!-- Champ pour le titre de l'offre -->
                <div class="mb-3">
                    <label for="job_title" class="form-label">Titre du poste</label>
                    <input type="text" class="form-control" id="job_title" name="job_title" required>
                </div>
            
                <!-- Champ pour la description -->
                <div class="mb-3">
                    <label for="job_description" class="form-label">Description de l'offre</label>
                    <textarea class="form-control" id="job_description" name="job_description" rows="4" required></textarea>
                </div>
            
                <!-- Champ pour les qualifications -->
                <div class="mb-3">
                    <label for="job_requirements" class="form-label">Qualifications requises</label>
                    <textarea class="form-control" id="job_requirements" name="job_requirements" rows="3" required></textarea>
                </div>
            
                <!-- Champ pour les compétences -->
                <div class="mb-3">
                    <label for="skills" class="form-label">Compétences</label>
                    <input type="text" class="form-control" id="skills" name="skills" required>
                </div>
            
                <!-- Champ pour le type de contrat -->
                <div class="mb-3">
                    <label for="contract_type" class="form-label">Type de contrat</label>
                    <select class="form-control" id="contract_type" name="contract_type" required>
                        <option value="CDI">CDI</option>
                        <option value="CDD">CDD</option>
                        <option value="Freelance">Freelance</option>
                    </select>
                </div>
            
                <!-- Champ pour le lieu de travail -->
                <div class="mb-3">
                    <label for="job_location" class="form-label">Lieu de travail</label>
                    <input type="text" class="form-control" id="job_location" name="job_location" required>
                </div>
            
                <!-- Champ pour la date limite -->
                <div class="mb-3">
                    <label for="deadline" class="form-label">Date limite de candidature</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" required>
                </div>
            
                <button type="submit" class="btn btn-primary me-2">Soumettre</button>
                <button type="reset" class="btn btn-light">Annuler</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
