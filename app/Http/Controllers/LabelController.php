<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Symfony\Component\HttpFoundation\Response;

class LabelController extends Controller
{
    public function index()
    {
        return auth()->user()->labels;
    }

    public function store(LabelRequest $request)
    {
        return auth()->user()
            ->labels()
            ->create($request->validated());
    }

    public function update(Label $label, LabelRequest $request)
    {
        $label->update($request->validated());

        return response($label, Response::HTTP_OK);
    }

    public function destroy(Label $label)
    {
        $label->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
