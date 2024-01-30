<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // You can also save the image path in your database if needed
            // Example: $imagePath = 'images/' . $imageName;
            // Now, save $imagePath to your database
            return 'Image uploaded successfully!';
        } else {
            return 'No image provided.';
        }
    }
}
