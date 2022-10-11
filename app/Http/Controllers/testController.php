<?php

namespace App\Http\Controllers;

use App\Http\Requests\testRequest;
use App\Models\test;

class testController extends Controller
{
    public function index()
    {
        $tests = test::latest()->get();

        return response()->json($tests);
    }

    public function store(testRequest $request)
    {
        $test = test::create($request->all());

        return response()->json($test, 201);
    }

    public function show($id)
    {
        $test = test::findOrFail($id);

        return response()->json($test);
    }

    public function update(testRequest $request, $id)
    {
        $test = test::findOrFail($id);
        $test->update($request->all());

        return response()->json($test, 200);
    }

    public function destroy($id)
    {
        test::destroy($id);

        return response()->json(null, 204);
    }
}