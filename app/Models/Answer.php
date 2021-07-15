<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer',
        'is_correct',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function storeAnswers($data, $question){
     
        foreach($data['options'] as $key => $option){
            $is_correect = false;
            if($key == $data['correct_answer']){
                $is_correect = true;
            }
            $answer = Answer::create([
                'question_id' => $question->id,
                'answer'=>$option,
                'is_correct'=>$is_correect
            ]);
        }
    }

    public function updateAnswers($data, $question){
        $this->deleteAnswers($question->id);
        $this->storeAnswers($data, $question);

    }

    public function deleteAnswers($questionID){
        Answer::where('question_id', $questionID)->delete();
    }

    public function deleteAsnwers2($id){
        Answer::where('question_id', $id)->delete();
    }
}
