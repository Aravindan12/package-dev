<?php

namespace App\Http\Controllers;

use App\Http\Requests\test1Request;
use App\Models\test1;

class test1Controller extends Controller
{
    public function index()
    {
        $test1s = test1::latest()->get();

        return response()->json($test1s);
    }

    public function store(test1Request $request)
    {
        $test1 = test1::create($request->all());

        return response()->json($test1, 201);
    }

    public function show($id)
    {
        $test1 = test1::findOrFail($id);

        return response()->json($test1);
    }

    public function update(test1Request $request, $id)
    {
        $test1 = test1::findOrFail($id);
        $test1->update($request->all());

        return response()->json($test1, 200);
    }

    public function destroy($id)
    {
        test1::destroy($id);

        return response()->json(null, 204);
    }
}