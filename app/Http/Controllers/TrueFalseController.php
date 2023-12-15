<?php

namespace App\Http\Controllers;

use App\Models\TruefalseAnswers;
use Illuminate\Http\Request;

class TrueFalseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_truefalse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'question_id' => 'required|exists:quiz_questions,id',
            'IsTrue' => 'required|boolean',
        ]);

        $data = new TruefalseAnswers();
        $data->question_id = $request->question_id;
        $data->IsTrue = $request->IsTrue;

        $data->save();
        $quizId = $data->question->quiz_id;
        return redirect()->route('QuizQuestions.create', ['quiz_id' => $quizId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
