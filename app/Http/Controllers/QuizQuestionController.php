<?php

namespace App\Http\Controllers;

use App\Models\Mcqchoices;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class QuizQuestionController extends Controller
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
        return view('quizz');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = new QuizQuestion();
        $data->quiz_id = $request->quiz_id;
        $data->QuestionText = $request->QuestionText;
        $data->IsMCQ = $request->has('IsMCQ');
        $data->IsTrueFalse = $request->has('IsTrueFalse');
        $data->IsFreeText = $request->has('IsFreeText');


        $data->QuestionGrade = $request->input('QuestionGrade', null);


        $data->save();


        if ($data->IsMCQ) {
            return redirect()->route('MCQChoice.create', ['question_id' => $data->id, 'quiz_id' => $data->quiz_id]);
        } elseif ($data->IsTrueFalse) {
            return redirect()->route('TrueFalse.create', ['question_id' => $data->id]);
        } elseif ($data->IsFreeText) {
            return redirect()->route('FreeText.create', ['question_id' => $data->id]);
        }


        return redirect()->route('defaultView');
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
    public function edit($id)
    {
        $data = QuizQuestion::with(['mcqChoices', 'trueFalseAnswer', 'freeTextAnswer'])->find($id);
        $mcqChoices = Mcqchoices::where('question_id', $id)->get();
        return view('editQuiz')->with(['myeditdata' => $data, 'mcqChoices' => $mcqChoices]);
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
    public function destroy(Request $request, $question_id)
    {
        $question = QuizQuestion::findOrFail($question_id);

        $question->delete();

        return redirect()->back()->with('success', 'Question deleted successfully');
    }


    public function loadQuestionTypeView(Request $request)
    {
        $questionType = $request->input('type');

        switch ($questionType) {
            case 'mcq':
                return View::make('create_mcq');
            case 'truefalse':
                return View::make('create_truefalse');
            case 'freetext':
                return View::make('create_freetext');
            default:
                return response()->json(['error' => 'Invalid question type.']);
        }
    }
}
