<?php

namespace App\Http\Controllers\Admin;

use App\Events\ExamAddedEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Skill;
use Exception;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function index()
    {
        $data['exams'] = Exam::select('id' , 'skill_id' , 'name' , 'img' , 'question_num' , 'active')
        ->orderBy('id' , 'DESC')->paginate(10) ;        
        return view('admin.exams.index')->with($data);
    }

    public function show(Exam $exam)
    {
        $data['exam'] = $exam ;
        return view('admin.exams.show')->with($data);
    }

    public function showQuestions(Exam $exam)
    {
        $data['exam'] = $exam ;
        return view('admin.exams.show-questions')->with($data);
    }

    public function create()
    {
        $data['skills'] = Skill::select('id' , 'name')->get();

        return view('admin.exams.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'required|image|max:2048',
            'skill_id' => 'required|exists:skills,id',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'question_num' => 'required|numeric',
            'difficulty' => 'required|numeric|in:1,2,3,4,5',
            'duration_mins' => 'required|numeric'
        ]);

        $path = Storage::putFile('public/exams' , $request->file('img'));

        $exam =Exam::create([
            "name" => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),

            'img' => $path,

            'skill_id' => $request->skill_id,

            "desc" => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'question_num' => $request->question_num,
            'difficulty' => $request->difficulty,
            'duration_mins' => $request->duration_mins,
            'active' => 0,
        ]);

        $request->session()->flash('prev' , "exam/$exam->id");
        return redirect(url("dashboard/exams/create-questions/{$exam->id}"));
    }

    public function createQuestions(Exam $exam)
    {
        if (session('prev') !== "exam/$exam->id" and  session('current') !== "exam/$exam->id") {
            return redirect(url('dashboard/exams'));
        };
        $data['exam_id'] = $exam->id;
        $data['question_num'] = $exam->question_num;
        return view("admin.exams.create-questions")->with($data);
    }


    public function storeQuestions(Exam $exam , Request $request)
    {
        $request->session()->flash('current' , "exam/$exam->id");

        $request->validate([
            'titles' => 'required|array',
            'titles.*' => 'required|string',
            'option_1s' => 'required|array',
            'option_1s.*' => 'required|string',
            'option_2s' => 'required|array',
            'option_2s.*' => 'required|string',
            'option_3s' => 'required|array',
            'option_3.*' => 'required|string',
            'option_4s' => 'required|array',
            'option_4s.*' => 'required|string',
            'right_anss' => 'required|array',
            'right_anss.*' => 'required|numeric|in:1,2,3,4'
        ]);

        for ($i=0; $i < $exam->question_num ; $i++) { 
            Question::create([
                'exam_id' => $exam->id,
                'title' => $request->titles[$i],
                'option_1' => $request->option_1s[$i],
                'option_2' => $request->option_2s[$i],
                'option_3' => $request->option_3s[$i],
                'option_4' => $request->option_4s[$i],
                'right_answer' => $request->right_anss[$i],
            ]);
        }

        $exam->update([
            'active' => 1
        ]);

        event(new ExamAddedEvent);
        return redirect(url('dashboard/exams'));
    }

    public function createOneQuestion(Exam $exam)
    {
        $data['exam'] = $exam ;
        return view('admin.exams.create-one-question')->with($data);
    }

    public function storeOneQuestion(Request $request , Exam $exam , Question $question)
    {
        $request->validate([
            'title' => 'required|string',
            'option_1' => 'required|string',
            'option_2' => 'required|string',
            'option_3' => 'required|string',
            'option_4' => 'required|string',
            'right_answer' => 'required|numeric|in:1,2,3,4'
        ]);

        $question->create([
            'exam_id' => $exam->id,
            'title' => $request->title,
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'right_answer' => $request->right_answer
        ]);

        $request->session()->flash('msg' , 'Question updated succesfully');

        return redirect(url("dashboard/exams/show-questions/$exam->id"));
    }

    public function edit(Exam $exam)
    {
        $data['exam'] = $exam ;
        $data['skills'] = Skill::select('id' , 'name')->get();

        return view('admin.exams.edit')->with($data);
    }

    public function update(Exam $exam , Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'nullable|image|max:2048',
            'skill_id' => 'required|exists:skills,id',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'difficulty' => 'required|numeric|in:1,2,3,4,5',
            'duration_mins' => 'required|numeric'
        ]);

        $path = $exam->img ;
        if ($request->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile('public/exams' , $request->file('img'));
        }

        $exam->update([
            "name" => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),

            'img' => $path,

            'skill_id' => $request->skill_id,

            "desc" => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'difficulty' => $request->difficulty,
            'duration_mins' => $request->duration_mins,
        ]);

        $request->session()->flash('msg' , 'Exam updated succesfully');

        return redirect(url("dashboard/exams/show/$exam->id"));
    }

    public function editQuestions(Exam $exam , Question $question)
    {
        $data['exam'] = $exam;
        $data['ques'] = $question;

        return view('admin.exams.edit-questions')->with($data);
    }

    public function updateQuestions(Exam $exam , Question $question , Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'option_1' => 'required|string',
            'option_2' => 'required|string',
            'option_3' => 'required|string',
            'option_4' => 'required|string',
            'right_answer' => 'required|numeric|in:1,2,3,4'
        ]);

        $question->update($data);

        $request->session()->flash('msg' , 'Question updated succesfully');

        return redirect(url("dashboard/exams/show-questions/$exam->id"));
    }

    public function toggle(Exam $exam)
    {
        if ($exam->question_num == $exam->questions()->count()) {
            $exam->update([
                'active' => ! $exam->active 
            ]);
        }

        return back();
    }

    public function delete(Exam $exam , Request $request)
    {
        try {
            $path = $exam->img ;
            Storage::delete($path);
            $exam->questions()->delete();
            $exam->delete();
            $Msg = 'Exam deleted successfully';
        } catch (Exception $e) {
            $Msg = 'Can\'t delete this exam';
        }

        $request->session()->flash('msg' , $Msg);

        return back();
    }

    public function deleteOneQuestion(Question $question , Request $request)
    {
        try {
            
            $question->delete();
            $Msg = 'Exam deleted successfully';
        } catch (Exception $e) {
            $Msg = 'Can\'t delete this exam';
        }

        $request->session()->flash('msg' , $Msg);
        

        return back();
    }
}
