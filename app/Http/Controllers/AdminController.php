<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function blogs(){
    $blogs= DB::table('blogs')->get();
 
    return view ('blogs',compact ('blogs'));
}
function abouts(){
    $name ="suthiphong";
    $data = "6 กรกฏาคม 2569";
    return view('abouts', compact('name','data'));
}

function create()
{
    return view("form");
}

function insert(Request $request)
{
   $request->validate([
    'title' => 'required|max:50',
    'content' => 'required',
],
[
    'title.required' => 'กรุณาระบุชื่อบทความ'   ,
    'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
    'content.required' => 'กรุณาระบุเนื้อหาบทความ'
]);   
 $data=[
   "title"   => $request->title,
    "content" => $request->content,
 ];

 
 DB::table('blogs')->insert($data);
 return redirect('/blogs');
}
function delete($id){
DB::table('blogs')->where('id', $id)->delete();
return redirect()->back();
}
function change($id){
    $blog = DB::table('blogs')->where('id',$id)->first();
    $data=[
        'status' => !$blog->status,
    ];
    DB::table('blogs')->where('id',$id)->update($data);
    return redirect('/blogs');
}   
}