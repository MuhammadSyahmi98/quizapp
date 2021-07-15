<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 
        'quiz_id',
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function storeQuestion($data){
        $data['quiz_id'] = $data['quiz'];
        return Question::create($data);
    }

    public function updateQuestion($id, $request){
        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->quiz_id = $request->quiz;
        $question->save();
        return $question;
    }

    public function deleteQuestion($id){
        Question::where('id', $id)->delete();
    }

    
}
