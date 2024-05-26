<?php

// app/Http/Controllers/CertificateController.php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function show($course)
    {
        // Perform your logic here. For example, fetching course details or generating a certificate.
        // Assuming course information is being fetched for display:
        $courseDetails = Course::find($course);
        if (!$courseDetails) {
            return redirect()->back()->withErrors(['Course not found.']);
        }

        // Pass the course details to the view
        return view('certificate.show', compact('courseDetails'));
    }
}

