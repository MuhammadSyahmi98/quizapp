<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'minutes'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Many to many class
    // Call in blade to access all the data
    public function users(){
        return $this->belongsToMany(User::class, 'quiz_user');
    }

    public function storeQuiz($data){
        return Quiz::create($data);
    }

    public function updateQuiz($data, $id){
        return Quiz::findOrFail($id)->update($data);
    }

    public function assignExam($data){
        $quizId = $data['quiz_id'];
        $quiz = Quiz::find($quizId);
        $userID = $data['user_id'];
        return $quiz->users()->syncWithoutDetaching($userID);

    }
}
