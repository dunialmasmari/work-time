<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Mail\ApplyBlog\ApplayingBlogMail;
use Mail;
use App\Models\BlogApplyer;
set_time_limit(300);

class BlogController extends Controller
{
    
    public function viewBlogs()
    {
        $blogs=blog::where('active','1')
        ->orderByRaw('created_at DESC')
        ->paginate(8);
        $data=['blogs' => $blogs];

        return view('HR.blogs',$data);
    }

    public function viewBlogId($id)
    {
        
        $blogs=blog::select('blogs.*')
        ->where('blogs.blog_id', $id);
        
        $blogsAll=blog::where('active','1')
        ->orderByRaw('created_at DESC')
        ->get();
        //$data=['blogs' => $blogs];
        
        if ($blogs->exists())
        {
            $blogs=$blogs->get();
            $data=['blogs' => $blogs,
                   'blogsAll' => $blogsAll,
                   ];
            return view('HR.blogDetails',$data);           
         } 
        else 
        {
        return response()->json(["message" => "Blog not found!"], 404);
        }
                 
    } 
}
