<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Abouts;
//use Psy\Util\Str;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $abouts=Abouts::orderBy('about_must','DESC')->paginate(2);
//        $abouts=Abouts::all()->sortBy('about_must');
//        dd($abouts);
        return view('backend.abouts.index',compact('abouts'));
    }

    public function edit($id)
    {
        $abouts=Abouts::where('id',$id)->first();
        return view('backend.abouts.edit')->with('abouts',$abouts);
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'about_title'=>'required',
            'about_content'=>'required'
        ]);

        if (strlen($request->about_slug)>3)
        {
            $slug=Str::slug($request->about_slug);
        }else
        {
            $slug=Str::slug($request->about_title);
        }

        if ($request->hasFile('about_image'))
        {//Doğrulama işlemi
            $request->validate([
                'about_image'=>'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);
            $image_name=uniqid().'.'.$request->about_image->getclientOriginalExtension();
            $request->about_image->move(public_path('images/abouts'),$image_name);

            $image_add=Abouts::where('id',$id)->update
            (
                [
                    "about_image"=>$image_name,
                ]
            );

            $path='images/abouts/'.$request->old_image;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }
        }
        if ($request->hasFile('about_video'))
        {
            $request->validate([
                'about_video'=>'required|mimes:mp4,ppx,ppt,pptx,pdf,ogv,jpeg,jpg,webm|max:19999'
            ]);
            $video_name=uniqid().'.'.$request->about_video->getclientOriginalExtension();
            $request->about_video->move(public_path('images/abouts'),$video_name);

            $video_add=Abouts::where('id',$id)->update
            (
                [
                    "about_video"=>$video_name,
                ]
            );

            $pathvideo='images/abouts/'.$request->old_video;
            if (file_exists($pathvideo))
            {
                @unlink(public_path($pathvideo));
            }
        }


        $about=Abouts::where('id',$id)->update
        (
            [
                "about_title"=>$request->about_title,
                "about_slug"=>$slug,
                "about_content"=>$request->about_content,
                'about_status'=>$request->about_status
            ]
        );

        if ($about or $image_add or $video_add)
        {
            return redirect(route('about.Detail'))->with('success','Veri Güncelleme İşlemi Başarılı');
//            return back()->with('success','Veriler Güncelleme başarılı');
        }else
        {
            return back()->with('error','Veri Güncelleme İşlemi Başarısız');
        }

    }

    public function insert()
    {
        return view('backend.abouts.create');
    }

    public function insertPost(Request $request)
    {
        if (strlen($request->about_slug)>3)
        {
            $about_slug=Str::slug($request->about_slug);

        }else
        {
            $about_slug=Str::slug($request->about_title);
        }

        if ($request->hasFile('about_image'))
        {
            $request->validate([
                'about_image'=>'required|image|mimes:jpg,png,jpeg|max:2048'
            ]);
            $image_name=uniqid().'.'.$request->about_image->getclientOriginalExtension();
            $request->about_image->move(public_path('images/abouts'),$image_name);
        }else
        {
            $image_name=null;
        }

        if ($request->hasFile('about_video'))
        {
            $request->validate([
                'about_video'=>'required|mimes:mp4,ppx,ppt,pptx,pdf,ogv,jpeg,jpg,webm|max:19999'
            ]);
            $video_name=uniqid().'.'.$request->about_video->getclientOriginalExtension();
            $request->about_video->move(public_path('images/abouts'),$video_name);
        }else
        {
            $video_name=null;
        }
        $about=Abouts::insert(
            [
                "about_title"=>$request->about_title,
                "about_slug"=>$about_slug,
                "about_image"=>$image_name,
                "about_video"=>$video_name,
                "about_content"=>$request->about_content,
                "about_status"=>$request->about_status
        ]);
        if ($about)
        {
            return redirect(route('about.Detail'))->with('success','Veriler Eklendi');
        }else
            return back()->with('error','Veri Ekleme İşlemi Başarısız');
    }

    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $abouts = Abouts::find(intval($value));
            $abouts->about_must = intval($key);
            $abouts->save();
        }

        echo true;
    }

    public function destroy($id)
    {
        $abouts=Abouts::find($id);
        if ($abouts->delete())
        {
            return back()->with('success','İşlem Başarılı!');
        }
        return back()->with('error','işlem Başarısız');
    }

}
