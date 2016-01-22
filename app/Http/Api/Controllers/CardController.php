<?php

namespace App\Http\Api\Controllers;

use App\Card;
use App\Http\Requests;
use Illuminate\Http\Request;

class CardController extends Controller
{


    public function __construct()
    {
//        $this->middleware('auth.basic');
        $this->middleware('jwt.auth', ['except' => ['hello', 'index']]);
    }


    public function hello()
    {
        return 'hello';
    }

    public function index(Request $request)
    {
//        dd('index ...');
        return Card::all();
    }

    public function show(Request $request, $id)
    {
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request, $id)
    {
    }

    private function checkInputs($request)
    {
    }
}
