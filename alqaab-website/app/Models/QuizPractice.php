<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizPractice extends DM_BaseModel
{
    use HasFactory;

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }
    /******Get Quiz Category */
    public function getCategory()
    {
        $data = DB::table('interview_types')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function postCategory()
    {
        return $this->belongsTo(InterviewTypes::class, 'category_id');
    }


    public function getRules()
    {
        $rules = array(
            'category_id' => 'required',
            'question'    => 'required|string|max:225|min:2',
            'option_a'    => 'required|string|max:225|min:2',
            'option_b'    => 'required|string|max:225|min:2',
            'option_c'    => 'required|string|max:225|min:2',
            'option_d'    => 'required|string|max:225|min:2',
            'correct_answer' => 'required|string|max:225|min:2',
        );
        return $rules;
    }

    public function storeData(Request $request,$category_id, $question, $option_a, $option_b, $option_c, $option_d, $correct_answer)
    {
       // dd($question,$category_id, $option_a, $option_b, $option_c, $option_d, $correct_answer);
        $quiz =                                new QuizPractice;
        $quiz->category_id                     = $category_id;
        $quiz->question                        = $question;
        $quiz->option_a                        = $option_a;
        $quiz->option_b                        = $option_b;
        $quiz->option_c                        = $option_c;
        $quiz->option_d                        = $option_d;
        $quiz->correct_answer                  = $correct_answer;
        $quiz->status                          = 1;
        $quiz->save();
        return true;
    }

    public function updateData(Request $request, $id,$category_id, $question, $option_a, $option_b, $option_c, $option_d, $correct_answer, $status)
    {
         //dd($question, $option_a, $option_b, $option_c, $option_d, $correct_answer, $status);
        $quiz =                                 QuizPractice::findOrFail($id);
        $quiz->category_id                     = $category_id;
        $quiz->question                        = $question;
        $quiz->option_a                        = $option_a;
        $quiz->option_b                        = $option_b;
        $quiz->option_c                        = $option_c;
        $quiz->option_d                        = $option_d;
        $quiz->correct_answer                  = $correct_answer;
        $quiz->status                          = $status;
        $quiz->save();
        return true;
    }
}
