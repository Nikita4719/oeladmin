<?php

namespace App\Http\Controllers;


use App\Models\{
    AppSettings,
    EducationLane,
    Faq,
    WorkCenter,
    MasterService,
    Program,
    Shift,
    SubService,
    VasService,
    VisaDocument,
    VisaSubDocument,
    MaterialCtl,
    CustomerCtl,
    LeadQuality,
    RackMaster,
    MaterialMaster,
};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;
use DB;

class OtherMasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Rackmaster by Nikita
    public function rack_master(Request $request)
    {
        $query = RackMaster::query();

        // Search filter
        if ($request->rack_code) {
            $query->where('rack_code', 'like', '%' . $request->rack_code . '%');
        }

        // Pagination
        $rackMasters = $query->paginate(10);

        return view('admin.othermaster.rack-master.index', compact('rackMasters'));
    }

    /**
     * Show create form
     */
    public function rack_master_create()
    {
        return view('admin.othermaster.rack-master.create');
    }

    /**
     * Store new Rack Master
     */
    public function rack_master_store(Request $request)
    {
        $request->validate([
            'rack_code' => 'required|integer|max:50',
            'location'  => 'required|max:100',
            'capacity'  => 'required|numeric',
            'rack_type' => 'required|max:50',
            'is_active' => 'required|boolean',
        ]);

        RackMaster::create([
            'rack_code' => $request->rack_code,
            'location'  => $request->location,
            'capacity'  => $request->capacity,
            'rack_type' => $request->rack_type,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('rack-master')
            ->with('success', 'Rack Master created successfully');
    }

    /**
     * Show edit form
     */
    public function rack_master_edit($id)
    {
        $rackMaster = RackMaster::findOrFail($id);
        return view('admin.othermaster.rack-master.edit', compact('rackMaster'));
    }

    /**
     * Update Rack Master
     */
    public function rack_master_update(Request $request, $id)
    {
        $request->validate([
            'rack_code' => 'required|integer|max:50',
            'location'  => 'required|max:100',
            'capacity'  => 'required|numeric',
            'rack_type' => 'required|max:50',
            'is_active' => 'required|boolean',
        ]);

        $rackMaster = RackMaster::findOrFail($id);
        $rackMaster->update([
            'rack_code' => $request->rack_code,
            'location'  => $request->location,
            'capacity'  => $request->capacity,
            'rack_type' => $request->rack_type,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('rack-master')
            ->with('success', 'Rack Master updated successfully');
    }

    /**
     * Delete Rack Master
     */
    public function rack_master_delete($id)
    {
        $rackMaster = RackMaster::findOrFail($id);
        $rackMaster->delete();

        return redirect()->route('rack-master')
            ->with('success', 'Rack Master deleted successfully');
    }


    // materialmaster by Nikita
    public function index(Request $request)
    {
        $materials = MaterialMaster::when($request->code, function ($query) use ($request) {
            $query->where('code', 'like', '%' . $request->code . '%');
        })->paginate(12);

        return view('admin.othermaster.material-master.index', compact('materials'));
    }

    public function create()
    {
        // next material_id for display only
        $nextId = \DB::table('material_master')->max('material_id') + 1;

        return view('admin.othermaster.material-master.create', compact('nextId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|integer|max:50|unique:material_master,code',
            'description' => 'required',
            'od' => 'required|numeric',
            'thickness' => 'required|numeric',
            'length_mtr' => 'required|numeric',
            'kg_per_meter' => 'required|numeric',
            'grade' => 'required',
            'material_group' => 'required',
            'is_active' => 'required'
        ]);

        // ignore material_id, DB will auto increment
        MaterialMaster::create($request->except('material_id'));

        return redirect()->route('material-master.index')
            ->with('success', 'Material added successfully');
    }


    public function edit($id)
    {
        $material = MaterialMaster::findOrFail($id);
        return view('admin.othermaster.material-master.edit', compact('material'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required||integer|max:50',
            'description' => 'required',
            'od' => 'required|numeric',
            'thickness' => 'required|numeric',
            'length_mtr' => 'required|numeric',
            'kg_per_meter' => 'required|numeric',
            'grade' => 'required',
            'material_group' => 'required',
            'is_active' => 'required'
        ]);

        $material = MaterialMaster::findOrFail($id);

        // auto-increment id, don't update material_id
        $material->update($request->all());

        return redirect()->route('material-master.index')
            ->with('success', 'Material updated successfully');
    }



    public function destroy($id)
    {
        $material = MaterialMaster::findOrFail($id);
        $material->delete();

        return redirect()->route('material-master.index')
            ->with('success', 'Material deleted successfully');
    }


    // lead quality


    public function lead_quality(Request $request)
    {
        $source = LeadQuality::when($request->name, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name . '%');
        })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->paginate(12);
        return view('admin.othermaster.lead-quality.index', compact('source'));
    }

    public function lead_quality_create()
    {
        return view('admin.othermaster.lead-quality.create');
    }
    public function lead_quality_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:233',
            'status' => 'required'
        ]);
        $input = $request->except('_token');
        $input['created_by'] = auth()->user()->id;
        $input['updated_by'] = auth()->user()->id;
        LeadQuality::create($input);
        return redirect()->route('lead_quality')
            ->with('success', 'LeadQuality created successfully.');
    }
    public function lead_quality_edit($id)
    {
        $source = LeadQuality::find($id);
        return view('admin.othermaster.lead-quality.edit', compact('source'));
    }

    public function lead_quality_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $source = LeadQuality::find($id);
        $source->name = $request->name;

        $source->status_one = $request->status_one;
        $source->status_to = $request->status_to;
        $source->status_three = $request->status_three;
        $source->status_four = $request->status_four;

        $source->status = $request->status;
        $source->save();
        return redirect()->route('lead_quality')
            ->with('success', 'LeadQuality updated successfully');
    }

    public function lead_quality_delete(Request $request)
    {
        $source = LeadQuality::find($request->id);
        $source->delete();
        return redirect()->route('lead_quality')
            ->with('success', 'Lead Quality deleted successfully');
    }



    // workcenter by Nikita
    public function work_center(Request $request)
    {
        $workCenters = WorkCenter::when($request->work_center_name, function ($query) use ($request) {
            $query->where('work_center_name', 'like', '%' . $request->work_center_name . '%');
        })
            ->when($request->filled('is_active'), function ($query) use ($request) {
                $query->where('is_active', $request->is_active);
            })
            ->paginate(12);

        return view('admin.othermaster.work-center.index', compact('workCenters'));
    }


    // CREATE FORM
    public function work_center_create()
    {
        return view('admin.othermaster.work-center.create');
    }

    // STORE
    public function work_center_store(Request $request)
    {
        $request->validate([
            'work_center_name' => 'required|max:255',
            'is_active'        => 'required'
        ]);

        $input = $request->only([
            'work_center_name',
            'work_center_description',
            'location',
            'is_active'
        ]);

        WorkCenter::create($input);

        return redirect()->route('work-center.index')
            ->with('success', 'Work Center created successfully.');
    }


    // EDIT FORM
    public function work_center_edit($id)
    {
        $workCenter = WorkCenter::findOrFail($id);

        return view('admin.othermaster.work-center.edit', compact('workCenter'));
    }

    // UPDATE


    public function work_center_update(Request $request, $id)
    {
        $request->validate([
            'work_center_name' => [
                'required',
                Rule::unique('work_center', 'work_center_name')
                    ->ignore($id, 'work_center_id'),
            ],
            'is_active' => 'required'
        ]);

        $workCenter = WorkCenter::findOrFail($id);

        $workCenter->update(
            $request->only([
                'work_center_name',
                'work_center_description',
                'location',
                'is_active'
            ])
        );

        return redirect()->route('work-center.index')
            ->with('success', 'Work Center updated successfully.');
    }



    // DELETE 
    public function work_center_destroy($id)
    {
        WorkCenter::findOrFail($id)->delete();
        return redirect()->route('work-center.index')
            ->with('success', 'Work Center deleted successfully');
    }




    // app-settings by Nikita


    // INDEX (List)
    // LIST
    public function app_settings_index()
    {
        $settings = AppSettings::orderBy('setting_id', 'desc')->paginate(10);
        return view('admin.othermaster.app-settings.index', compact('settings'));
    }


    // CREATE FORM
    public function app_settings_create()
    {
        return view('admin.othermaster.app-settings.create');
    }

    // STORE
    public function app_settings_store(Request $request)
    {
        $request->validate([
            'Vendor_Code' => 'required|integer|max:100',
            'Referral_Person_Name' => 'required',
            'Mob_No' => 'required',
        ]);

        $data = $request->only([
            'Vendor_Code',
            'Referral_Person_Name',
            'Mob_No',
            'Address',
            'description'
        ]);

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/appsettings'), $filename);
            $data['logo_path'] = $filename;
        }

        AppSettings::create($data);

        return redirect()->route('appsettings.index')
            ->with('success', 'App settings added successfully');
    }

    // EDIT FORM
    public function app_settings_edit($id)
    {
        $setting = AppSettings::findOrFail($id);
        return view('admin.othermaster.app-settings.edit', compact('setting'));
    }

    // UPDATE
    public function app_settings_update(Request $request, $id)
    {
        $request->validate([
            'Vendor_Code' => 'required|integer|max:100',
            'Referral_Person_Name' => 'required',
            'Mob_No' => 'required',
        ]);
        $setting = AppSettings::findOrFail($id);

        $data = $request->only([
            'Vendor_Code',
            'Referral_Person_Name',
            'Mob_No',
            'Address',
            'description'
        ]);

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/appsettings'), $filename);
            $data['logo_path'] = $filename;
        }

        $setting->update($data);

        return redirect()->route('appsettings.index')
            ->with('success', 'App settings updated successfully');
    }

    // DELETE
    public function app_settings_destroy($id)
    {
        $setting = AppSettings::findOrFail($id);
        $setting->delete();

        return redirect()->route('appsettings.index')
            ->with('success', 'App settings deleted successfully');
    }


    //  Shift by NIkita

    // Show Shift list
    public function shift_index()
    {
        $shift = Shift::with('country')->paginate(10);
        $country = AppSettings::all();

        return view('admin.othermaster.shift.index', compact('shift', 'country'));
    }

    // Filter shifts
    public function shift_filter(Request $request)
    {
        $query = Shift::with('country');

        if ($request->name) {
            $query->where('shift_name', 'like', "%{$request->name}%");
        }

        if ($request->country_id) {
            $query->where('country_id', $request->country_id);
        }

        $shift = $query->paginate(10);
        $country = AppSettings::all();

        return view('admin.othermaster.shift.index', compact('shift', 'country'));
    }

    // Create Shift form
    public function shift_create()
    {
        $country = AppSettings::all();
        return view('admin.othermaster.shift.create', compact('country'));
    }

    // Store new Shift
    public function shift_store(Request $request)
    {
        // Validate fields that actually exist in your model
        $request->validate([
            'shift_name' => 'required|string|max:255',
            'shift_description' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        // Save Shift
        Shift::create([
            'shift_name' => $request->shift_name,
            'shift_description' => $request->shift_description,
            'location' => $request->location,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('shift')->with('success', 'Shift created successfully.');
    }
    public function shift_edit($id)
    {
        $shift = Shift::findOrFail($id);
        $country = AppSettings::all(); // assuming AppSettings has country data

        return view('admin.othermaster.shift.edit', compact('shift', 'country'));
    }

    // Update Shift
    public function shift_update(Request $request, $id)
    {
        $request->validate([
            'shift_name' => 'required|string|max:255',
            'shift_description' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:255',

        ]);

        $shift = Shift::findOrFail($id);

        $shift->update([
            'shift_name' => $request->shift_name,
            'shift_description' => $request->shift_description,
            'location' => $request->location,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('shift')->with('success', 'Shift updated successfully.');
    }


    // Delete Shift
    public function shift_destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return redirect()->route('shift')->with('success', 'Shift deleted successfully.');
    }


    //    faq
    public function faq(Request $request)
    {
        $faq = Faq::when($request->faq_question, function ($query) use ($request) {
            $query->where('faq_question', 'like', '%' . $request->faq_question . '%');
        })
            ->paginate(12);
        return view('admin.othermaster.faq.index', compact('faq'));
    }
    public function faq_create()
    {
        return view('admin.othermaster.faq.create');
    }
    public function faq_store(Request $request)
    {
        $request->validate([
            'faq_question' => 'required',
            'faq_answer' => 'required',
            'status' => 'required'
        ]);
        $input = $request->except('_token');
        Faq::create($input);
        return redirect()->route('faq')
            ->with('success', 'Faq created successfully.');
    }
    public function faq_edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.othermaster.faq.edit', compact('faq'));
    }
    public function faq_update(Request $request, $id)
    {
        $input = $request->except('_token');
        $faq = Faq::find($id);
        $faq->update($input);
        return redirect()->route('faq')
            ->with('success', 'faq updated successfully');
    }
    public function faq_delete(Request $request)
    {
        if (Faq::find($request->id)) {
            $faq = Faq::find($request->id);
            $faq->delete();
            return redirect()->route('faq')
                ->with('success', 'Faq deleted successfully');
        } else {
            return redirect()->route('faq')
                ->with('error', 'Faq not found');
        }
    }
    //    vas service
    public function vas_service(Request $request)
    {
        $vas_service = VasService::when($request->title, function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->title . '%');
        })
            ->paginate(12);
        return view('admin.othermaster.vas-services.index', compact('vas_service'));
    }
    public function vas_service_create()
    {
        return view('admin.othermaster.vas-services.create');
    }
    public function vas_service_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'order' => 'required',
        ]);
        $input = $request->except('_token');
        if ($request->hasFile('icon_file')) {
            $image = $request->file('icon_file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi');
            $image->move($destinationPath, $name);
            $input['icon_file'] = $name;
        }
        VasService::create($input);
        return redirect()->route('vas-service')
            ->with('success', 'Vas Services created successfully.');
    }
    public function vas_service_edit($id)
    {
        $vas_service = VasService::findOrFail($id);
        return view('admin.othermaster.vas-services.edit', compact('vas_service'));
    }
    public function vas_service_update(Request $request, $id)
    {
        $input = $request->except('_token');
        $vas_service = VasService::find($id);
        if ($request->hasFile('icon_file')) {
            $image = $request->file('icon_file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imagesapi');
            $image->move($destinationPath, $name);
            $input['icon_file'] = $name;
        }
        $vas_service->update($input);
        return redirect()->route('vas-service')
            ->with('success', 'Vas Services updated successfully.');
    }
    public function vas_service_delete(Request $request)
    {
        $vas_service = VasService::find($request->id);
        if ($vas_service) {
            $vas_service->delete();
            return redirect()->route('vas-service')
                ->with('success', 'Vas Services deleted successfully');
        } else {
            return redirect()->route('vas-service')
                ->with('success', 'Vas Services not found');
        }
    }

