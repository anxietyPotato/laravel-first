<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use Illuminate\Support\Facades\Auth; //


class AddGradesController extends Controller
{


    public function AddGrades(Request $request)
    {
        $validated = $request->validate([
            'Class' => 'required|string',
            'Profesor' => 'required|string',
            'Grade' => 'required|integer|min:1|max:5',
        ]);

        $validated['user_id'] = Auth::check() ? Auth::id() : null;
        Grades::create($validated);





        return redirect('/')->with('success', 'Grade added successfully!');
    }


    public function showForm()
    {
        $grades = Grades::all();

        return view('AddGrades', compact('grades'));

    }

}
