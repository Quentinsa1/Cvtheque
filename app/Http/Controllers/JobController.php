<?php

namespace App\Http\Controllers;
use App\Models\Cv;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use OpenAI;
use Carbon\Carbon;

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
            'candidate_name' => 'required|string',
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

        $application = Application::create([
            'job_id' => $job_id,
            'poste' => $validated['poste'],
            'candidate_name' => $validated['candidate_name'],
            'date_of_birth' => $validated['date_naissance'],
            'nationality' => $validated['nationalite'],
            'education' => $validated['formation'],
            'experience' => $validated['experience'],
            'languages' => $validated['langues'],
            'projects' => $validated['projet'],
            'id_card' => $pieceIdentitePath,
            'diplomas' => $diplomesPath,
            'certificates' => $attestationsPath,
            'cv' => $cvPath,
            'societe' => $request->input('societe', null), // Ajout de la valeur avec NULL par défaut
        ]);


        DB::commit();

        return redirect()->back()->with('success', 'Votre candidature a été soumise avec succès.');

    } catch (\Exception $e) {
        DB::rollBack();
        dd('Error: ' . $e->getMessage());
    }
}

public function showApplicants($id)
{
    $totalPersons = Cv::count();
    $totalJobs = Job::count();
    $totalImprovedCvs = Cv::whereNotNull('file_path')->count();
    $jobs = Job::all();
    $job = Job::findOrFail($id);
    $applicants = Application::where('job_id', $id)->get();

    return view('admin.applicants', compact('job', 'applicants', 'totalPersons', 'totalJobs', 'totalImprovedCvs'));
}

public function generateCv($id)
{
    $applicant = Application::findOrFail($id);

    // Récupère les données de la candidature
    $data = [
        'name' => $applicant->candidate_name,
        'date_of_birth' => $applicant->date_of_birth,
        'nationality' => $applicant->nationality,
        'education' => $applicant->education,
        'experience' => $applicant->experience,
        'languages' => $applicant->languages,
        'projects' => $applicant->projects,
        'poste' => $applicant->poste,
        'societe' => $applicant->societe,
    ];

    // Crée le PDF en utilisant la vue 'admin.cv_template'
    $pdf = Pdf::loadView('admin.cv_template', $data);

    // Télécharge le CV généré
    return $pdf->download('CV_Type_' . $applicant->candidate_name . '.pdf');
}

public function showOptimizeForm()
    {
        $cvs = CV::all();
        $totalPersons = Cv::count();
        $totalJobs = Job::count();
        $totalImprovedCvs = Cv::whereNotNull('file_path')->count();
        return view('admin.optimize_cv', compact('cvs',  'totalPersons', 'totalJobs', 'totalImprovedCvs'));
    }

    public function optimizeCV(Request $request)
    {
        $request->validate([
            'cv_id' => 'required|exists:cvs,id',
            'job_offer' => 'required|string',
        ]);

        $cv = CV::find($request->cv_id);
        $offer = $request->job_offer;

        // Appel à l'API OpenAI
        $optimizedCV = $this->generateOptimizedCV($cv->content, $offer);

        // Sauvegarde du CV optimisé
        $cv->optimized_content = $optimizedCV;
        $cv->save();

        return view('optimized_cv', compact('cv'));
    }

    private function generateOptimizedCV($cvContent, $jobOffer)
    {
        $openai = OpenAI::client(env('OPENAI_API_KEY'));

        $response = $openai->chat()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'Tu es un expert en optimisation de CV. Reformule le CV en fonction de l\'offre d\'emploi en mettant en avant les compétences pertinentes.'],
                ['role' => 'user', 'content' => "CV : $cvContent\n\nOffre : $jobOffer"],
            ],
        ]);

        return $response['choices'][0]['message']['content'] ?? 'Erreur lors de l\'optimisation.';
    }

    public function downloadCV($id)
    {
        $cv = CV::findOrFail($id);
        $pdf = PDF::loadView('cv_pdf', compact('cv'));
        return $pdf->download('Optimized_CV.pdf');
    }


    public function testOpenAI()
{
    dd(config('services.openai.api_key'));

    try {
        $client = \OpenAI::client(env('OPENAI_API_KEY'));
        $response = $client->chat()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'Dis simplement "Bonjour"'],
            ],
        ]);

        return response()->json($response['choices'][0]['message']['content']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


}


