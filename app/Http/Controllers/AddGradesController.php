<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradesRequest;
use App\Repositories\GradesRepos;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AddGradesController extends Controller
{
    protected $Grades;

    public function __construct(GradesRepos $gradesRepo)
    {
        $this->Grades = $gradesRepo;
    }

    public function AddGrades(GradesRequest $request): RedirectResponse
    {
        return $this->Grades->AddGrades($request);
    }

    public function showForm(): View
    {
        $grades = $this->Grades->ShowForm();
        return view('AddGrades', compact('grades'));
    }
}
