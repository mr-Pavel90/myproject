<?php

namespace App\Http\Controllers;

use App\Models\NutritionItem;

class MagazineController extends Controller
{
    public function index()
    {
        $items = NutritionItem::with(['category', 'tags'])->get();

        return view('magazine', compact('items'));
    }
}
