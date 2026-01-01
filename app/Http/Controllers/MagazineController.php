<?php

namespace App\Http\Controllers;

use App\Models\NutritionItem;
use App\Models\Purchase;
use App\Mail\PurchaseMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MagazineController extends Controller
{
    public function index()
    {
        $items = NutritionItem::with(['category', 'tags'])->get();

        return view('magazine', compact('items'));
    }

    public function buy(NutritionItem $item)
    {
        $user = Auth::user();

        DB::transaction(function () use ($user, $item) {
            Purchase::create([
                'user_id' => $user->id,
                'nutrition_item_id' => $item->id,
            ]);

            Mail::to($user->email)
                ->send(new PurchaseMail($item));
        });

        return back()->with('success', 'Purchase completed!');
    }
}
