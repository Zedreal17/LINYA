<?php

namespace App\Http\Controllers;

use id;
use App\Models\Announcement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function stored(Request $request)
    {
        $data = $request->validate([
            'announcement-details' => 'required',
            'date_posted' => 'required',
            'date_until' => 'required',
            'announcement-status' => 'required',
        ]);
        $data['announcement-details'] = strip_tags($data['announcement-details']);
        $data['date_posted'] = strip_tags($data['date-posted']);
        $data['date_until'] = strip_tags($data['date-until']);
        $data['announcement_status'] = strip_tags($data['announcement-status']);
        $data['user_id'] = auth()->id();
        Announcement::create($data);

        return redirect()->route('product.index');
    }

    
}
