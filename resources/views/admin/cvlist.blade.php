@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center text-primary">📄 Liste des CV</h4>

                @if(isset($query))
                    <p class="text-center text-muted">Résultats pour "<strong>{{ $query }}</strong>"</p>
                @endif

                <div class="table-responsive pt-3">
                  <table class="table table-hover table-striped">
                    <thead class="table-primary">
                      <tr class="text-center">
                        <th>#</th>
                        <th>👤 Nom / Prénoms</th>
                        <th>🎓 Domaine</th>
                        <th>📌 Sous-Domaine</th>
                        <th>📁 CV</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($cvs as $index => $cv)
                      <tr class="text-center align-middle table-light hover-effect">
                        <td><strong>{{ $index + 1 }}</strong></td>
                        <td>{{ $cv->nom }} {{ $cv->prenoms }}</td>
                        <td>{{ $cv->domaine }}</td>
                        <td>{{ $cv->sous_domaine }}</td>
                        <td>
                          @if($cv->file_path)
                            <a href="{{ asset('storage/' . $cv->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">📂 Voir</a>
                          @else
                            <span class="text-danger">🚫 Aucun fichier</span>
                          @endif
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5" class="text-center text-warning">⚠ Aucun CV trouvé</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

<style>
    .hover-effect:hover {
        background-color: #f8f9fa;
        transition: 0.3s;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }
    .btn-outline-primary {
        transition: transform 0.2s ease-in-out;
    }
    .btn-outline-primary:hover {
        transform: scale(1.1);
    }
</style>
@endsection
