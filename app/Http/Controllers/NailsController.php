<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nail;
use App\Services\NailService;

class NailsController extends Controller
{
    protected $nailService;

    public function __construct(NailService $nailService)
    {
        $this->nailService = $nailService;
    }
    public function index()
    {
        $nails = Nail::all();
        return view('nails', compact('nails'));
    }

    public function getUsersNails()
    {
        [$topUserData, $topUserCount] = $this->nailService->getTopUser();

        return view('user-nails', [
            'topUserData' => $topUserData,
            'topUser'     => $topUserCount,
        ]);
    }   
}
