<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $data['contact']=DB::table('contacts')
            ->orderBy('contact_must','asc')
            ->get();

        return view('backend.contacts.index',compact('data'));
    }

    public function contactDelete($id)
    {
        $contact=DB::table('contacts')
            ->where('id',$id);
                 if ($contact->delete()) {
                     return back()->with('success', 'İşlem Başarılı!');
                 }
                     return back()->with('error','işlem başarısız');
//
//                $contact=DB::table('contacts')
//                         ->find($id);
//                if ($contact->delete())
//                {
//                    return back()->with('success','İşlem Başarılı!');
//                }
//                return back()->with('error','işlem başarısız');

//    Direk find methoduyla da id'yi alabiliriz.
//    ->find($id);
        //integere çevirerek bu şekilde yapabiliriz;
    }

    public function sortable()
    {
//                print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value)
        {
          DB::table('contacts')->where('id',$value)->update([
                'contact_must' => intval($key)
            ]);
        }
        echo true;

    }
}
