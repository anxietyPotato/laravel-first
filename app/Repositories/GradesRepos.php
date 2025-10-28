<?php

namespace App\Repositories;

use App\Http\Requests\GradesRequest;
use App\Models\Grades;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GradesRepos {
    private $Grades;

    public function __construct(Grades $Grades)
    {
        $this->Grades = $Grades;
    }

    public function AddGrades(GradesRequest $request) : RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::check() ? Auth::id() : null;

        Grades::create($validated);

        return redirect('/')->with('success', 'Grade added successfully!');
    }

    public function ShowForm(): Collection
    {
        return $this->Grades->all();
    }
}
