<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('postmessage');
    }
    public function insert(Request $request){
        $id = $request->input('user_id');
        $title = $request->input('title');
        $message = $request->input('body');

        $data =array('user_id'=>$id,'title'=>$title,'body'=>$message);
        DB::table('messages')->insert($data);
//blade
        echo "Your message has been posted";
        echo "<br>";
        echo "<a href = 'home'> Go back </a>";
    }
    public function showPost(){
        $queryPost = DB::table('messages')->where('status','posted')->get();
        return view('showPost', ['queryPost' => $queryPost]);
    }
    public function showOwnPost(){
        $ownPost = DB::table('messages')->where ('user_id', Auth::user()->id)->where('status','posted')->get();
            return view ('showOwnPost', ['ownPost' => $ownPost]);
    }
    public function delete($id){

        DB::update('update messages set status = "pending" where id = ?', [$id]);
//blade
        echo "Your message has been deleted";
        echo "<br>";
        echo "<a href = '/showOwnPost'> Go back </a>";
    }
    public function showPostToEdit($id){
        $post = DB::select('select * from messages where id = ?',[$id]);
        return view('editPost',['post'=>$post]);
    }
    public function update(Request $request1, $id){
        $body = $request1->input('body');
        $title = $request1->input('title');
        DB::update('update messages set body = ?, title = ? where id = ?', [$body,$title,$id]);
//blade later
        echo "Updated";
        echo "<br>";
        echo "<a href = '/showOwnPost'> Go back </a>";
    }
    public function upload(){
       if (Input::hasFile('file')){
           echo "Uploaded";
           $file = Input::file('file');
           dd($file);
           $file->move('uploads', $file->getClientOriginalName());
       }else {
           return 'No File';
       }
    }
}
