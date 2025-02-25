<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae - {{ $name }}</title>
    <style>
        /* Styles globaux */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            line-height: 1.7;
            color: #333;
        }

        /* Conteneur principal */
        .container {
            max-width: 900px;
            margin: 40px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* En-tête du CV */
        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            margin: 0;
            color: #2c3e50;
            font-size: 40px;
            font-weight: 700;
        }

        .header p {
            margin: 8px 0;
            font-size: 16px;
            color: #7f8c8d;
        }

        .header span.bold {
            font-weight: 700;
            color: #2980b9;
        }

        /* Section générale */
        .content-section {
            margin-top: 30px;
        }

        h2 {
            color: #34495e;
            font-size: 24px;
            margin-bottom: 20px;
            padding-bottom: 5px;
            border-bottom: 2px solid #2980b9;
        }

        p {
            font-size: 16px;
            color: #7f8c8d;
            line-height: 1.8;
        }

        /* Tableau d'historique des postes */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ecf0f1;
            vertical-align: middle;
        }

        th {
            background-color: #3498db;
            color: white;
            font-size: 16px;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f4f4f4;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .info-item i {
            color: #2980b9;
            font-size: 18px;
            margin-right: 15px;
        }

        .info-item span {
            font-size: 16px;
            color: #7f8c8d;
        }

        .contact-info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .contact-info div {
            width: 45%;
        }

        /* Mise en page responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 32px;
            }

            h2 {
                font-size: 20px;
            }

            p, table {
                font-size: 14px;
            }

            .contact-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .contact-info div {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <!-- En-tête -->
        <div class="header">
            <h1>{{ $name }}</h1>
            <p><span class="bold">Poste :</span> {{ $poste }}</p>
            <p><span class="bold">Société :</span> {{ $societe }}</p>
            <p><span class="bold">Date de naissance :</span> {{ \Carbon\Carbon::parse($date_of_birth)->format('d-m-Y') }}</p>
            <p><span class="bold">Nationalité :</span> {{ $nationality }}</p>
        </div>

        <!-- Informations de contact -->
        <div class="content-section">
            <h2>Formation</h2>
            <p>{{ $education }}</p>
        </div>

        <!-- Expérience professionnelle -->
        <div class="content-section">
            <h2>Expérience professionnelle</h2>
            <p>{{ $experience }}</p>
        </div>

        <!-- Compétences linguistiques -->
        <div class="content-section">
            <h2>Compétences linguistiques</h2>
            <p>{{ $languages }}</p>
        </div>

        <!-- Projets -->
        <div class="content-section">
            <h2>Projets</h2>
            <p>{{ $projects }}</p>
        </div>

        <!-- Historique des Postes -->
        <div class="content-section">
            <h2>Historique des Postes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Poste</th>
                        <th>Entreprise</th>
                        <th>Durée</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Développeur Web</td>
                        <td>ABC Corp</td>
                        <td>Jan 2020 - Déc 2022</td>
                    </tr>
                    <tr>
                        <td>Ingénieur Logiciel</td>
                        <td>XYZ Ltd</td>
                        <td>Fév 2018 - Déc 2019</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="content-section contact-info">
            <div>
                <h2>Coordonnées</h2>
                <div class="info-item"><i class="fas fa-phone-alt"></i><span>+123 456 789</span></div>
                <div class="info-item"><i class="fas fa-envelope"></i><span>email@example.com</span></div>
            </div>
            <div>
                <h2>Réseaux</h2>
                <div class="info-item"><i class="fab fa-linkedin"></i><span>linkedin.com/in/username</span></div>
                <div class="info-item"><i class="fab fa-github"></i><span>github.com/username</span></div>
            </div>
        </div>
    </div>

</body>
</html>
