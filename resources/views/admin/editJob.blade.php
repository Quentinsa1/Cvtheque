@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Modifier l'offre d'emploi</h4>
            <p class="card-description">Mettre à jour les informations de l'offre</p>
            
            <form class="forms-sample" action="{{ route('admin.updateJob', $job->id) }}" method="POST">
                @csrf
                @method('PUT') 
                
                <div class="mb-3">
                    <label for="job_title" class="form-label">Titre du poste</label>
                    <input type="text" class="form-control" id="job_title" name="job_title" value="{{ old('job_title', $job->job_title) }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="job_description" class="form-label">Description de l'offre</label>
                    <textarea class="form-control" id="job_description" name="job_description" rows="4" required>{{ old('job_description', $job->job_description) }}</textarea>
                </div>
            
                <div class="mb-3">
                    <label for="job_requirements" class="form-label">Qualifications requises</label>
                    <textarea class="form-control" id="job_requirements" name="job_requirements" rows="3" required>{{ old('job_requirements', $job->job_requirements) }}</textarea>
                </div>
            
                <div class="mb-3">
                    <label for="skills" class="form-label">Compétences</label>
                    <input type="text" class="form-control" id="skills" name="skills" value="{{ old('skills', $job->skills) }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="contract_type" class="form-label">Type de contrat</label>
                    <select class="form-control" id="contract_type" name="contract_type" required>
                        <option value="CDI" {{ $job->contract_type == 'CDI' ? 'selected' : '' }}>CDI</option>
                        <option value="CDD" {{ $job->contract_type == 'CDD' ? 'selected' : '' }}>CDD</option>
                        <option value="Freelance" {{ $job->contract_type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                </div>
            
                <div class="mb-3">
                    <label for="job_location" class="form-label">Lieu de travail</label>
                    <input type="text" class="form-control" id="job_location" name="job_location" value="{{ old('job_location', $job->job_location) }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="deadline" class="form-label">Date limite de candidature</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline', $job->deadline) }}" required>
                </div>
            
                <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
                <button type="reset" class="btn btn-light">Annuler</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
