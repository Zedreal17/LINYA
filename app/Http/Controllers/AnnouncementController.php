<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
    // Retrieve announcements in descending order by created_at (newest first)
    $posts = Announcement::orderBy('created_at', 'desc')->get();
    return view('announcement', compact('posts'));
    }


    public function stored(Request $request)
    {
        $data = $request->validate([
            'announcement_details' => 'required',
            'date_posted' => 'required',
            'date_until' => 'required',
            'announcement_status' => 'required',
        ]);

        // If you still want to strip tags, you can do it like this:
        $data['announcement_details'] = strip_tags($data['announcement_details']);
        $data['date_posted'] = strip_tags($data['date_posted']);
        $data['date_until'] = strip_tags($data['date_until']);
        $data['announcement_status'] = strip_tags($data['announcement_status']);
        $data['user_id'] = auth()->id();

        Announcement::create($data);

        // Add a redirect or any other logic you need after creating the announcement
        return redirect('/announcement');
    }

    public function updateAnnouncement(Request $request, $id)
    {
        // Validate and process the request
        $request->validate([
            'announcement_status' => 'required|string|in:ARCHIVE',
            // Add other validation rules as needed
        ]);

        // Update the record in the database
        $announcement = Announcement::findOrFail($id);
        $announcement->update(['announcement_status' => $request->input('announcement_status')]);

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Announcement archived successfully');
    }
}
