@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow-lg border-0 rounded-lg animate__animated animate__fadeInUp">
                <div class="card-body p-5">
                    <h4 class="card-title text-center text-primary">Enregistrer un CV</h4>
                    <p class="card-description text-center text-muted">
                        Remplissez les informations ci-dessous
                    </p>
                    <form class="forms-sample" action="{{ route('admin.cvform.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group position-relative">
                            <label for="nom">Nom</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nom" class="form-control rounded shadow-sm" id="nom" placeholder="Nom" value="{{ old('nom') }}" required>
                            </div>
                            @error('nom')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group position-relative">
                            <label for="prenoms">Prénoms</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="prenoms" class="form-control rounded shadow-sm" id="prenoms" placeholder="Prénoms" value="{{ old('prenoms') }}" required>
                            </div>
                            @error('prenoms')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group position-relative">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control rounded shadow-sm" id="email" placeholder="Email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select name="genre" class="form-control rounded shadow-sm" id="genre">
                                <option value="M" {{ old('genre') == 'M' ? 'selected' : '' }}>Masculin</option>
                                <option value="F" {{ old('genre') == 'F' ? 'selected' : '' }}>Féminin</option>
                            </select>
                            @error('genre')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="img">Importer le fichier</label>
                            <input type="file" name="img" class="form-control-file border p-2 rounded shadow-sm" id="img">
                            @error('img')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group position-relative">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" class="form-control rounded shadow-sm" id="adresse" placeholder="Adresse" value="{{ old('adresse') }}" required>
                            @error('adresse')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group position-relative">
                            <label for="domaine">Domaine</label>
                            <input type="text" name="domaine" class="form-control rounded shadow-sm" id="domaine" placeholder="Domaine" value="{{ old('domaine') }}" required>
                            @error('domaine')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group position-relative">
                            <label for="sous_domaine">Sous-domaine</label>
                            <input type="text" name="sous_domaine" class="form-control rounded shadow-sm" id="sous_domaine" placeholder="Sous-domaine" value="{{ old('sous_domaine') }}" required>
                            @error('sous_domaine')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded shadow-sm px-4"><i class="fas fa-check"></i> Soumettre</button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg rounded shadow-sm px-4"><i class="fas fa-times"></i> Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
