@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body">
                    <h4 class="card-title text-primary mb-3 d-flex align-items-center">
                        <i class="fas fa-briefcase me-2"></i>
                        Liste des offres d'emploi
                    </h4>
                    <p class="card-description text-muted mb-4">
                        Consultez et gérez les offres d'emploi enregistrées ici.
                    </p>

                    <!-- Tableau pour afficher les offres d'emploi -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Qualifications</th>
                                    <th>Compétences</th>
                                    <th>Type de contrat</th>
                                    <th>Lieu</th>
                                    <th>Date limite</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                <tr>
                                    <td class="fw-bold">{{ $job->job_title }}</td>
                                    <td>{{ Str::limit($job->job_description, 50) }}</td>
                                    <td>{{ Str::limit($job->job_requirements, 50) }}</td>
                                    <td>{{ $job->skills }}</td>
                                    <td><span class="badge bg-success rounded-pill">{{ $job->contract_type }}</span></td>
                                    <td>{{ $job->job_location }}</td>
                                    <td><span class="badge bg-warning text-dark rounded-pill">{{ \Carbon\Carbon::parse($job->deadline)->format('d/m/Y') }}</span></td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('admin.editJob', $job->id) }}" class="btn btn-sm btn-warning me-2 px-3 py-2 d-flex align-items-center transition-all hover-shadow rounded-3">
                                                <i class="fas fa-edit me-1"></i> Modifier
                                            </a>
                                            <a href="{{ route('admin.applicants', $job->id) }}" class="btn btn-sm btn-info me-2 px-3 py-2 d-flex align-items-center transition-all hover-shadow rounded-3">
                                                <i class="fas fa-users me-1"></i> Candidats
                                            </a>
                                            <form action="{{ route('admin.deleteJob', $job->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger px-3 py-2 d-flex align-items-center transition-all hover-shadow rounded-3">
                                                    <i class="fas fa-trash-alt me-1"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
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

<style>
    .transition-all {
        transition: all 0.3s ease-in-out;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn {
        font-size: 0.9rem;
    }

    .table th, .table td {
        padding: 12px 16px;
    }
</style>
