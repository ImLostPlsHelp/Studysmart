<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function show(Course $course)
    {
        // Logika untuk menampilkan sertifikat
        return view('Studysmart.certificate.show', compact('course'));
    }
}
