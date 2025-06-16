<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Grades extends Controller
{

    public function seeGrades() {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
        ]);
}}
