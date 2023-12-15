@extends('layouts.app')

@section('content')
    <div class="quiz-questions-container">
        <h1>Create Quiz Questions</h1>

        <form action="{{ route('QuizQuestions.store') }}" method="POST">
            @csrf
            <input type="hidden" name="question_id" value="{{ request('question_id') }}">
            <input type="hidden" name="quiz_id" value="{{ request('quiz_id') }}">

            <label for="QuestionText">Question Text:</label>
            <textarea name="QuestionText" required></textarea>

            <label>Question Type:</label>
            <div>
                <input type="checkbox" id="IsMCQ" name="IsMCQ">
                <label for="IsMCQ">Multiple Choice Question</label>
            </div>
            <div>
                <input type="checkbox" id="IsTrueFalse" name="IsTrueFalse">
                <label for="IsTrueFalse">True/False Question</label>
            </div>
            <div>
                <input type="checkbox" id="IsFreeText" name="IsFreeText">
                <label for="IsFreeText">Free Text Question</label>
            </div>


            <div id="questionTypeContainer">
            </div>

            <button type="button" onclick="addQuestion()">Add Question</button>

            <button type="button" onclick="finishQuiz()">Finish Quiz</button>
        </form>
    </div>

    <script>
        document.getElementById('questionTypeContainer').style.display = 'none'; // Initially hide the container

        function addQuestion() {
            var mcqCheckbox = document.getElementById('IsMCQ');
            var trueFalseCheckbox = document.getElementById('IsTrueFalse');
            var freeTextCheckbox = document.getElementById('IsFreeText');

            var container = document.getElementById('questionTypeContainer');
            container.innerHTML = ''; // Clear previous content

            if (mcqCheckbox.checked) {
                loadView('mcq');
            } else if (trueFalseCheckbox.checked) {
                loadView('truefalse');
            } else if (freeTextCheckbox.checked) {
                loadView('freetext');
            }
        }

        function loadView(type) {
            var url = "{{ route('loadQuestionTypeView') }}?type=" + type;
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('questionTypeContainer').innerHTML = data;
                    document.forms[0].submit();
                });
        }

        function finishQuiz() {
            window.location.href = "{{ route('Teacher.index') }}";
        }
    </script>
@endsection
