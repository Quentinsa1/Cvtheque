@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste des offres d'emploi</h4>
            <p class="card-description">
              Vous pouvez consulter et gérer les offres d'emploi enregistrées ici.
            </p>
            
            <!-- Tableau pour afficher les offres d'emploi -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Qualifications</th>
                            <th>Compétences</th>
                            <th>Type de contrat</th>
                            <th>Lieu de travail</th>
                            <th>Date limite</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ Str::limit($job->job_description, 50) }}</td>
                            <td>{{ Str::limit($job->job_requirements, 50) }}</td>
                            <td>{{ $job->skills }}</td>
                            <td>{{ $job->contract_type }}</td>
                            <td>{{ $job->job_location }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->deadline)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.editJob', $job->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('admin.deleteJob', $job->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
