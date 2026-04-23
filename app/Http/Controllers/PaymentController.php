<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        // On récupère les éléments pour calculer le total
        $items = Video::all();
        $total = $items->sum('prix');
        
        if($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('payment.index', compact('total'));
    }

    public function process(Request $request)
    {
        Video::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->update(['status' => 'paid']);

        return view('payment.success');
    }   
}