// education lane
    public function education_lane(Request $request)
    {
        $education_lane = EducationLane::when($request->name, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name . '%');
        })
            ->paginate(12);
        return view('admin.othermaster.education-lane.index', compact('education_lane'));
    }
    public function education_lane_create()
    {
        return view('admin.othermaster.education-lane.create');
    }
    public function education_lane_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required',
        ]);
        $input = $request->except('_token');
        EducationLane::create($input);
        return redirect()->route('education-lane')
            ->with('success', 'Education lane created successfully.');
    }
    public function education_lane_edit($id)
    {
        $education_lane = EducationLane::find($id);
        return view('admin.othermaster.education-lane.edit', compact('education_lane'));
    }
    public function education_lane_update(Request $request, $id)
    {
        $input = $request->except('_token');
        $education_lane = EducationLane::find($id);
        $education_lane->update($input);
        return redirect()->route('education-lane')
            ->with('success', 'Education updated successfully');
    }
    public function education_lane_delete(Request $request)
    {
        $education_lane = EducationLane::find($request->id);
        if ($education_lane) {
            $education_lane->delete();
            return redirect()->route('education-lane')
                ->with('success', 'Education lane deleted successfully');
        } else {
            return redirect()->route('education-lane')
                ->with('error', 'Education lane not found');
        }
    }

    //  Material ctl by Nikita
    public function material_ctl(Request $request)
    {
        $materials = MaterialCtl::when($request->material_id, function ($query) use ($request) {
            $query->where('material_id', 'like', '%' . $request->material_id . '%');
        })
            ->when($request->ctl_mat_no, function ($query) use ($request) {
                $query->where('ctl_mat_no', 'like', '%' . $request->ctl_mat_no . '%');
            })
            ->when($request->grade, function ($query) use ($request) {
                $query->where('grade', 'like', '%' . $request->grade . '%');
            })
            ->latest()
            ->paginate(12);

        return view('admin.othermaster.material-ctl.index', compact('materials'));
    }

    public function material_ctl_create()
    {
        return view('admin.othermaster.material-ctl.create');
    }
    public function material_ctl_store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|integer|max:200',

        ]);
        $input = $request->except('_token');
        MaterialCtl::create($input);
        return redirect()->route('material-ctl')
            ->with('success', 'material ctl created successfully.');
    }
    public function material_ctl_edit($id)
    {
        $materials = MaterialCtl::findOrFail($id);

        return view('admin.othermaster.material-ctl.edit', compact('materials'));
    }

    public function material_ctl_update(Request $request, $id)
    {
        $request->validate([
            'material_id' => 'required|integer|max:200',

        ]);
        $input = $request->except('_token');
        $material_ctl = MaterialCtl::find($id);
        $material_ctl->update($input);
        return redirect()->route('material-ctl')
            ->with('success', 'material ctl updated successfully');
    }
    public function material_ctl_delete($id)
    {
        $material = MaterialCtl::findOrFail($id);
        $material->delete();

        return redirect()->route('material-ctl')
            ->with('success', 'Material deleted successfully');
    }


    //    customer ctl by Nikita
    public function customer_ctl(Request $request)
    {
        $customer_ctl = CustomerCtl::when($request->customer_ctl_id, function ($query) use ($request) {
            $query->where('customer_ctl_id', $request->customer_ctl_id);
        })
            ->orderBy('customer_ctl_id', 'desc')
            ->paginate(12);


        return view('admin.othermaster.customer-ctl.index', compact('customer_ctl'));
    }

   use App\Models\CustomerCtl;

