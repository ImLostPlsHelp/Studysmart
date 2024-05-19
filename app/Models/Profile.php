<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function show($id)
    {
        $user = User::findOrFail($id);
        $completedCourses = $user->completedCourses;

        return view('profile.show', compact('user', 'completedCourses'));
    }
}