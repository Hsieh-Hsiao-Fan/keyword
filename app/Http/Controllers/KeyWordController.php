<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\SearchEngineService as SearchEngineServiceInterface;
use App\Http\Requests\CreateObjectRequest;
use App\Http\Requests\SearchObjectRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class KeyWordController extends Controller
{
    public function index(Request $request, $uuid)
    {
        return view('keyWord', ['name' => 'T970', 'count' => 50, 'uuid' => $uuid]);
    }

    public function store(Request $request, $uuid)
    {

        dd($request->all(), $uuid);
    }
}
