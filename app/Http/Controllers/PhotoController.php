<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PhotoController extends Controller
{
    public function create() {
        return Inertia::render('Photos/Create');
    }
}
