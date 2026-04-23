<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $selectedType = $request->query('type', 'Cultural Trip'); 
        return view('videos.index', compact('selectedType'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string',
        ]);

        Video::create([
            'titre' => $request->titre,
            'type' => $request->type,
            'description' => $request->description,
            'prix' => 49.99,
            'user_id' => Auth::id(), // Linking to the logged-in user
            'status' => 'pending',   // Starts as pending in the cart
        ]);

        return redirect()->route('cart.index')->with('success', 'Added to cart successfully!');
    }

    /**
     * Display the paid journeys for the current user.
     */
    public function myVideos()
    {
        $videos = Video::where('user_id', Auth::id())
                       ->where('status', 'paid')
                       ->get();

        return view('videos.my_videos', compact('videos'));
    }
}