<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class FrenchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $countries =Country::get();
        $frenchise = $this->filterfrenchise($request);
        
        $frenchise = $frenchise->paginate(12);
       
        return view('admin.frenchise.index',compact('countries','frenchise'));
    }

    public function filterfrenchise($request)
    {
        $frenchise = Agent::query();
        $user = Auth::user();
        $user_id = $user->id;
        if (($user->hasRole('agent'))) {
            
            $frenchise->where('user_id',$user->id);
        }
        if ($request->name) {
            $frenchise->where('legal_first_name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->email) {
            $frenchise->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->phone_number) {
            $frenchise->where('phone', 'LIKE', '%' . $request->phone_number . '%');
        }
        if ($request->country_id) {
            $frenchise->where('country_id', 'LIKE', '%' . $request->country_id . '%');
        }
        if ($request->province_id) {
            $frenchise->where('state', 'LIKE', '%' . $request->province_id . '%');
        }
        if ($request->zip) {
            $frenchise->where('zip', 'LIKE', '%' . $request->zip . '%');
        }
        if ($request->from_date && $request->to_date) {
            $frenchise->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
        }
        if ($request->approvestatus) {
            if($request->approvestatus == 'Approve'){
                $frenchise->where("is_approve",1);
            }elseif($request->approvestatus == 'UnApprove'){
                $frenchise->where("is_approve",0);
            }
        }
        if ($request->status) {
            if($request->status == 'Active'){
                $frenchise->where("is_active",1);
            }elseif($request->status == 'InActive'){
                $frenchise->where(function ($query) {
                    $query->whereNull('is_active')
                        ->orWhere('is_active', 0);
                 });
            }
        }

        
        return $frenchise;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currency(){
        $currency = array (
            'ALL' => 'Albania Lek',
            'AFN' => 'Afghanistan Afghani',
            'ARS' => 'Argentina Peso',
            'AWG' => 'Aruba Guilder',
            'AUD' => 'Australia Dollar',
            'AZN' => 'Azerbaijan New Manat',
            'BSD' => 'Bahamas Dollar',
            'BBD' => 'Barbados Dollar',
            'BDT' => 'Bangladeshi taka',
            'BYR' => 'Belarus Ruble',
            'BZD' => 'Belize Dollar',
            'BMD' => 'Bermuda Dollar',
            'BOB' => 'Bolivia Boliviano',
            'BAM' => 'Bosnia and Herzegovina Convertible Marka',
            'BWP' => 'Botswana Pula',
            'BGN' => 'Bulgaria Lev',
            'BRL' => 'Brazil Real',
            'BND' => 'Brunei Darussalam Dollar',
            'KHR' => 'Cambodia Riel',
            'CAD' => 'Canada Dollar',
            'KYD' => 'Cayman Islands Dollar',
            'CLP' => 'Chile Peso',
            'CNY' => 'China Yuan Renminbi',
            'COP' => 'Colombia Peso',
            'CRC' => 'Costa Rica Colon',
            'HRK' => 'Croatia Kuna',
            'CUP' => 'Cuba Peso',
            'CZK' => 'Czech Republic Koruna',
            'DKK' => 'Denmark Krone',
            'DOP' => 'Dominican Republic Peso',
            'XCD' => 'East Caribbean Dollar',
            'EGP' => 'Egypt Pound',
            'SVC' => 'El Salvador Colon',
            'EEK' => 'Estonia Kroon',
            'EUR' => 'Euro Member Countries',
            'FKP' => 'Falkland Islands (Malvinas) Pound',
            'FJD' => 'Fiji Dollar',
            'GHC' => 'Ghana Cedis',
            'GIP' => 'Gibraltar Pound',
            'GTQ' => 'Guatemala Quetzal',
            'GGP' => 'Guernsey Pound',
            'GYD' => 'Guyana Dollar',
            'HNL' => 'Honduras Lempira',
            'HKD' => 'Hong Kong Dollar',
            'HUF' => 'Hungary Forint',
            'ISK' => 'Iceland Krona',
            'INR' => 'India Rupee',
            'IDR' => 'Indonesia Rupiah',
            'IRR' => 'Iran Rial',
            'IMP' => 'Isle of Man Pound',
            'ILS' => 'Israel Shekel',
            'JMD' => 'Jamaica Dollar',
            'JPY' => 'Japan Yen',
            'JEP' => 'Jersey Pound',
            'KZT' => 'Kazakhstan Tenge',
            'KPW' => 'Korea (North) Won',
            'KRW' => 'Korea (South) Won',
            'KGS' => 'Kyrgyzstan Som',
            'LAK' => 'Laos Kip',
            'LVL' => 'Latvia Lat',
            'LBP' => 'Lebanon Pound',
            'LRD' => 'Liberia Dollar',
            'LTL' => 'Lithuania Litas',
            'MKD' => 'Macedonia Denar',
            'MYR' => 'Malaysia Ringgit',
            'MUR' => 'Mauritius Rupee',
            'MXN' => 'Mexico Peso',
            'MNT' => 'Mongolia Tughrik',
            'MZN' => 'Mozambique Metical',
            'NAD' => 'Namibia Dollar',
            'NPR' => 'Nepal Rupee',
            'ANG' => 'Netherlands Antilles Guilder',
            'NZD' => 'New Zealand Dollar',
            'NIO' => 'Nicaragua Cordoba',
            'NGN' => 'Nigeria Naira',
            'NOK' => 'Norway Krone',
            'OMR' => 'Oman Rial',
            'PKR' => 'Pakistan Rupee',
            'PAB' => 'Panama Balboa',
            'PYG' => 'Paraguay Guarani',
            'PEN' => 'Peru Nuevo Sol',
            'PHP' => 'Philippines Peso',
            'PLN' => 'Poland Zloty',
            'QAR' => 'Qatar Riyal',
            'RON' => 'Romania New Leu',
            'RUB' => 'Russia Ruble',
            'SHP' => 'Saint Helena Pound',
            'SAR' => 'Saudi Arabia Riyal',
            'RSD' => 'Serbia Dinar',
            'SCR' => 'Seychelles Rupee',
            'SGD' => 'Singapore Dollar',
            'SBD' => 'Solomon Islands Dollar',
            'SOS' => 'Somalia Shilling',
            'ZAR' => 'South Africa Rand',
            'LKR' => 'Sri Lanka Rupee',
            'SEK' => 'Sweden Krona',
            'CHF' => 'Switzerland Franc',
            'SRD' => 'Suriname Dollar',
            'SYP' => 'Syria Pound',
            'TWD' => 'Taiwan New Dollar',
            'THB' => 'Thailand Baht',
            'TTD' => 'Trinidad and Tobago Dollar',
            'TRY' => 'Turkey Lira',
            'TRL' => 'Turkey Lira',
            'TVD' => 'Tuvalu Dollar',
            'UAH' => 'Ukraine Hryvna',
            'GBP' => 'United Kingdom Pound',
            'USD' => 'United States Dollar',
            'UYU' => 'Uruguay Peso',
            'UZS' => 'Uzbekistan Som',
            'VEF' => 'Venezuela Bolivar',
            'VND' => 'Viet Nam Dong',
            'YER' => 'Yemen Rial',
            'ZWD' => 'Zimbabwe Dollar'
        );
        return $currency;
    }
    public function create($id = null)
    {
        $countries =Country::get();
        $currency = $this->currency();
        $frenchise = Agent::find($id);
        return view('admin.frenchise.create',compact('countries','currency','id','frenchise'));
    }
    public function edit($id = null)
    {
        if($id){
            $frenchise = Agent::find($id);
            if($frenchise){
                $countries =Country::get();
                $currency = $this->currency();
                return view('admin.frenchise.edit',compact('countries','currency','id','frenchise'));
            }
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->tab1){
            if ($request->franchise_id) {
                $user = User::where('email', $request->email)->first();
                $validator = Validator::make($request->all(), [
                    'company_name'=>'required|max:200',
                    'website'=>'required|max:300',
                    'facebook'=>'required|url|max:300',
                    'company_logo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'business_certificate'=>'mimes:pdf|max:2048',
                    // 'email' => 'required|unique:users,email,'.$user->id,
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'company_name' => 'required|max:200',
                    'email' => [
                        'required',
                        'unique:users,email',
                        'unique:agents,email'
                    ],
                    'website' => 'required|max:300',
                    'facebook' => 'required|url|max:300',
                    'company_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'business_certificate' => 'mimes:pdf|max:2048',
                ]);
            }

            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            if ($request->hasFile('company_logo')) {
                $uploadedImage = $request->company_logo;
                $companylogo = time() . '_' . $uploadedImage->getClientOriginalName();
                $companylogopath = 'imagesapi/' . $companylogo;
                $uploadedImage->move(public_path('imagesapi/'), $companylogo);
            } else {
                $previous_agent = DB::table('agents')->where('id', $request->franchise_id)->first();
                $companylogopath = $previous_agent->company_logo ?? null;
            }
            if ($request->hasFile('business_certificate')) {
                $uploadedImage = $request->business_certificate;
                $business_certificate = time() . '_' . $uploadedImage->getClientOriginalName();
                $business_certificate_path = 'imagesapi/' . $business_certificate;
                $uploadedImage->move(public_path('imagesapi/'), $business_certificate);
            } else {
                $previous_agent = DB::table('agents')->where('id', $request->franchise_id)->first();
                $business_certificate_path = $previous_agent->business_certificate ?? null;
            }
            if($request->franchise_id){
                DB::table('agents')
                ->where('id', $request->franchise_id)
                ->update([
                    'user_id'=>Auth::user()->id,
                    'company_name' => $request->company_name ?? '',
                    'email' => $request->email ?? '',
                    'website' => $request->website ?? '',
                    'facebook' => $request->facebook ?? '',
                    'instagram' => $request->instagram ?? '',
                    'twitter' => $request->twitter ?? '',
                    'linkedin' => $request->linkedin ?? '',
                    'company_logo'=>$companylogopath ?? '',
                    'business_certificate'=>$business_certificate_path ?? '',
                ]);
                return response()->json($request->franchise_id);
            }else{
                DB::table('agents')->insert([
                    'user_id'=>Auth::user()->id,
                    'company_name' => $request->company_name ?? '',
                    'email' => $request->email ?? '',
                    'website' => $request->website ?? '',
                    'facebook' => $request->facebook ?? '',
                    'instagram' => $request->instagram ?? '',
                    'twitter' => $request->twitter ?? '',
                    'linkedin' => $request->linkedin ?? '',
                    'company_logo'=>$companylogopath ?? '',
                    'business_certificate'=>$business_certificate_path ?? '',
                ]);
                $frenchise_id = DB::table('agents')->where('email',$request->email)->first();
                return response()->json($frenchise_id->id);
            }
        }elseif($request->tab2){
            if($request->franchise_id == null){
                return response()->json(['frenchise_errors' => 'Frenchise user not found'], 422);
            }
            $tab2validate = Validator::make($request->all(), [
                'business_name'=>'required|max:300',
                'legal_first_name'=>'required|max:300',
                'address'=>'required|max:300',
                'country_id'=>'required|max:300',
                'city'=>'required|max:300',
               'province_id'=>'required|max:300',
                'zip'=>'required|max:300',
                //'phone'=>'required|max:300',
            ]);
            if ($tab2validate->fails()) {
                return response()->json(['status' => false, 'errors' => $tab2validate->errors()], 422);
            }
            DB::table('agents')
            ->where('id', $request->franchise_id)
            ->update([
                'business_name' => $request->business_name ?? '',
                'legal_first_name' => $request->legal_first_name ?? '',
                'legal_last_name' => $request->legal_last_name ?? '',
                'address' => $request->address ?? '',
                'country_id' => $request->country_id ?? '',
                'state' => $request->province_id ?? '',
                'city' => $request->city ?? '',
                'zip' => $request->zip ?? '',
                'phone' => $request->phone ?? '',
                'skype' => $request->skype ?? '',
                'whatsapp' => $request->whatsapp ?? '',
                'pan_no' => $request->pan_no ?? '',
                'adhar_no' => $request->adhar_no ?? '',

            ]);
            return response()->json($request->franchise_id);
        }elseif($request->tab3){
            if($request->franchise_id == null){
                return response()->json(['frenchise_errors' => 'Frenchise user not found'], 422);
            }
            $validate = Validator::make($request->all(), [
                            'bank_name'=>'required|max:300',
                            'branch_name'=>'required|max:300',
                            'account_holder_name'=>'required|max:300',
                            'ifsc_code'=>'required|max:300',
                            'account_number'=>'required|max:300',
                            'currency'=>'required|max:300',
                        ]);
            if ($validate->fails()) {
                return response()->json(['status' => false, 'errors' => $validate->errors()], 422);
            }
            DB::table('agents')
            ->where('id', $request->franchise_id)
            ->update([
                'bank_name' => $request->bank_name ?? '',
                'branch_name' => $request->branch_name ?? '',
                'account_holder_name' => $request->account_holder_name ?? '',
                'ifsc_code' => $request->ifsc_code ?? '',
                'account_number' => $request->account_number ?? '',
                'currency' => $request->currency ?? '',
            ]);
            return response()->json($request->franchise_id);
        }elseif($request->tab4){
            if($request->franchise_id == null){
                return response()->json(['frenchise_errors' => 'Frenchise user not found'], 422);
            }
            $validate = Validator::make($request->all(), [
                'offer_letter'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            if ($validate->fails()) {
                return response()->json(['status' => false, 'errors' => $validate->errors()], 422);
            }
            if ($request->hasFile('offer_letter')) {
                $uploadedImage = $request->offer_letter;
                $offer_letter = time() . '_' . $uploadedImage->getClientOriginalName();
                $offer_letter_path = 'imagesapi/' . $offer_letter;
                $uploadedImage->move(public_path('imagesapi/'), $offer_letter);
            } else {
                $previous_agent = DB::table('agents')->where('id', $request->franchise_id)->first();
                $offer_letter_path = $previous_agent->offer_letter ?? null;
            }
            DB::table('agents')
            ->where('id', $request->franchise_id)
            ->update([
                'offer_letter'=>$offer_letter_path ?? '',
                "profile_approved" => $request->is_approve,
                "is_active" => $request->is_active,
                'profile_complete'=>$request->is_complete,
            ]);
            $frenchise = DB::table('agents')->where('id',$request->franchise_id)->first();
            $password = User::where('email', $frenchise->email)->first();
            $input['is_active'] = $request->is_active;
            $input['status'] = $request->is_approve;
            $input['name'] = $frenchise->legal_first_name;
            $input['password'] = Hash::make($frenchise->password);
            $input['zip'] = $frenchise->zip;
            $user =Auth::user();
            if($user->hasRole('Administrator') || $user->email == $frenchise->email){
                $input['admin_type'] = 'agent';
            }else{
                $input['admin_type'] = 'sub_agent';
            }
            $input['email'] = $frenchise->email;
            $input['phone_number'] = $frenchise->phone;
            $input['added_by'] = Auth::user()->id;
            $userInserted = User::updateOrCreate(
                ['email' => $frenchise->email],
                $input
            );
            if($user->hasRole('Administrator')){
                return response()->json(['success'=>'Frenchise Created Successfully','status'=>true]);
            }elseif($user->hasRole('agent')){
                return response()->json(['success'=>'Frenchise Created Successfully','status'=>true,'frenchise_id'=>$request->franchise_id]);
            }
        }
        return response()->json(['success'=>'Frenchise Created Successfully','status'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_oel_pres()
    {
        $pdf = DB::table('oel_presentation_documents')->where('client_file_name','Pdf File')->get();
        $video = DB::table('oel_presentation_documents')->where('client_file_name','video')->get();
        $document = DB::table('oel_presentation_documents')->where('client_file_name','filename')->get();
        $manage_oel =DB::table('oel_presentation_documents')->orwhere('client_file_name','Pdf File')->orwhere('client_file_name','video')->orwhere('client_file_name','filename')->get();
        return view('admin.frenchise.manage-oel-presentation',compact('pdf','video','document','manage_oel'));
    }

    public function store_manage_oel_pres(Request $request)
    {
        if ($request->hasFile('pdf')) {
            $validator = Validator::make($request->all(), [
                              'pdf' => 'required|file|mimes:pdf|max:2048',
                        ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $uploadedpdf = $request->pdf;
            $pdf = time() . '_' . $uploadedpdf->getClientOriginalName();
            $pdfname = 'imagesapi/' . $pdf;
            $uploadedpdf->move(public_path('imagesapi/'), $pdfname);
            DB::table('oel_presentation_documents')->insert(['name'=>$pdfname,'client_file_name'=>'Pdf File']);
        }
        if ($request->hasFile('video')) {
            $validator = Validator::make($request->all(), [
                            'video' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:204800',
                        ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $uploadedvideo = $request->video;
            $video = time() . '_' . $uploadedvideo->getClientOriginalName();
            $videoname = 'imagesapi/' . $video;
            $uploadedvideo->move(public_path('imagesapi/'), $videoname);
            DB::table('oel_presentation_documents')->insert(['name'=>$videoname,'client_file_name'=>'video']);
        }
        if ($request->hasFile('document')) {
            $validator = Validator::make($request->all(), [
                           'file_name'=>'required|max:223',
                           'document'=>'required|mimetypes:application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation|max:20480'
                         ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $uploadeddocument = $request->document;
            $document = time() . '_' . $uploadeddocument->getClientOriginalName();
            $documentname = 'imagesapi/' . $document;
            $uploadeddocument->move(public_path('imagesapi/'), $documentname);
            DB::table('oel_presentation_documents')->insert(['name'=>$documentname,'client_file_name'=>$request->file_name]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_manage_oel_pres($id)
    {
        $document = DB::table('oel_presentation_documents')->where('id', $id)->first();
        if ($document) {
            DB::table('oel_presentation_documents')->where('id', $id)->delete();
            return redirect()->route('manage-oel-pres')->with('success', 'Document deleted successfully.');
        } else {
            return redirect()->route('manage-oel-pres')->with('error', 'Document not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_oel_agreement()
    {
        $document = DB::table('oel_presentation_documents')->where('client_file_name','agreement')->get();
        return view('admin.frenchise.manage-oel-agreement',compact('document'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store_manage_oel_agreement(Request $request)
    {
        if ($request->hasFile('agreement')) {
            $validator = Validator::make($request->all(), [
                            'agreement' => 'required|file|mimes:pdf|max:2048',
                        ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            $uploadedagreement = $request->agreement;
            $agreement = time() . '_' . $uploadedagreement->getClientOriginalName();
            $agreementpath = 'imagesapi/' . $agreement;
            $uploadedagreement->move(public_path('imagesapi/'), $agreementpath);
            DB::table('oel_presentation_documents')->insert(['name'=>$agreementpath,'client_file_name'=>'agreement']);
            return response()->json(['success'=>'File Upload Succesfully']);
        }else{
            return response()->json(['success'=>'Please Upload Your File']);
        }
    }
}
