<?php

namespace App\Models;

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
        # code...
        return $this->hasMany(Question::class);
    }

    public function storeQuiz($data){
        return Quiz::create($data);
    }

    public function updateQuiz($data, $id){
        return Quiz::findOrFail($id)->update($data);
    }
}
