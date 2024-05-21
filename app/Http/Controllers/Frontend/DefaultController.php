<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sliders;
use App\Blogs;
use App\Abouts;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function index()
    {
        $data['blog']=Blogs::all()->sortby('blog_must');
        $data['slider']=Sliders::all()->sortby('slider_must');
        return view('frontend.default.index',compact('data'));
    }
    public function contact()
    {
        return view('frontend.default.contact');
    }

    public function sendMail(request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ]);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message
        ];
        mail::to('info@gencomare.xyz')->send(new SendMail($data));
        return back()->with('success','mail başarıyla gönderildi');
    }

    public function sendPost(request $request)
    {
//        dd($request->all());

            $contacts=DB::table('contacts')->insert
        (
            [
            'contact_ad'=>$request->contact_ad,
            'contact_phone'=>$request->contact_phone,
            'contact_email'=>$request->contact_email,
            'contact_mesaj'=>$request->contact_mesaj
            ]
        );

         if ($contacts)
         {
             return back()->with('success','İletişim Formunu gönderilmiştir!');
         }
         else
         {
             return back()->with('error','Ne yazık ki işlem Başarısız!');
         }
    }

    public function about()
    {
        $datam['abouts']=Abouts::all()->sortby('about_must');
        return view('frontend.default.about',compact('datam'));
    }

}
