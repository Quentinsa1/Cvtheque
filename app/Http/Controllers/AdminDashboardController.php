<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use App\Models\Job;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPersons = Cv::count(); 
        $totalJobs = Job::count();
        $totalImprovedCvs = Cv::whereNotNull('file_path')->count();

        return view('admin.dashboard', compact('totalPersons', 'totalJobs', 'totalImprovedCvs'));
    }
}
