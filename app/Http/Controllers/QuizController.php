<?php

namespace App\Http\Controllers;

use App\Models\FreetextAnswers;
use App\Models\Mcqchoices;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\TruefalseAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class QuizController extends Controller
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
        return view('quiz');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'class_id' => 'required|exists:course_classes,id',
            'QuizTitle' => 'required|string|max:255',
            'QuizDescription' => 'nullable|string',
            'QuizDateAndTime' => 'required|date',
            'QuizDurationMin' => 'required|integer|min:1',
        ]);

        $data=new Quiz();
        $data->class_id=$request->class_id;
        $data->QuizTitle=$request->QuizTitle;
        $data->QuizDescription=$request->QuizDescription;
        $data->QuizDateAndTime=$request->QuizDateAndTime;
        $data->QuizDurationMin=$request->QuizDurationMin;
        $data->save();
        $quizId = $data->id;
        return redirect(route('QuizQuestions.create', ['quiz_id' => $quizId]));
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
    public function edit($quiz_id)
    {
        $data = Quiz::with('questions', 'questions.mcqChoices', 'questions.trueFalseAnswer', 'questions.freeTextAnswer')->find($quiz_id);

        return view('editQuiz')->with('myeditdata', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    // QuizController.php
    public function update(Request $request, $quiz_id)
    {
        $request->validate([
            'QuizTitle' => 'required|string|max:255',
            'QuizDescription' => 'nullable|string',
            'QuizDateAndTime' => 'required|date',
            'QuizDurationMin' => 'required|integer|min:1',
        ]);

        $quiz = Quiz::findOrFail($quiz_id);
        $quiz->update([
            'QuizTitle' => $request->input('QuizTitle'),
            'QuizDescription' => $request->input('QuizDescription'),
            'QuizDateAndTime' => $request->input('QuizDateAndTime'),
            'QuizDurationMin' => $request->input('QuizDurationMin'),
        ]);

        foreach ($request->input('questions', []) as $questionId => $questionData) {
            $question = QuizQuestion::findOrFail($questionId);
            $question->update([
                'QuestionText' => $questionData['QuestionText'],
            ]);
            if ($question->IsMCQ) {
                $mcqChoicesData = $questionData['mcq_choices'] ?? [];

                foreach ($mcqChoicesData as $choiceId => $choiceData) {
                    $mcqChoice = Mcqchoices::updateOrCreate(
                        ['id' => $choiceId, 'question_id' => $question->id],
                        [
                            'ChoiceText' => is_array($choiceData) && isset($choiceData['ChoiceText']) ? $choiceData['ChoiceText'] : '',
                            'IsCorrect' => is_array($choiceData) && isset($choiceData['isCorrect']) ? (bool)$choiceData['isCorrect'] : false,
                        ]
                    );
                }
            } elseif ($question->IsTrueFalse) {
                $trueFalseAnswerData = $questionData['true_false_answer'] ?? [];

                $trueFalseAnswer = TruefalseAnswers::updateOrCreate(
                    ['question_id' => $question->id],
                    ['IsTrue' => !empty($trueFalseAnswerData['IsTrue'])]
                );
            } elseif ($question->IsFreeText) {
                $freeTextAnswerData = $questionData['free_text_answer'] ?? [];

                $freeTextAnswer = FreetextAnswers::updateOrCreate(
                    ['question_id' => $question->id],
                    ['AnswerText' => $freeTextAnswerData['AnswerText'] ?? '']
                );
            }
        }


        return redirect()->route('Teacher.index')
            ->with('success', 'Quiz updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);

        $quiz->delete();

        return redirect()->route('Teacher.index')
            ->with('success', 'Quiz deleted successfully');
    }


}
