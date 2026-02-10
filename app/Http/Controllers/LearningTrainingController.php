<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LearningFAS;
use App\Models\RequestTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningTrainingController extends Controller
{
    public function learning_franchise(Request $request){
        if(request()->route()->getName() == 'learning-franchise.index'){
            $data=LearningFAS::when($request->name, function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->name.'%');
            })->where('learning_user','franchise')->paginate(12);
            return view('admin.learning.frenchise.index',compact('data'));
        }elseif(request()->route()->getName() == 'learning-student.index'){
            $data=LearningFAS::when($request->name, function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->name.'%');
            })->where('learning_user','student')->paginate(12);
            return view('admin.learning.student.index',compact('data'));
        }elseif(request()->route()->getName() == 'learning-agent.index'){
            $data=LearningFAS::when($request->name, function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->name.'%');
            })->where('learning_user','agent')->paginate(12);
            return view('admin.learning.agent.index',compact('data'));
        }
    }
    public function create_learning_franchise(){
        if(request()->route()->getName() == 'learning-franchise.create'){
            return view('admin.learning.frenchise.create');
        }elseif(request()->route()->getName() == 'learning-student.create'){
            return view('admin.learning.student.create');
        }elseif(request()->route()->getName() == 'learning-agent.create'){
            return view('admin.learning.agent.create');
        }
    }
    public function edit_learning_franchise($id){
        if(request()->route()->getName() == 'learning-franchise.edit'){
            $data=LearningFAS::where('learning_user','franchise')->where('id',$id)->first();
            return view('admin.learning.frenchise.edit',compact('data'));
        }elseif(request()->route()->getName() == 'learning-student.edit'){
            $data=LearningFAS::where('learning_user','student')->where('id',$id)->first();
            return view('admin.learning.student.edit',compact('data'));
        }elseif(request()->route()->getName() == 'learning-agent.edit'){
            $data=LearningFAS::where('learning_user','agent')->where('id',$id)->first();
            return view('admin.learning.agent.edit',compact('data'));
        }
    }
    public function store_learning_franchise(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'learning_user' => 'required|string',
            'pdf' => 'nullable|mimes:pdf|max:10240',
            'video' => 'nullable|mimes:mp4,mov,avi|max:10240',
            'youtube_link' => 'nullable|url'
        ]);

        $data = $request->only(['name', 'learning_user', 'pdf', 'video', 'youtube_link']);

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $name = time() . '.' . $pdf->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $pdf->move($destinationPath, $name);
            $data['pdf'] = $name;
        }

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $name = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $video->move($destinationPath, $name);
            $data['video'] = $name;
        }

        LearningFAS::create($data);
        if(request()->route()->getName() == 'learning-franchise.store'){
            return redirect()->route('learning-franchise.index')->with('success', 'Created Successfully');
        }elseif(request()->route()->getName() == 'learning-student.store'){
            return redirect()->route('learning-student.index')->with('success', 'Created Successfully');
        }elseif(request()->route()->getName() == 'learning-agent.store'){
            return redirect()->route('learning-agent.index')->with('success', 'Created Successfully');
        }
    }
    public function update_learning_franchise(Request $request,$id){
        $request->validate([
            'name' => 'required|string',
            'learning_user' => 'required|string',
            'pdf' => 'nullable|mimes:pdf',
            'video' => 'nullable|mimes:mp4,mov,avi',
            'youtube_link' => 'nullable|url'
        ]);

        $data = $request->only(['name', 'learning_user', 'pdf', 'video', 'youtube_link']);

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $name = time() . '.' . $pdf->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $pdf->move($destinationPath, $name);
            $data['pdf'] = $name;
        }

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $name = time() . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi/');
            $video->move($destinationPath, $name);
            $data['video'] = $name;
        }
        LearningFAS::where('id',$id)->update($data);
        if(request()->route()->getName() == 'learning-franchise.update'){
            return redirect()->route('learning-franchise.index')->with('success', 'Created Successfully');
        }elseif(request()->route()->getName() == 'learning-student.update'){
            return redirect()->route('learning-student.index')->with('success', 'Created Successfully');
        }elseif(request()->route()->getName() == 'learning-agent.update'){
            return redirect()->route('learning-agent.index')->with('success', 'Created Successfully');
        }
    }
    public function delete_learning_franchise($id){
        $data = LearningFAS::find($id);
        if($data){
            if($data->pdf){
                $path = public_path('/imagesapi/'.$data->pdf);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            if($data->video){
                $path = public_path('/imagesapi/'.$data->video);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            LearningFAS::find($id)->delete();
            if(request()->route()->getName() == 'learning-franchise.delete'){
                return redirect()->route('learning-franchise.index')->with('success', 'Deleted Successfully');
            }elseif(request()->route()->getName() == 'learning-student.delete'){
                return redirect()->route('learning-student.index')->with('success', 'Deleted Successfully');
            }elseif(request()->route()->getName() == 'learning-agent.delete'){
                return redirect()->route('learning-agent.index')->with('success', 'Deleted Successfully');
            }
        }else{
            if(request()->route()->getName() == 'learning-franchise.delete'){
                return redirect()->route('learning-franchise.index')->with('error','Data not found');
            }elseif(request()->route()->getName() == 'learning-student.delete'){
                return redirect()->route('learning-student.index')->with('error','Data not found');
            }elseif(request()->route()->getName() == 'learning-agent.delete'){
                return redirect()->route('learning-agent.index')->with('error','Data not found');
            }
        }
    }

    public function request_learning_franchise($id)
    {
        $learning= LearningFAS::find($id);
        $user=Auth::user();
        RequestTraining::insert([
            'user_id' => $user->id,
            'name'=>$learning->name,
            'phone'=>$user->phone_number,
            'learning_user'=>$learning->learning_user,
            'user_name'=>$user->name,
            'email'=>$user->email,
        ]);
        if(request()->route()->getName() == 'learning-franchise.request'){
            return redirect()->route('learning-franchise.index')->with('success', ' Request Created Successfully');
        }elseif(request()->route()->getName() == 'learning-student.request'){
            return redirect()->route('learning-student.index')->with('success', 'Request Created Successfully');
        }elseif(request()->route()->getName() == 'learning-agent.request'){
            return redirect()->route('learning-agent.index')->with('success', 'Request Created Successfully');
        }
    }

    public function training_request(){
        if(request()->route()->getName() == 'franchise-training.index'){
            $data=RequestTraining::where('learning_user','franchise')->paginate(12);
            return view('admin.trainingrequest.frenchise.index',compact('data'));
        }elseif(request()->route()->getName() == 'student-training.index'){
            $data=RequestTraining::where('learning_user','student')->paginate(12);
            return view('admin.trainingrequest.student.index',compact('data'));
        }elseif(request()->route()->getName() == 'agents-training.index'){
            $data=RequestTraining::where('learning_user','agent')->paginate(12);
            return view('admin.trainingrequest.agent.index',compact('data'));
        }
    }
    public function training_request_delete($id){
        $data = RequestTraining::find($id);
        if($data){
            RequestTraining::find($id)->delete();
            if(request()->route()->getName() == 'franchise-training.delete'){
                return redirect()->route('franchise-training.index')->with('success', 'Deleted Successfully');
            }elseif(request()->route()->getName() == 'learning-student.delete'){
                return redirect()->route('student-training.delete')->with('success', 'Deleted Successfully');
            }elseif(request()->route()->getName() == 'agent-training.delete'){
                return redirect()->route('agents-training.index')->with('success', 'Deleted Successfully');
            }
        }else{
            if(request()->route()->getName() == 'franchise-training.delete'){
                return redirect()->route('franchise-training.index')->with('error','Data not found');
            }elseif(request()->route()->getName() == 'learning-student.delete'){
                return redirect()->route('student-training.delete')->with('error','Data not found');
            }elseif(request()->route()->getName() == 'agent-training.delete'){
                return redirect()->route('agents-training.index')->with('error','Data not found');
            }
        }
    }
}
