<?php

namespace App\Http\Controllers;
use App\Models\Cv;
use App\Models\Job;
use Illuminate\Http\Request;

class CvController extends Controller
{
    //

    public function storeCv(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenoms' => 'required|string|max:255',
        'email' => 'required|email|unique:cvs,email',
        'genre' => 'required|string',
        'adresse' => 'required|string',
        'domaine' => 'required|string',
        'sous_domaine' => 'required|string',
        'img' => 'nullable|mimes:pdf,doc,docx|max:10240', // Accepte PDF et Word jusqu'à 10MB
    ]);

    // Sauvegarde du fichier, s'il y en a un
    if ($request->hasFile('img')) {
        $path = $request->file('img')->store('cv_files', 'public');
    }

    // Création du CV dans la base de données
    $cv = Cv::create([
        'nom' => $validated['nom'],
        'prenoms' => $validated['prenoms'],
        'email' => $validated['email'],
        'genre' => $validated['genre'],
        'adresse' => $validated['adresse'],
        'domaine' => $validated['domaine'],
        'sous_domaine' => $validated['sous_domaine'],
        'file_path' => $path ?? null, // Chemin du fichier, si présent
    ]);

    return redirect()->route('admin.cvform')->with('success', 'CV enregistré avec succès!');
}

public function cvlist(){
        $totalPersons = Cv::count();
        $totalJobs = Job::count();
        $totalImprovedCvs = Cv::whereNotNull('file_path')->count();

    $cvs = Cv::all();
    return view('admin.cvlist', compact('cvs','totalPersons', 'totalJobs', 'totalImprovedCvs'));
}
public function cvform(){
    $totalPersons = Cv::count();
    $totalJobs = Job::count();
    $totalImprovedCvs = Cv::whereNotNull('file_path')->count();
    return view('admin.addcv', compact('totalPersons', 'totalJobs', 'totalImprovedCvs'));
}
public function searchCv(Request $request)
    {
        $query = $request->input('query');

        $cvs = Cv::where('nom', 'LIKE', "%{$query}%")
            ->orWhere('prenoms', 'LIKE', "%{$query}%")
            ->orWhere('domaine', 'LIKE', "%{$query}%")
            ->orWhere('sous_domaine', 'LIKE', "%{$query}%")
            ->get();

        return view('admin.cvlist', compact('cvs', 'query', 'cvs','totalPersons', 'totalJobs', 'totalImprovedCvs'));
    }




}
