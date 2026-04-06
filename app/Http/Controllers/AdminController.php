<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page(){
        return view('admin.post_page');
    }

    public function add_post(Request $request){

        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->user_id = $userid;

        $post->post_status = 'active';
        $post->name = $name;
        $post->usertype = $usertype;

        $post->description = $request->description;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage',$imagename);
        $post->image = $imagename;
        }

        $post->save();
        return redirect()->back()->with('message','Post Added Successfully');
    }

    public function show_post(){
        $post = Post::all();
        return view('admin.show_post',compact('post'));
    }

    public function delete_post($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }

    public function edit_page($id){
        $post = Post::find($id);
        return view('admin.edit_page',compact('post'));
    }

    public function update_post(Request $request, $id){
        $date = Post::find($id);
        $date->title = $request->title;
        $date->description = $request->description;
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        $image = $request->image;
        if($image){
            $imagename = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $date->image = $imagename;
        }
        $date->save();
        return redirect()->back()->with('message','Post Updated Successfully');
    }

    public function accept_post($id){
        $post = Post::find($id);
        $post->post_status = 'active';
        $post->save();
        return redirect()->back()->with('message','Post Accepted Successfully');
    }

    public function reject_post($id){
        $post = Post::find($id);
        $post->post_status = 'rejected';
        $post->save();
        return redirect()->back()->with('message','Post Rejected Successfully');
    }

}
