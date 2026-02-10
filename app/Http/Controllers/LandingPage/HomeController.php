<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\WelcomeMail;
use App\Mail\SouthMail;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\EnquiryMail;
use App\Models\Ads;
use App\Models\Country;
use App\Models\StudentByAgent;
use App\Models\University;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = $request->all();
        $req=$data['country'] ??  'United States';
       

        $reqcountry =  Country::where('name', $req)->select('name','id')->first();
       

        // dd($data['country']);  
        $country =  Country::select('name','id')->get();
        $slider = DB::table('sliders')->where('status', '1')->first();
        $countryId = $slider ? $reqcountry->id : null;
     
        if(empty($countryId)){
            $countryId =82;
        }else{

        }
        $testimonials = DB::table('testimonials')->take(3)->get();
        $universities = University::where('country_id',$countryId)->get();
        $countryName =  Country::where('id', $countryId)->select('name','id')->first();
        $aboutcountry = DB::table('country_universities')->where('country_id', $countryId)->get();
        $sliders = DB::table('sliders')->where('country_id', $countryId)->get();
        $sliderImages = [];
        foreach ($sliders as $slider) {
            $images = DB::table('images')->where('slider_id', $slider->id)->get();
            $sliderImages[] = $images;
        }
        $ads = Ads::get();
        return view('landingpage.index', compact('universities','ads', 'sliderImages', 'country', 'testimonials', 'countryName','aboutcountry'));
    }

    public function sendMail(Request $request)
    {
        // dd($request->all());
       $users= EnquiryMail::all();
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email_id'   => 'required|unique:enquiry_mails,email_id',
            'phone_no'   => 'required|unique:enquiry_mails,phone_no|regex:/^[0-9\-\+\s]+$/',
            'country'    => 'required|string|max:255',
            'location'  => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:255'
        ]);

       
        $data = [
            'first_name'=>$request->first_name,
            'country'=>$request->country ?? '',
            'last_name'=>$request->last_name,
            'email_id'=>$request->email_id,
            'phone_no'=>$request->phone_no,
            'location'=>$request->location,
            'city'=>$request->city,
        ];

       
        EnquiryMail::create($data);
        session()->flash('success', 'Data has been successfully submitted!');
        try {
            Mail::to('info@overseaseducationlane.com')->send(new WelcomeMail($data));
        } catch (\Exception $e) {
            Log::error('Error sending welcome email: ' . $e->getMessage());
        }
       
        return view('landingpage.thanks');
    }

    public function getCountryData(Request $request)
    {
        $countryName =  Country::where('id', $request->countryId)->select('name','id')->first();
        $universities = University::with('country')->where('country_id',$request->countryId)->get();
        $universityCount = count($universities);
        $sliders = DB::table('sliders')->where('country_id',$request->countryId)->get();
        $sliderImages = [];
        foreach ($sliders as $slider) {
            $images = DB::table('images')->where('slider_id', $slider->id)->get();
            $sliderImages[] = $images;
        }
        return response()->json([
            'countryName'=>$countryName->name,
            'universities'=>$universities,
            'sliderimage'=>$sliderImages,
            'totalUniversity'=>$universityCount,
            'success'=>true
        ]);
    }

    public function thanks(){
        return view('landingpage.thanks');
    }



    public function send_mail_south(Request $request)
    {
       
        $existingStudent = StudentByAgent::where('phone_number', $request->phone)->first();
    
        if ($existingStudent) {
            // Phone already exists - show error
            return redirect()->back()->with('error', 'This phone number is already registered.');
        }
    
        // Prepare data for insertion and mail
        $data = [
            'name'         => $request->name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'phone_number' => $request->phone,
            'lead_status'  => 1,
            'source'       => 'Paid Social Media Campaign',
            'course'       =>$request->course ?? null,
        ];
    
        // Save to DB
        StudentByAgent::create($data);
    
        // Flash success message
        session()->flash('success', 'Data has been successfully submitted!');
    
        // Try sending email
        try {
            Mail::to('info@overseaseducationlane.com')->send(new SouthMail($data));
        } catch (\Exception $e) {
            Log::error('Error sending welcome email: ' . $e->getMessage());
        }
    
        // Redirect to thank you page
         return redirect()->route('thank-you');
    }

       public function thankss( ){

                  return view('landingpage.thanks');

        }

    public function uk()

    {
        return view('southkorea.index');


    }

    public function usa()

    {

        return view('southkorea.index');
        
    }

    public function canada()

    {

        return view('southkorea.index');
        
    }
}