public function customer_ctl_filter(Request $request)
{
    $query = CustomerCtl::query();

    // Customer ID filter
    if ($request->customer_id) {
        $query->where('customer_id', $request->customer_id);
    }

    // Material ID filter
    if ($request->material_id) {
        $query->where('material_id', $request->material_id);
    }

    // Material CTL ID filter
    if ($request->material_ctl_id) {
        $query->where('material_ctl_id', $request->material_ctl_id);
    }

    // Buffer Status filter
    if ($request->buffer_status) {
        $query->where('buffer_status', $request->buffer_status);
    }

    // Active filter
    if ($request->is_active !== null && $request->is_active !== '') {
        $query->where('is_active', $request->is_active);
    }

    $customer_ctl = $query->paginate(10);

    return view('admin.customer_ctl.index', compact('customer_ctl'));
}




    // CREATE PAGE
    public function customer_ctl_create()
    {
        return view('admin.othermaster.customer-ctl.create');
    }


    // STORE
    public function customer_ctl_store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|integer|max:200',
            'material_id' => 'required|integer|max:200',
            'material_ctl_id' => 'required|integer|max:200',
            'min_maintain_buffer_qty' => 'required|integer',
            'max_maintain_buffer_qty' => 'required|integer',
            'available_buffer_qty' => 'required|integer',
            'buffer_status' => 'required',
            'is_active' => 'required'
        ]);

        CustomerCtl::create($request->all());

        return redirect()->route('customer-ctl')
            ->with('success', 'Customer CTL created successfully.');
    }


    // EDIT PAGE
    public function customer_ctl_edit($id)
    {
        $customer_ctl = CustomerCtl::findOrFail($id);

        return view('admin.othermaster.customer-ctl.edit', compact('customer_ctl'));
    }


    // UPDATE
    public function customer_ctl_update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|integer|max:200',
            'material_id' => 'required|integer|max:200',
            'material_ctl_id' => 'required|integer|max:200',
            'min_maintain_buffer_qty' => 'required|integer',
            'max_maintain_buffer_qty' => 'required|integer',
            'available_buffer_qty' => 'required|integer',
            'buffer_status' => 'required',
            'is_active' => 'required'
        ]);
        $customer_ctl = CustomerCtl::findOrFail($id);

        $customer_ctl->update($request->all());

        return redirect()->route('customer-ctl')
            ->with('success', 'Customer CTL updated successfully.');
    }


    // DELETE
    public function customer_ctl_delete($id)
    {
        $customer_ctl = CustomerCtl::findOrFail($id);
        $customer_ctl->delete();

        return redirect()->route('customer-ctl')
            ->with('success', 'Customer CTL deleted successfully.');
    }



    public function visa_sub_document_type(Request $request)
    {
        $visa_sub_document_type = VisaSubDocument::with('visa_documents')->when($request->visa_document_id, function ($query) use ($request) {
            $query->where('visa_document_id', $request->visa_document_id);
        })
            ->latest()->paginate(12);
        return view('admin.othermaster.visa-sub-document.index', compact('visa_sub_document_type'));
    }

    public function visa_sub_document_type_create()
    {
        $visa_documents = VisaDocument::get();
        return view('admin.othermaster.visa-sub-document.create', compact('visa_documents'));
    }

    public function visa_sub_document_type_store(Request $request)
    {
        $request->validate([
            'visa_document_id' => 'required',
            'name' => 'required|max:200',
            'status' => 'required',
        ]);
        $input = $request->except('_token');
        VisaSubDocument::create($input);
        return redirect()->route('visa-sub-document-type')
            ->with('success', 'Visa Sub Document Type created successfully.');
    }
    public function visa_sub_document_type_edit($id)
    {
        $visa_sub_document_type = VisaSubDocument::find($id);
        $visa_documents = VisaDocument::get();
        return view('admin.othermaster.visa-sub-document.edit', compact('visa_sub_document_type', 'visa_documents'));
    }
    public function visa_sub_document_type_update(Request $request, $id)
    {
        $input = $request->except('_token');
        $visa_sub_document_type = VisaSubDocument::find($id);
        $visa_sub_document_type->update($input);
        return redirect()->route('visa-sub-document-type')
            ->with('success', 'Visa Sub Document Type updated successfully');
    }
    public function visa_sub_document_type_delete(Request $request)
    {
        if ($visa_sub_document_type = VisaSubDocument::find($request->id)) {
            $visa_sub_document_type->delete();
            return redirect()->route('visa-sub-document-type')
                ->with('success', 'Visa Sub Document Type deleted successfully');
        } else {
            return redirect()->route('visa-sub-document-type')
                ->with('error', 'Visa Sub Document Type not found');
        }
    }





    public function master_service_create()
    {
        return view('admin.othermaster.master-service.create');
    }
    public function master_service_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'amount' => 'required',
        ]);

        $master_service = new MasterService;
        $master_service->name = $request->name;
        $master_service->status = $request->status;
        $master_service->amount = $request->amount;
        $master_service->save();
        return redirect()->route('master_service')->with('success', 'Data Created Successfully');
    }
    public function master_service_edit($id)
    {
        $master_service = MasterService::find($id);
        if (!$master_service) {
            return redirect()->route('master_service')->with('error', 'Data Not Found');
        }
        return view('admin.othermaster.master-service.edit', compact('master_service'));
    }
    public function master_service_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'amount' => 'required',
        ]);

        $master_service = MasterService::find($id);
        $master_service->name = $request->name;
        $master_service->status = $request->status;
        $master_service->amount = $request->amount;
        $master_service->save();
        return redirect()->route('master_service')->with('success', 'Data Updated Successfully');
    }
    public function master_service_delete($id)
    {
        $master_service = MasterService::find($id);
        if (!$master_service) {
            return redirect()->route('master_service')->with('error', 'Data Not Found');
        }
        $subservice = SubService::where('master_service_id', $id)->first();
        if ($subservice) {
            return redirect()->route('master_service')->with('error', 'You can not delete this service because it has subservices');
        }
        $master_service->delete();
        return redirect()->route('master_service')->with('success', 'Data Deleted Successfully');
    }

    public function master_service(Request $request)
    {
        $master_service = MasterService::paginate(12);
        if ($request->name) {
            $master_service = MasterService::where('name', 'LIKE', "%{$request->name}%")->paginate(12);
        }
        return view('admin.othermaster.master-service.index', compact('master_service'));
    }

    public function sub_service(Request $request, $id = null)
    {
        if ($id) {
            $subservice = SubService::where('master_service_id', $id);
        } else {
            $subservice = SubService::with('master_service');
        }

        if ($request->name) {
            $subservice = $subservice->where('name', 'LIKE', "%{$request->name}%");
        }

        $subservice = $subservice->paginate(10);
        $master_service = MasterService::all();
        return view('admin.othermaster.subservice.index', compact('subservice', 'master_service'));
    }

    public function sub_service_create()
    {
        $master_service = MasterService::where('status', 1)->get();
        return view('admin.othermaster.subservice.create', compact('master_service'));
    }

    public function sub_service_edit($id)
    {
        $subservice = SubService::find($id);
        $master_service = MasterService::where('status', 1)->get();
        return view('admin.othermaster.subservice.edit', compact('subservice', 'master_service'));
    }

    public function sub_service_delete($id)
    {
        $subservice = SubService::find($id);
        if ($subservice) {
            $subservice->delete();
            return redirect()->route('sub_service')->with('success', 'Data Deleted Successfully');
        } else {
            return redirect()->route('sub_service')->with('error', 'Data Not Found');
        }
    }

    public function sub_service_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'master_service_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        $subservice = SubService::find($id);
        $subservice->master_service_id = $request->master_service_id;
        $subservice->name = $request->name;
        $subservice->status = $request->status;
        $subservice->save();
        return redirect()->route('sub_service')->with('success', 'Data Updated Successfully');
    }

    public function sub_service_store(Request $request)
    {
        $request->validate([
            'master_service_id' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        SubService::create([
            'master_service_id' => $request->master_service_id,
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect()->route('sub_service')->with('success', 'Data Created Successfully');
    }

    public function get_sub_service(Request $request)
    {
        $subservice = SubService::where('master_service_id', $request->master_service_id)->get();
        $amount = MasterService::find($request->master_service_id)->amount;
        return response()->json(['subservice' => $subservice, 'amount' => $amount]);
    }


    public function get_app_fee(Request $request)
    {
        // Fetch the program record based on the provided `pro_id`
        $profee = Program::where('id', $request->pro_id)->first();



        //$program_data = Program::with('university_name')->where('is_approved', 1)->select('id', 'name', 'currency', 'application_fee')->where('id', $request->pro_id)->first();
        $program_data = Program::with('university_name')->where('is_approved', 1)->select('id', 'name', 'currency', 'application_fee')->where('id', $request->pro_id)->first();

        $freecurrencyapi = new \FreeCurrencyApi\FreeCurrencyApi\FreeCurrencyApiClient('fca_live_mt9NJ25AtC6V2SEojGBNmlM01WMMdmOUyJOctMzI');
        $rates = $freecurrencyapi->latest([
            'base_currency' => $program_data->currency,
            'symbols' => 'INR',
            'amount' => $profee->application_fee,
        ]);


        $currency = $rates['data']['INR'];
        // Check if a program is found
        if ($profee) {
            // Return the `application_fee` in the response
            return response()->json([
                'status' => 'success',
                'application_fee' =>   round($currency * $profee->application_fee, 2),
            ]);
        } else {
            // Return an error response if no program is found
            return response()->json([
                'status' => 'error',
                'message' => 'Program not found'
            ], 404);
        }
    }
}
