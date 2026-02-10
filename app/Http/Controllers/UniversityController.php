<?php

namespace App\Http\Controllers;

use App\Models\{Country, Program, SchoolReview, SchoolType, University,PaymentsLink,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Cache, DB, Route, URL};
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Str;
class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function manage_university(Request $request)
    {
        $countries = Country::all();
        $results = University::with('country', 'province');
        $route = Route::currentRouteName();
        $originUrl = url('');
        $currentUrl = URL::current();
        $user =Auth::user();
         if(!($user->hasRole('Administrator') || $user->hasRole('Data oprator') || $user->hasRole('Sub Data-Operator')|| $user->hasRole('Digital Marketing')) ){
            $results->where('user_id', $user->id);
        }
        if ($request->has('university_name') && $request->university_name != '') {
            $results->where('university_name', 'LIKE', "%{$request->university_name}%");
        }
        if ($request->from_date) {
            $results->whereDate('updated_at', '>=', $request->from_date);
        }
        
        if ($request->to_date) {
            $results->whereDate('updated_at', '<=', $request->to_date);
        }
        if ($request->user_id) {
            $results->where('user_id',  $request->user_id);
        }
        if ($request->has('country') && $request->country != '') {
            $results->where('country_id', $request->country);
        }
        if ($request->has('account_type') && $request->account_type != '') {
            $isApproved = $request->account_type == 'approve' ? 1 : 0;
            $results->where('is_approved', $isApproved);
        }
        if ($request->has('status') && $request->status != '') {
            $results->where('status', $request->status);
        }
        $results=$results->latest()->paginate(12);
     
        $users = User::whereIn('admin_type', ['Sub Data-Operator', 'Data oprator'])->where('is_approve', 1)->get();
       
        return view('admin.university.manage-university', compact('countries','results','users'));

    }

    public function view_approve_university(Request $request)
    {
        $countries = Country::all();
        $results = University::with('country', 'province')->where('is_approved',1);
        $route = Route::currentRouteName();
        $originUrl = url('');
        $currentUrl = URL::current();
        $user =Auth::user();
         if(!($user->hasRole('Administrator') || $user->hasRole('Data oprator') || $user->hasRole('Sub Data-Operator') || $user->hasRole('Digital Marketing'))){
            $results->where('user_id', $user->id);
        }
        if ($request->has('university_name') && $request->university_name != '') {
            $results->where('university_name', 'LIKE', "%{$request->university_name}%");
        }
        if ($request->has('country') && $request->country != '') {
            $results->where('country_id', $request->country);
        }
        if ($request->has('status') && $request->status != '') {
            $results->where('status', $request->status);
        }
        $results=$results->latest()->paginate(12);
        return view('admin.university.approved-university', compact('countries','results'));
    }

    public function view_unapprove_university(Request $request)
    {
        $countries = Country::all();
        $results = University::with('country', 'province')->where(function ($query) {
                        $query->whereNull('is_approved')->orWhere('is_approved',0);
                    });
        $route = Route::currentRouteName();
        $originUrl = url('');
        $currentUrl = URL::current();
        $user =Auth::user();
          if(!($user->hasRole('Administrator') || $user->hasRole('Data oprator') || $user->hasRole('Sub Data-Operator'))){
            $results->where('user_id', $user->id);
        }
        if ($request->has('university_name') && $request->university_name != '') {
            $results->where('university_name', 'LIKE', "%{$request->university_name}%");
        }
        if ($request->has('country') && $request->country != '') {
            $results->where('country_id', $request->country);
        }
        if ($request->has('status') && $request->status != '') {
            $results->where('status', $request->status);
        }
        $results=$results->latest()->paginate(12);
        return view('admin.university.unapproved-university', compact('countries','results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_university()
    {
        $college_type=DB::table('schooltype')->where('active',1)->get();
        $currency =DB::table('currencies')->get();
        $countries = Country::get();
        $university = University::get();

        return view('admin.university.create-university',compact('college_type','currency','university','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_university(Request $request)
    {
        if($request->tab1){
                $validator = Validator::make($request->all(), [
                    'country_id' => 'required|max:200',
                    'province_id' => 'required|max:200',
                    'university_location' => 'required|max:200',
                    'city' => 'required|max:200',
                    'zip' => 'required|max:200',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
                }
                $uniSave = University::updateOrCreate(
                    ['id' => $request->university_id],
                    [
                        'country_id' => $request->country_id,
                        'state' => $request->province_id,
                        'university_location' => $request->university_location,
                        'city' => $request->city,
                        'zip' => $request->zip,
                        'map_location' => $request->map_location
                    ]);
                $data = [
                    'status' => true,
                    'university_id' => $uniSave->id,
                ];
                return response()->json($data);
        }elseif($request->tab2){
            if($request->university_id){
                $validator = Validator::make($request->all(), [
                  
                    'university_name' =>'required|max:200',
                    'type_of_university' => 'required|max:200',
                    'founded_in' => 'required|max:200',
                    'total_students' => 'required|max:200',
                    'international_students' => 'required|max:200',
                    'size_of_campus' => 'required|max:200',
                    'male_female_ratio' => 'required|max:200',
                    'faculty_student_ratio' => 'required|max:200',
                    'expense_amount' => 'required|max:200',
                    'expense_currencies' => 'required|max:200',
                    'financial_aid' => 'required|max:200',
                    'accomodation' => 'required|max:200',
                    'website2' => 'required|max:200',
                    'website'=>'required',
                    'application_cost' => 'required',
                    'fafsa_code' => 'required',
                    'added_by_name' => 'required',
                    'added_on_date' => 'required',
                    'testrequired_input'=>'required',
                    'application_cost_currencies'=>'required',
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
                }
                $slugs = Str::slug($request->university_name);
                $id=Auth::user()->id;
                $tst_type = gettype($request->testrequired_input);
                if($tst_type == "string"){
                    $testrequired = $request->testrequired_input;
                } else {
                    if(isset($request->testrequired_input)){
                        $testrequired = implode(",",$request->testrequired_input);
                    } else {
                        $testrequired = "";
                    }
                }
                $uniSave = University::updateOrCreate(
                    ['id' => $request->university_id],
                    [
                        'user_id' => $id,
                        'university_name' => $request->university_name,
                        'university_slug' => $slugs,
                        'phone_number' => $request->phone_number,
                        'email' => $request->email,
                        'details' => $request->details,
                        'website' => $request->website,
                        'type_of_university' => $request->type_of_university,
                        'founded_in' => $request->founded_in,
                        'total_students' => $request->total_students,
                        'international_students' => $request->international_students,
                        'size_of_campus' => $request->size_of_campus,
                        'male_female_ratio' => $request->male_female_ratio,
                        'faculty_student_ratio' => $request->faculty_student_ratio,
                        'yearly_hostel_expense_amount' => $request->expense_amount,
                        'yearly_hostel_expense_currencies' => $request->expense_currencies,
                        'financial_aid' => $request->financial_aid,
                        'placement' => $request->placement,
                        'accomodation' => $request->accomodation,
                        'accomodation_details' => $request->accomodation_details,
                        'website2' => $request->website2,
                        'application_cost' => $request->application_cost,
                        'application_cost_currencies' => $request->application_cost_currencies,
                        'fafsa_code' => $request->fafsa_code,
                        'testrequired' => $testrequired,
                        'added_by_name' => $request->added_by_name,
                        'notes' => $request->notes,
                        'added_on_date' => $request->added_on_date,
                        'created_at' => date('Y-m-d H:i:s'),
                        'status' => 1
                    ]
                );
                $data = [
                    'status' => true,
                    'university_id' => $uniSave->id,
                ];
            }else{
                return response()->json(['status' => false, 'errors' => 'Please Create university'], 422);
            }
            return response()->json($data);
        }
    }

    public function add_uni_ranking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ranking' => 'required|max:200',
            'from_place' => 'required|max:200',
            'year' => 'required|max:200',
            'type' => 'required|max:200',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        if($request->university_id){
            $uniSave = DB::table('university_ranking')
                ->insert([
                    'ranking' => $request->ranking,
                    'from_place' => $request->from_place,
                    'year' => $request->year,
                    'type' => $request->type,
                    'university_id' => $request->university_id,
                    'status' => '1',
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
                $data = [
                    'status' => true,
                    'university_id' => $request->university_id,
                ];
            return response()->json($data);
        }else{
            return response()->json(['status' => false, 'errors' => 'Please Create University'], 422);
        }

    }

    public function all_uni_ranking(Request $request, $id = null)
    {
        $id = $id ?? $request->id;
        $data = $id ? DB::table('university_ranking')->where('university_id', $id)->orderBy('id', 'DESC')->get() : null;
        return response()->json($data);
    }



    public function delete_uni_ranking($id)
    {
        $record = DB::table('university_ranking')->where('id',$id)->first();
        if($record){
            $data = DB::table('university_ranking')->where('id',$id)->delete();
            return redirect()->back()->with('success','University Ranking Deleted Successfully');
        }else{
            return redirect()->back()->with('error','Record Not Found');
        }
    }

    public function add_uni_accerediation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'year' => 'required|max:200',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        if($request->university_id){
            if ($request->company_logo) {
                    $company_logo = $request->file('company_logo');
                    $imageName = time() . '_' . $company_logo->getClientOriginalName();
                    $imagePath = 'imagesapi/' . $imageName;
                    $company_logo->move(public_path('imagesapi/'), $imageName);
            }
            $uniSave = DB::table('university_accerediations')
            ->insert([
                'name' => $request->name,
                'year' => $request->year,
                'university_id' => $request->university_id,
                'logo'=> $imagePath,
                'status' => '1',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $data = [
                'status' => true,
                'university_id' => $request->university_id,
            ];
            return response()->json($data);
        }else{
            return response()->json(['status' => false, 'errors' => 'Please Create University'], 422);
        }

    }

    public function all_uni_accerediation(Request $request, $id = null)
    {
        $id = $id ?? $request->id;
        $data = $id ? DB::table('university_accerediations')->where('university_id', $id)->orderBy('id', 'DESC')->get() : null;
        return response()->json($data);
    }

    public function delete_uni_accerediation($id)
    {
       $data = DB::table('university_accerediations')->where('id',$id)->first();
       if($data){
            DB::table('university_accerediations')->where('id',$id)->delete();
            return redirect()->back()->with('success','University Accerediation Deleted Successfully');
       }else{
            return redirect()->back()->with('error','University Accerediation Not Found');
       }
    }

    public function add_uni_documents_old(Request $request,$id=null)
    {
        if($request->university_id){
            $uniDoc = DB::table('universities')->where('id', $request->university_id)->first();
            $validator = Validator::make($request->all(), [
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                //'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'banner' => 'required|image|mimes:jpeg,png,jpg|max:6048',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
            }
            if($request->logo){
                $logo = $request->file('logo');
                $logoName = time() . '_' . $logo->getClientOriginalName();
                $logoPath = 'imagesapi/' . $logoName;
                $logo->move(public_path('imagesapi/'), $logoName);
            }
            if($request->thumbnail){
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
                $thumbnailPath = 'imagesapi/' . $thumbnailName;
                $thumbnail->move(public_path('imagesapi/'), $thumbnailPath);
            }
            if($request->banner){
                $banner = $request->file('banner');
                $bannerName = time() . '_' . $banner->getClientOriginalName();
                $bannerPath = 'imagesapi/' . $bannerName;
                $banner->move(public_path('imagesapi/'), $bannerPath);
            }
            if ($request->images) {
                $images = $request->file('images');
                foreach ($images as $uploadedImage) {
                    $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                    $imagePath = 'imagesapi/' . $imageName;
                    $uploadedImage->move(public_path('imagesapi/'), $imageName);
                    DB::table('university_galary_images')
                    ->insert([
                        'file_name' => $imagePath,
                        'university_id' => $request->university_id,
                        'mime_type'=> '',
                        'status' => '1',
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
            $uniUpd = DB::table('universities')
                ->where('id',$request->university_id)
                ->update([
                    'logo' => $logoPath,
                    'banner' => $bannerPath,
                    //'thumbnail'=> $thumbnailPath,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            $data = [
                'status' => true,
                'university_id' => $request->university_id,
            ];
           return response()->json($data);
        }else{
            return response()->json(['status' => false, 'errors' => 'Please Create University'], 422);
        }
    }
  
   public function add_uni_documents(Request $request)
    {
        if (!$request->university_id) {
            return response()->json(['status' => false, 'errors' => 'Please Create University'], 422);
        }
    
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
    
        $logoPath = null;
        $thumbnailPath = null;
        $bannerPath = null;
    
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logoPath = 'imagesapi/' . $logoName;
            $logo->move(public_path('imagesapi/'), $logoName);
        }
    
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnailPath = 'imagesapi/' . $thumbnailName;
            $thumbnail->move(public_path('imagesapi/'), $thumbnailName);
        }
    
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerName = time() . '_' . $banner->getClientOriginalName();
            $bannerPath = 'imagesapi/' . $bannerName;
            $banner->move(public_path('imagesapi/'), $bannerName);
        }
    
        // Save gallery images
        if ($request->hasFile('images')) {
            
            foreach ($request->file('images') as $uploadedImage) {
                $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
                $imagePath = 'imagesapi/' . $imageName;
                $uploadedImage->move(public_path('imagesapi/'), $imageName);
    
                DB::table('university_galary_images')->insert([
                    'file_name' => $imagePath,
                    'university_id' => $request->university_id,
                    'mime_type' => '',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    
        // Update university document paths
        $updateData = [];
        if ($logoPath) $updateData['logo'] = $logoPath;
        if ($thumbnailPath) $updateData['thumbnail'] = $thumbnailPath;
        if ($bannerPath) $updateData['banner'] = $bannerPath;
    
        if (!empty($updateData)) {
            $updateData['updated_at'] = now();
            DB::table('universities')->where('id', $request->university_id)->update($updateData);
       
        }
    
        return response()->json([
            'status' => true,
            'success' => 'University documents updated successfully!',
            'university_id' => $request->university_id
        ]);
    }
    public function deleteGalleryImage(Request $request)
    {
        

        // Fetch gallery record
        $gallery = DB::table('university_galary_images')->where('id', $request->id)->first();

        if ($gallery) {
            // Build full path to image
            $filePath = public_path($gallery->file_name);

            // If file exists, delete it
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Delete database record
            DB::table('university_galary_images')->where('id', $request->id)->delete();
        }

        return response()->json(['success' => true]);
    }

    public function university_document(Request $request)
    {
          $uniDoc = DB::table('universities')->Select('logo','banner','thumbnail')->where('id',$request->id)->first();
        $university_gallery = DB::table('university_galary_images')->select('file_name','status','id')->where('university_id',$request->id)->get();
        $data = [
            'status' => true,
            'uniDoc' => $uniDoc,
            'university_gallery' => $university_gallery,
        ];
        
        return response()->json($data);
    }


    public function delete_university($id)
    {
        $university = University::find($id);
        if ($university) {
            $university->delete();
            $data = [
                'status' => true,
                'message' => 'University deleted successfully',
            ];
            return redirect()->route('manage-university')->with(['status' => false,'success','University Deleted Successfully']);
        } else {
            return redirect()->route('manage-university')->with(['status' => false,'success','University not found']);
        }
    }


    public function edit_university($id){
        $university = University::find($id);
        
        $college_type=DB::table('schooltype')->where('active',1)->get();
        $currency =DB::table('currencies')->get();
        $countries = Country::get();
        return view('admin.university.edit-university',compact('college_type','university','currency','countries'));
    }

    public function approve_university(Request $request)
    {
        University::findOrFail($request->university_id)->update(['is_approved' => $request->selectedValue]);
        return response()->json(['message' => 'Approve updated successfully']);
    }


  public function update_university()
{
    $user = Auth::user();

    // Start base query
    $query = University::query();

    // Restrict non-admins to only their own entries
    if (!($user->hasRole('Administrator') || $user->hasRole('Data operator') || $user->hasRole('Sub Data-Operator'))) {
        $query->where('user_id', $user->id);
    }

    // Filter universities not updated in the last 3 months
    $oldUniversities = $query->whereDate('updated_at', '<', now()->subMonths(3))->paginate(12);

    return view('admin.university.updation-university', compact('oldUniversities'));
}



    public function oel_review(Request $request)
    {
        $reviews = SchoolReview::query();
        if ($request->application_id) {
            $reviews = $reviews->where('school_id', $request->application_id);
        }
        if (isset($request->status)) {
            $reviews = $reviews->where('status', $request->status);
        }
        $reviews = $reviews->paginate(12);
        return view('admin.university.oel-review', compact('reviews'));
    }

    public function add_review(){
        return view('admin.university.create-review');
    }

    public function store_oel_review(Request $request){
        $this->validate($request, [
            'school_id' => 'required|numeric',
            'heading' => 'required',
            'details' => 'required',
            'status'=>'required'
        ]);
        SchoolReview::create([
            'school_id' => $request->school_id,
            'heading' => $request->heading,
            'details' => $request->details,
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('oel-review')->with('success','Review Added Successfully');
    }

    public function edit_oel_review($id){
        $review = SchoolReview::findOrFail($id);
        return view('admin.university.edit-review', compact('review'));
    }

    public function update_oel_review(Request $request, $id){
        $review = SchoolReview::findOrFail($id);
        $review->update([
            'school_id' => $request->school_id,
            'heading' => $request->heading,
            'details' => $request->details,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('oel-review')->with('success','Review Updated Successfully');
    }

    public function delete_oel_review($id){
        if(SchoolReview::find($id)){
            SchoolReview::find($id)->delete();
            return redirect()->route('oel-review')->with('success','Review Deleted Successfully');
        }else{
            return redirect()->route('oel-review')->with('error','Review Not Found');
        }
    }

    public function oel_type(Request $request){
        $name = SchoolType::query();
        if ($request->name) {
            $name = $name->where('name', 'like', '%' . $request->name . '%');
        }
        $data = $name->paginate(12);
        return view('admin.university.oel-type', compact('data'));
    }

    public function add_type(){
        return view('admin.university.create-type');
    }

    public function store_oel_type(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        SchoolType::create([
            'name' => $request->name,
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('oel-type')->with('success','Type Added Successfully');
    }

    public function edit_oel_type($id){
        $data = SchoolType::findOrFail($id);
        return view('admin.university.edit-type', compact('data'));
    }

    public function update_oel_type(Request $request, $id){
        $data = SchoolType::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('oel-type')->with('success','Type Updated Successfully');
    }

    public function delete_oel_type($id){
        if(SchoolType::find($id)){
            SchoolType::find($id)->delete();
            return redirect()->route('oel-type')->with('success','Type Deleted Successfully');
        }else{
            return redirect()->route('oel-type')->with('error','Type Not Found');
        }
    }

   public function view_university(Request $request, $id)
{
    $about_university = University::with([
        'program',
        'program.programLevel',
        'country:id,name',
        'province:id,name',
        'university_type:id,name'
    ])->where('id', $id)->first();

    // 🔥 Prevent null error in Blade
    if (!$about_university) {
        abort(404);
    }

    $program = Program::with(
        'university_name:id,logo,website,university_name,country_id',
        'programSubLevel:program_id,name,id',
        'educationLevelprogram:name,id,program_level_id,program_sublevel_id',
        'educationLevel',
        'currency_data:id,currency'
    )
    ->where('school_id', $id)
    ->when($request->program_name, function ($query) use ($request) {
        $query->where('name', 'like', '%'.$request->program_name.'%');
    })
    ->get();

    return view('frontend.university-details', compact('about_university','program'));
}
}
