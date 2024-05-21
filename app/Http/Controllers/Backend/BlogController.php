<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogs;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog']=Blogs::all()->sortBy('blog_must');

        return view('backend.blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_title'=>'required',
            'blog_content'=>'required'
        ]);

        if (strlen($request->blog_slug)>3)
       {
            $slug=Str::slug($request->blog_slug);
        }else
        {
            $slug=Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file'))
        {//Doğrulama işlemi
            $request->validate([
               'blog_file'=>'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);
            $file_name=uniqid().'.'.$request->blog_file->getclientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'),$file_name);
        }else
        {
            $file_name=null;
        }

        $blog=Blogs::insert(
            [
            "blog_title"=>$request->blog_title,
            "blog_slug"=>$slug,
            "blog_file"=>$file_name,
            "blog_content"=>$request->blog_content,
            "blog_status"=>$request->blog_status
            ]
        );
        if ($blog)
        {
            return redirect(route('blog.index'))->with('success','Veriler Eklendi');
        }else
            return back()->with('error','Veri Ekleme İşlemi Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs=blogs::where('id',$id)->first();
        return view('backend.blogs.edit')->with('blogs',$blogs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'blog_title'=>'required',
                'blog_content'=>'required'
            ]);

        if (strlen($request->blog_slug)>3)
        {
            $slug=Str::slug($request->blog_slug);
        }else
        {
            $slug=Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file'))
        {//Doğrulama işlemi
            $request->validate([
                'blog_file'=>'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);
            $file_name=uniqid().'.'.$request->blog_file->getclientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'),$file_name);


            $blog=Blogs::where('id',$id)->update(
                [
                    "blog_title"=>$request->blog_title,
                    "blog_slug"=>$slug,
                    "blog_file"=>$file_name,
                    "blog_content"=>$request->blog_content,
                    "blog_status"=>$request->blog_status
                ]
            );

            //Çalışmıyor, sonra kontrol etmelisin .
            $path='images/blogs/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }

        }
        else
        {
            $blog=Blogs::where('id',$id)->update(
                [
                    "blog_title"=>$request->blog_title,
                    "blog_slug"=>$slug,
                    "blog_content"=>$request->blog_content,
                    "blog_status"=>$request->blog_status
                ]
            );
        }

        if ($blog)
        {
            return redirect(route('blog.index'))->with('success','Verileri Güncelleme başarılı');
//            return back()->with('success','Veriler Güncelleme başarılı');
        }else
        {
            return back()->with('error', 'Veri Ekleme İşlemi Başarısız');
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
        $blog=Blogs::find(intval($id));
        if ($blog->delete())
        {
            echo 1;
        }
        echo 0;
    }
    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $blogs = Blogs::find(intval($value));
            $blogs->blog_must = intval($key);
            $blogs->save();
        }

        echo true;
    }

}
