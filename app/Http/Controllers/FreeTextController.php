<?php

namespace App\Http\Controllers;

use App\Models\FreetextAnswers;
use Illuminate\Http\Request;

class FreeTextController extends Controller
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
        return view('create_freetext');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
  {
      $request->validate([
          'question_id' => 'required|exists:quiz_questions,id', // Validate that question_id exists in the quiz_questions table
          'AnswerText' => 'required|string', // Validate that AnswerText is a non-empty string
      ]);

      $data = new FreetextAnswers();
       $data->question_id = $request->question_id;
       $data->AnswerText = $request->AnswerText;
       $data->save();
       $quizId = $data->question->quiz_id;

       return redirect()->route('QuizQuestions.create',['quiz_id' => $quizId]);
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
