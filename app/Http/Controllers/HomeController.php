<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Models\Brand;

use App\Models\Event;
use App\Models\Video;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Volunteer;
use App\Models\RecentWork;
use App\Models\Certificate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function front(){
        $data['sliders']=Slider::latest()->get();
        $data['about']=About::first();
        $data['services']=Service::limit(3)->latest()->get();
        $data['brands']=Brand::get();
        $data['video']=Video::first();
        $data['volunteers']=Volunteer::latest()->limit(4)->get();
        $data['testimonials']=Certificate::latest()->get();
        $data['events']=Event::latest('id')->limit(4)->get();
        $data['recent_works']=RecentWork::latest()->limit(4)->get();

        return view('fronted.home',$data);

    }



    public function about()
    {
        $data['about']=About::first();
       return view('fronted.page.about',$data);
    }
    public function gallery()
    {
        $data['gallerys']=Gallery::latest('id')->get();
       return view('fronted.page.gallery',$data);
    }
    public function event()
    {
       $data['events']=Event::latest('id')->get();
       return view('fronted.page.event',$data);
    }
    public function event_details($id)
    {
       $data['event_detail']=Event::findOrFail($id);
       return view('fronted.page.event_detail',$data);
    }
    public function recent_work_details($id){
        {
            $data['recent_details']=RecentWork::findOrFail($id);
            return view('fronted.page.recent_work_details',$data);
         }
    }

    public function team()
    {

        $data['teams']=Volunteer::latest('id')->get();
       return view('fronted.page.team',$data);
    }
    public function service()
    {
       $data['services']=Service::latest('id')->get();
       return view('fronted.page.service',$data);
    }

    public function service_details($id)
    {
        $data['service_detail']=Service::findOrFail($id);
        return view('fronted.page.service_details',$data);
    }

    public function contact_show()
    {
       return view('fronted.page.contact');
    }


    public function contact_store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:2000',

        ]);

        $message = new Contact();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        return redirect('/')->with('success', 'message created successfully.');
    }
}
