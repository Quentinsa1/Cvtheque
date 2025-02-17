<?php

namespace App\Http\Controllers;
use App\Models\Cv;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function jobform(){
        $totalPersons = Cv::count();
    $totalJobs = Job::count();
    $totalImprovedCvs = Cv::whereNotNull('file_path')->count();
        return view('admin.addjob', compact('totalPersons', 'totalJobs', 'totalImprovedCvs'));
    }

    public function storeJob(Request $request)
{
    // Validation des données de l'offre d'emploi
    $validated = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_description' => 'required|string',
        'job_requirements' => 'required|string',
        'skills' => 'required|string',
        'contract_type' => 'required|string',
        'job_location' => 'required|string',
        'deadline' => 'required|date',
    ]);

    $job = Job::create([
        'job_title' => $validated['job_title'],
        'job_description' => $validated['job_description'],
        'job_requirements' => $validated['job_requirements'],
        'skills' => $validated['skills'],
        'contract_type' => $validated['contract_type'],
        'job_location' => $validated['job_location'],
        'deadline' => $validated['deadline'],
    ]);

    // Redirection avec message de succès
    return redirect()->route('admin.jobform')->with('success', 'Offre d\'emploi enregistrée avec succès!');
}
public function joblist(){
    $totalPersons = Cv::count();
    $totalJobs = Job::count();
    $totalImprovedCvs = Cv::whereNotNull('file_path')->count();
    $jobs = Job::all();
    return view('admin.joblist', compact('jobs', 'totalPersons', 'totalJobs', 'totalImprovedCvs'));
}
public function editJob($id)
{
    $totalPersons = Cv::count();
    $totalJobs = Job::count();
    $totalImprovedCvs = Cv::whereNotNull('file_path')->count();
    // Récupérer l'offre d'emploi à éditer
    $job = Job::findOrFail($id);

    // Retourner la vue avec les données de l'offre
    return view('admin.editJob', compact('job', 'totalPersons', 'totalJobs', 'totalImprovedCvs'));
}
public function updateJob(Request $request, $id)
{
    // Validation des données du formulaire
    $validated = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_description' => 'required|string',
        'job_requirements' => 'required|string',
        'skills' => 'required|string',
        'contract_type' => 'required|string',
        'job_location' => 'required|string',
        'deadline' => 'required|date',
    ]);

    // Trouver l'offre d'emploi à modifier
    $job = Job::findOrFail($id);

    // Mettre à jour les données de l'offre d'emploi
    $job->update([
        'job_title' => $validated['job_title'],
        'job_description' => $validated['job_description'],
        'job_requirements' => $validated['job_requirements'],
        'skills' => $validated['skills'],
        'contract_type' => $validated['contract_type'],
        'job_location' => $validated['job_location'],
        'deadline' => $validated['deadline'],
    ]);

    // Rediriger avec un message de succès
    return redirect()->route('admin.joblist')->with('success', 'Offre d\'emploi mise à jour avec succès!');
}

public function deleteJob($id)
{
    // Récupérer l'offre d'emploi à supprimer
    $job = Job::findOrFail($id);

    // Supprimer l'offre d'emploi
    $job->delete();

    // Rediriger avec un message de succès
    return redirect()->route('admin.joblist')->with('success', 'Offre d\'emploi supprimée avec succès!');
}

public function showJob($id)
{

    $totalJobs = Job::count();
    $job = Job::findOrFail($id);

    return view('website.showJob', compact('job', 'totalJobs', ));
}

public function applyJob($job_id)
{
    $job = Job::findOrFail($job_id);

    return view('website.applyJob', compact('job'));
}
public function storeApplication(Request $request, $job_id)
{
    // Démarre la transaction
    DB::beginTransaction();

    try {
        // Validation des données
        $validated = $request->validate([
            'poste' => 'required|string',
            'candidate_name' => 'required|string', // Utilise 'candidate_name' pour le nom du candidat
            'date_naissance' => 'required|date',
            'nationalite' => 'required|string',
            'formation' => 'required|string',
            'experience' => 'required|string',
            'langues' => 'required|string',
            'projet' => 'required|string',
            'piece_identite' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'diplomes' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'attestations' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Stockage des fichiers
        $pieceIdentitePath = $request->file('piece_identite')->store('documents/pieces_identite', 'public');
        $diplomesPath = $request->file('diplomes')->store('documents/diplomes', 'public');
        $attestationsPath = $request->file('attestations')->store('documents/attestations', 'public');
        $cvPath = $request->file('cv')->store('documents/cv', 'public');

        // Enregistrement dans la base de données
        $application = Application::create([
            'job_id' => $job_id,
            'poste' => $validated['poste'],
            'candidate_name' => $validated['candidate_name'], // Remplace 'nom' par 'candidate_name'
            'date_of_birth' => $validated['date_naissance'],  // Remplace 'date_naissance' par 'date_of_birth'
            'nationality' => $validated['nationalite'], // Remplace 'nationalite' par 'nationality'
            'education' => $validated['formation'],  // Remplace 'formation' par 'education'
            'experience' => $validated['experience'],
            'languages' => $validated['langues'], // Remplace 'langues' par 'languages'
            'projects' => $validated['projet'], // Remplace 'projet' par 'projects'
            'id_card' => $pieceIdentitePath,
            'diplomas' => $diplomesPath,
            'certificates' => $attestationsPath,
            'cv' => $cvPath,
        ]);

        // Si tout va bien, on valide la transaction
        DB::commit();

        // Retour avec un message de succès
        return redirect()->back()->with('success', 'Votre candidature a été soumise avec succès.');

    } catch (\Exception $e) {
        // En cas d'erreur, on annule la transaction
        DB::rollBack();

        // Affiche l'erreur
        dd('Error: ' . $e->getMessage());
    }
}


}
