<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;

class SkillController extends Controller
{
    public function show($id){

        $data['skill']= Skill::findOrFail($id);
        $data['exams']= $data['skill']->exams()->active()->paginate(8);
        return view('web.skills.show')->with($data);

    }


}
