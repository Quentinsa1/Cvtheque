<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('assets/images/jobbac.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.85); /* Transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .form-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .text-center button {
            padding: 10px 30px;
            font-size: 1.1rem;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Formulaire de Candiadature </h2>
        <form action="{{ route('job.apply', $job->id) }}" method="POST" class="form-section" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Poste</label>
                <input type="text" name="poste" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nom du candidat (Société)</label>
                <input type="text" name="societe" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nom de l'employé</label>
                <input type="text" name="candidate_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date de naissance</label>
                <input type="date" name="date_naissance" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nationalité / Pays de résidence</label>
                <input type="text" name="nationalite" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Formation</label>
                <textarea name="formation" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Expérience professionnelle</label>
                <textarea name="experience" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Langues (ex: Français - Bon, Anglais - Moyen)</label>
                <textarea name="langues" class="form-control" rows="2" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Projet/Mission clé</label>
                <textarea name="projet" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Joindre une copie de la pièce d'identité</label>
                <input type="file" name="piece_identite" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Diplômes</label>
                <input type="file" name="diplomes" class="form-control" multiple>
            </div>
            <div class="mb-3">
                <label class="form-label">Attestations</label>
                <input type="file" name="attestations" class="form-control" multiple>
            </div>
            <div class="mb-3">
                <label class="form-label">Joindre votre CV (PDF, DOC, DOCX)</label>
                <input type="file" name="cv" class="form-control" required>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
