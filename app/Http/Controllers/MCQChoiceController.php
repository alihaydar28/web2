<?php

namespace App\Http\Controllers;

use App\Models\Mcqchoices;
use Illuminate\Http\Request;

class MCQChoiceController extends Controller
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
        return view('create_mcq');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'question_id' => 'required',
        ]);

        $mcqChoice1 = new Mcqchoices();
        $mcqChoice1->question_id = $request->question_id;
        $mcqChoice1->ChoiceText = $request->ChoiceText1;
        $mcqChoice1->IsCorrect = $request->has('IsCorrect1');
        $mcqChoice1->save();
        $quizId = $mcqChoice1->question->quiz_id;

        $mcqChoice2 = new Mcqchoices();
        $mcqChoice2->question_id = $request->question_id;
        $mcqChoice2->ChoiceText = $request->ChoiceText2;
        $mcqChoice2->IsCorrect = $request->has('IsCorrect2');
        $mcqChoice2->save();
        $quizId = $mcqChoice2->question->quiz_id;

        $mcqChoice3 = new Mcqchoices();
        $mcqChoice3->question_id = $request->question_id;
        $mcqChoice3->ChoiceText = $request->ChoiceText3;
        $mcqChoice3->IsCorrect = $request->has('IsCorrect3');
        $mcqChoice3->save();
        $quizId = $mcqChoice3->question->quiz_id;
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

    public function destroy(Request $request, $choice_id)
    {
        $mcqChoice = Mcqchoices::findOrFail($choice_id);

        $mcqChoice->delete();

        return redirect()->back()->with('success', 'MCQ choice deleted successfully');
    }
}

