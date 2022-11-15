<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function show($examId)
    {
        $data['exam'] = Exam::findOrFail($examId);


        $user = Auth::user();
        $data['canViewStartBtn']= true;
        if ($user !== null) {
            $pivotRow = $user->exams()->active()->where('exam_id', $examId)->first();
            if ($pivotRow !== null and $pivotRow->pivot->status == 'closed') {
                $data['canViewStartBtn']= false;
                $data['showScore'] = ceil($pivotRow->pivot->score) ;
            }
        }


        return view('web.exams.show')->with($data);
    }

    public function start($examId , Request $request)
    {

        $user = Auth::user();
        if (! $user->exams->contains($examId)) {
            $user->exams()->attach($examId);
        }else {
            $user->exams()->updateExistingPivot($examId ,[
                'status' => 'closed'
            ]);
        }
        $request->session()->flash('prev' , "start/$examId");


        return redirect(url("exams/questions/{$examId}"));
    }

    public function questions($examId , Request $request)
    { 
        if (session('prev') !== "start/$examId") {
            
          return  redirect(url("exams/show/{$examId}"));
        }
        $data['exam'] = Exam::findOrFail($examId);
        $request->session()->flash('prev' , "questions/$examId");

        return view('web.exams.questions')->with($data);
    }

    public function submit($examId , Request $request)
    {

        if (session('prev') !== "questions/$examId") {
            
            return  redirect(url("exams/show/{$examId}"));
        }

        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|in:1,2,3,4'
        ]);

        //Calculate Score

        $points = 0;

        $exam = Exam::findOrFail($examId);
        $totalQuetionsNum = $exam->questions->count();
        foreach ($exam->questions as $question) {
            if (isset($request->answers[$question->id])) {
                $userAnswer = $request->answers[$question->id];
                $rightAnswer = $question->right_answer;
                if ($userAnswer == $rightAnswer) {
                    $points ++ ;
                }
            }
        }
        $score = ($points / $totalQuetionsNum) * 100 ;

        //Calculate Time Mins
        $user = auth()->user();
        $pivotRow = $user->exams()->active()->where('exam_id' , $examId)->first();
        $startTime = $pivotRow->pivot->created_at;
        $submitTime = now();

        $timeMin = $submitTime->diffInMinutes($startTime);

        //if ($timeMin > $exam->duration_mins) {
        //    $score = 0;
        //};
        
        //Update pivot table
        $user->exams()->updateExistingPivot($examId , [
            'score' => $score,
            'time_mins' => $timeMin
        ]);


        $request->session()->flash("success" , "You Passed the exam successfully with score $score");
        return redirect(url("exams/show/$examId"));

    }
    

}
