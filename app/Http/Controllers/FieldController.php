<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exercise $exercise)
    {
        return view('fields.index', ['exercise' => $exercise]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exercise $exercise)
    {
        //
        return view('fields.create', ['exercise' => $exercise, 'value_kind_cases' => (new Field())->getCasts()['value_type']::cases()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Exercise $exercise)
    {
        //
        $field = new Field();
        $field->label = $request->label;
        $field->value_type = $request->value_type;
        $field->exercise_id = $exercise->id;

        $field->save();

        return back()->with('message', 'Le nouveau field a été créé !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise, Field $field)
    {
        $field = $field->find($field->id);
        return view('fields.update', ['exercise' => $exercise, 'field' => $field]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise, Field $field)
    {
        //
        $validate = $request->validate([
            'label' => 'required|max:255',
            'value_type' => 'required',
        ]);

        $field->label = $validate['label'];
        $field->value_type = $validate['value_type'];

        $field->save();

        return back()->with('message', 'Le champs a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise, Field $field)
    {
        $field->delete();
        return back()->with('success', 'Le field a bien été supprimé');
    }
}
