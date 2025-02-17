<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->job_title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .job-card {
            max-width: 850px;
            margin: auto;
/*             padding-left: 10px;
 */         border-radius: 10px;
            overflow: hidden;
            background: #fff;
        }

        .job-header img {
            width: 50%;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
            display: block;
            margin: 10px;
            margin: auto;
            padding: 10px;
            /* Centre l'image horizontalement */
        }

        .job-body {
            padding: 20px;
        }

        .job-body h2 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #002169;
        }

        .job-info {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .job-info i {
            font-size: 18px;
            margin-right: 10px;
            color: #002169;
        }

        .apply-btn {
            background-color: #002169;
            color: white;
            font-weight: bold;
            width: 400px;
            transition: 0.3s;
            padding: 12px;
            border-radius: 6px;
            display: block;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            margin: auto;
        }

        .apply-btn:hover {
            background-color: #002169;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card job-card shadow-lg">
            <div class="job-header">
                <img src="{{ asset('assets/images/IAC.png') }}" alt="Job Image">
            </div>

            <div class="job-body">
                <h2 class="">{{ $job->job_title }}</h2>
                <div class="job-info">
                    <i class="fa-solid fa-map-marker-alt"></i> <strong>Lieu:</strong> {{ $job->job_location }}
                </div>
                <div class="job-info">
                    <i class="fa-solid fa-file-contract"></i> <strong>Type de contrat:</strong> <span
                        class="badge bg-success">{{ $job->contract_type }}</span>
                </div>
                <div class="job-info">
                    <i class="fa-solid fa-calendar-alt"></i> <strong>Date limite:</strong> <span
                        class="text-danger">{{ \Carbon\Carbon::parse($job->deadline)->format('d F Y') }}</span>
                </div>
                <hr>
                <p><strong>Description:</strong> {{ $job->job_description }}</p>
                <p><strong>Exigences:</strong> {{ $job->job_requirements }}</p>
                <p><strong>Compétences requises:</strong> {{ $job->skills }}</p>
                <a href="{{ route('job.apply', $job->id) }}" class="apply-btn mt-3">
                    <i class="fa-solid fa-paper-plane"></i> Postuler
                </a>

                            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
