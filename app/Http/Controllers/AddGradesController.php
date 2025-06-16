<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;

class AddGradesController extends Controller
{
    public function AddGrades(Request $request)
    {
        $validated = $request->validate([
            'Class' => 'required|string',
            'Profesor' => 'required|string',
            'Grade' => 'required|integer|min:1|max:5',

        ]);

        // Attach the ID of the authenticated user
        $validated['user_id'] = auth()->id();
        Grades::create($validated);

        return redirect('/')->with('success', 'Grade added successfully!');
    }

    public function showForm()
    {
        $grades = Grades::all();

        return view('AddGrades', compact('grades'));
    }
}
