<?php

namespace App\Http\Controllers;

use App\Models\test2;

class test2Controller extends Controller
{
    public function index()
    {
        $test2s = test2::latest()->get();

        return response()->json($test2s);
    }

    public function store(test2Request $request)
    {
        $test2 = test2::create($request->all());

        return response()->json($test2, 201);
    }

    public function show($id)
    {
        $test2 = test2::findOrFail($id);

        return response()->json($test2);
    }

    public function update(test2Request $request, $id)
    {
        $test2 = test2::findOrFail($id);
        $test2->update($request->all());

        return response()->json($test2, 200);
    }

    public function destroy($id)
    {
        test2::destroy($id);

        return response()->json(null, 204);
    }

    public function view()
    {
        return view('test2s');
    }
}