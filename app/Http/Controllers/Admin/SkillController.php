<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Cat;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $data['skills'] = Skill::orderBy('id' , 'DESC')->paginate(10) ;
        $data['cats'] = Cat::select('id' , 'name')->get() ;

        return view('admin.skills.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'required|image|max:2048',
            'cat_id' => 'required|exists:cats,id'
        ]);

        $path = Storage::putFile('public/skills' , $request->file('img'));
        
        Skill::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'img' => $path,
            'cat_id' => $request->cat_id,
        ]);

        $request->session()->flash('msg' , 'Skill added successfully');
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:skills,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'img' => 'nullable|image|max:2024',
            'cat_id' => 'required|exists:cats,id'
        ]);
        $skill = Skill::findOrFail($request->id);
        $path = $skill->img ;

        if ($request->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile('public/skills' , $request->file('img'));
        }


        $skill->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'img' => $path,
            'cat_id' => $request->cat_id,
        ]);

        $request->session()->flash('msg' , 'Category updated successfully');

        return back();
    }


    public function toggle(Skill $skill)
    {
        $skill->update([
            "active" => ! $skill->active 
        ]);

        return back();
    }

    public function delete(Skill $skill , Request $request)
    {
        try {
            $path = $skill->img ;
            Storage::delete($path);
            $skill->delete();
            $Msg = 'Skill deleted successfully';
        } catch (Exception $e) {
            $Msg = "Can't delete this Skill";
        }
        
        $request->session()->flash('msg' , $Msg);

        return back();
    }
}
