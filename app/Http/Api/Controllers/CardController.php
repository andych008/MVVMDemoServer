<?php

namespace App\Http\Api\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class CardController extends Controller
{


    public function __construct()
    {
//        $this->middleware('auth.basic');
//        $this->middleware('jwt.auth', ['except' => ['hello']]);
    }


    public function hello()
    {
        return 'hello';
    }

    public function index(Request $request)
    {
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
