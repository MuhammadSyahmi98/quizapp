<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Question::orderBy('created_at')->with('quiz')->paginate(5);
  

        return view('backend.question.index', ['questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $quizes = Quiz::get();
        return view('backend.question.create', ['quizes' => $quizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validateForm($request);
        
        $question = (new Question)->storeQuestion($data);
        // $question =true;

        $answer = (new Answer)->storeAnswers($data, $question);

        return redirect(route('question-create'))->with('message', 'Question created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $question = Question::findOrFail($id);
        return view('backend.question.show', ['question'=>$question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $quizes = Quiz::get();
        $question = Question::with('answers')->findOrFail($id);
        return view('backend.question.edit', ['question'=>$question, 'quizes'=>$quizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       

        $data = $this->validateForm($request);

        $question = (new Question)->updateQuestion($id, $request);
        $answers = (new Answer)->updateAnswers($data, $question);

        return redirect()->route('question-show', $id)->with('message', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Answer)->deleteAsnwers2($id);
        (new Question)->deleteQuestion($id);
        
        return redirect(route('question-index'))->with('message', 'Question deleted successfully');
    }

    public function validateForm($request){
        return $this->validate($request,[
            'quiz'=>'required',
            'question'=>'required',
            'options'=>'required|array|min:3',
            // 'options.*'=>'required|string|distinct',
            'correct_answer'=>'required',
        ]);
    }
}
