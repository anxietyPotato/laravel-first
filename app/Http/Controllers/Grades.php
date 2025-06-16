<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Grades extends Controller
{

    public function seeGrades() {
        $validated = $request->validate([
            'Class' => 'required|string',
            'Profesor' => 'required|string',
            'Grades' => 'required|integer|min:1|max:5',
            
        ]);
}}
