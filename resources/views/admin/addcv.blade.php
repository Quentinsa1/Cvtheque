@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Enregistrer un CV</h4>
            <p class="card-description">
              Saisir les Informations
            </p>
            <!-- Formulaire pour l'enregistrement du CV -->
            <form class="forms-sample" action="{{ route('admin.cvform.submit') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" value="{{ old('nom') }}">
                @error('nom')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="prenoms">Prénoms</label>
                <input type="text" name="prenoms" class="form-control" id="prenoms" placeholder="Prénoms" value="{{ old('prenoms') }}">
                @error('prenoms')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="genre">Genre</label>
                <select name="genre" class="form-control" id="genre">
                  <option value="M" {{ old('genre') == 'M' ? 'selected' : '' }}>M</option>
                  <option value="F" {{ old('genre') == 'F' ? 'selected' : '' }}>F</option>
                </select>
                @error('genre')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="img">Importer le fichier</label>
                <input type="file" name="img" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Importer Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Importer</button>
                  </span>
                </div>
                @error('img')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse" value="{{ old('adresse') }}">
                @error('adresse')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="domaine">Domaine</label>
                <input type="text" name="domaine" class="form-control" id="domaine" placeholder="Domaine" value="{{ old('domaine') }}">
                @error('domaine')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="sous_domaine">Sous-domaine</label>
                <input type="text" name="sous_domaine" class="form-control" id="sous_domaine" placeholder="Sous-domaine" value="{{ old('sous_domaine') }}">
                @error('sous_domaine')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary me-2">Soumettre</button>
              <button class="btn btn-light">Annuler</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
