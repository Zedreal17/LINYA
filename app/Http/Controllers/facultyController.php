<?php

namespace App\Http\Controllers;

use App\Models\FacultyInformation;
use Illuminate\Http\Request;

class facultyController extends Controller
{
    public function index()
    {

        return view('facultyInfo');
    }
    public function stored(Request $request)
    {
        $data = $request->validate([
            'facultyName' => 'required|string',
            'facultyContact' => 'required|numeric',
            'facultyStatus' => 'required|string',
        ]);
        $data['facultyName'] = strip_tags($data['facultyName']);
        $data['facultyContact'] = strip_tags($data['facultyContact']);
        $data['facultyStatus'] = strip_tags($data['facultyStatus']);

        FacultyInformation::create($data);

        return redirect('/facultyinfo');
    }
}
