@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Liste des CV</h4>

                @if(isset($query))
                    <p>Résultats pour "<strong>{{ $query }}</strong>"</p>
                @endif

                <div class="table-responsive pt-3">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nom/Prénoms</th>
                        <th>Domaine</th>
                        <th>Sous-Domaine</th>
                        <th>Voir le CV</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($cvs as $index => $cv)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $cv->nom }} {{ $cv->prenoms }}</td>
                        <td>{{ $cv->domaine }}</td>
                        <td>{{ $cv->sous_domaine }}</td>
                        <td>
                          @if($cv->file_path)
                            <a href="{{ asset('storage/' . $cv->file_path) }}" target="_blank" class="btn btn-primary">Voir</a>
                          @else
                            <span class="text-danger">Aucun fichier</span>
                          @endif
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5" class="text-center text-warning">Aucun CV trouvé</td>
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
@endsection
