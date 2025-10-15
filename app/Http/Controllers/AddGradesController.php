<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradesRequest;
use App\Repositories\GradesRepos;

class AddGradesController extends Controller
{
    protected $Grades;

    public function __construct(GradesRepos $gradesRepo)
    {
        $this->Grades = $gradesRepo;
    }

    public function AddGrades(GradesRequest $request)
    {
        return $this->Grades->AddGrades($request);
    }

    public function showForm()
    {
        $grades = $this->Grades->ShowForm();
        return view('AddGrades', compact('grades'));
    }
}
