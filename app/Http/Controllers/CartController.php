<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // For now, we fetch all videos. Later, we can filter by user_id
        $items = Video::all(); 
        $total = $items->sum('prix');
        
        return view('cart.index', compact('items', 'total'));
    }

    public function destroy($id)
    {
        $item = Video::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}