<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizzes = Quiz::latest()->get();
        return view('backend.quiz.index', ['quizzes' =>$quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quiz.create');
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

        $quiz = (new Quiz)->storeQuiz($data);

        return redirect(route('quiz-index'))->with('message', 'Quiz created successfuly');
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
        $quiz = Quiz::findOrFail($id);

        return view('backend.quiz.edit', ['quiz'=>$quiz]);
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
        //
        $data = $this->validateForm($request);

        $quiz = (new Quiz)->updateQuiz($data, $id);

        return redirect(route('quiz-index'))->with('message', 'Quiz updated successfuly');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $quiz = Quiz::findOrFail($id);

        $quiz->delete();

        return redirect(route('quiz-index'))->with('message', 'Success delete quiz');

    }


    public function validateForm($request){
        return $this->validate($request, [
            'name'=>'required|string',
            'description'=>'required|min:3|max:500',
            'minutes'=>'required|integer',
        ]);
    }
}
