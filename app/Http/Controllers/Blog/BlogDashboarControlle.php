<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;

class BlogDashboarControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blog::get();
        return view('admin.blog.blog_list',['blogs' => $blogs]);
    }

    public function blog_add()
    {
        $blogs=blog::select()->get();
        return view('admin.blog.blog_add',['blogs' => $blogs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //  dd($request);
            $blog = new blog();
            $blog->user_id = $request->input('user_id');
            $blog->title = $request->input('title');
            $blog->sub_title = $request->input('sub_title');  
            $blog->description = $request->input('description');
            $blog->active = $request->input('active');
            if($request->hasfile('image'))
            {
            $imagename = time().'.'.$request->file('image')->extension();
            $result = $request->file('image')->move(public_path().'/assets/uploads/blogs/images/', $imagename); //store('files');
            $blog->image = $imagename;
            }
            $blog->save();
          
            $blogs = blog::get();
                //return view('admin.blog.blog_list',['blogs' => $blogs]);
                return redirect()->route('controlpanel.blog.index')->with(['blogs' => $blogs]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = blog::where('blog_id',$id);
        if($blog->exists())
        {
            $blogs = $blog->get();
            return view('admin.blog.blog_edite',['blogs'=> $blogs]);
        }
        else
        {
            return response()->json(['message' => 'blog not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateblog(Request $request)
    {
        $blog = blog::where('blog_id',$request->blog_id);
        if($blog->exists())
        {
            $blog->title = $request->input('title');
            $blog->sub_title = $request->input('sub_title');
            $blog->user_id = $request->input('user_id');
            $blog->description = $request->input('description');
            $blog->active = $request->input('active');
            if($request->image != '')
            {
                if($request->hasfile('image'))
                {
                    $imagename = time().'.'.$request->file('image')->extension();
                    $result = $request->file('image')->move(public_path().'/assets/uploads/blogs/images/', $imagename); //store('files');
                    $blog->image = $imagename;
                }
                $blog->Update(['title' => $blog->title, 'sub_title' => $blog->sub_title,
                'user_id' => $blog->user_id, 'description' => $blog->description, 'active' => $blog->active,
                'image' => $blog->image,]);
            }
          else 
          {
            $blog->Update(['title' => $blog->title, 'user_id' => $blog->user_id,
            'sub_title' => $blog->sub_title,
            'description' => $blog->description, 'active' => $blog->active,]);
          }
            $blogs = blog::get();
            //return view('admin.blog.blog_list',['blogs' => $blogs]);
            return redirect()->route('controlpanel.blog.index')->with(['blogs' => $blogs]);

        }
        else{
            return response()->json(['message' => 'blog not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function blogactivation($id)
    {
            $blog = blog::where('blog_id',$id)->where('active','1');
            if($blog->exists())
            {
                $blog->Update(['active' => '0']);
                $blogs = blog::get();
                //return view('admin.blog.blog_list',['blogs' => $blogs]);
                return redirect()->route('controlpanel.blog.index')->with(['blogs' => $blogs]);
            }
            else
            {
                $blog = blog::where('blog_id',$id);
                $blog->Update(['active' => '1']);
                $blogs = blog::get();
                //return view('admin.blog.blog_list',['blogs' => $blogs]);
                return redirect()->route('controlpanel.blog.index')->with(['blogs' => $blogs]);

            }
    } 
}
