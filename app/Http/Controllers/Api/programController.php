<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Models\{Program,Country,University};

class programController extends Controller
{
    
public function programs_details($id)
{
    try {
       
        $program = Program::with('study_type', 'educationLevel', 'programLevel', 'currency_data', 'ProgramCategory', 'school')
            ->find($id);

        if (!$program) {
            return response()->json([
                'status' => 'false',
                'message' => 'Program not found'
            ], 404);
        }

        return response()->json([
            'status' => 'true',
            'details' => $program
        ], 200);

    } catch (\Exception $e) {
        Log::error("Unexpected error in programs_details: " . $e->getMessage());
        return response()->json([
            'status' => 'false',
            'message' => 'An unexpected error occurred. Please try again later.'
        ], 500);
    }
}


    public function country_list(Request $request)
    {
        try {
            $country = Country::all();

            if ($country->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'data' => [],
                ], 404);
            }

            $data = $country->map(function ($country) {
                return [
                    'id' => $country->id,
                    'name' => $country->name,
                ];
            });

            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    public function university_list(Request $request)
    {
        try {
            $university = University::all();

            if ($university->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'data' => [],
                ], 404);
            }

            $data = $university->map(function ($university) {
                return [
                    'id' => $university->id,
                    'name' => $university->name,
                    'university_location' => $university->university_location,
                    'country_id' => $university->country_id,
                    'phone_number' => $university->phone_number,
                    'email' => $university->email,
                    'website' => $university->website,
                    'logo' => $university->logo,
                    'type_of_university' => $university->type_of_university,
                    'total_students' => $university->total_students,
                ];
            });

            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function program_list(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);
            $page = $request->input('page', 1);

            $program = Program::paginate($perPage, ['*'], 'page', $page);

            if ($program->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'data' => [],
                ], 404);
            }

            $data = $program->map(function ($program) {
                return [
                    'id' => $program->id,
                    'user_id' => $program->user_id,
                    'school_id' => $program->school_id,
                    'program_level_id' => $program->program_level_id,
                    'program_sub_level_id' => $program->program_sub_level_id,
                    'other_exam' => $program->other_exam,
                    'other_exam_number' => $program->other_exam_number,
                    'education_level_id' => $program->education_level_id,
                    'name' => $program->name,
                    'slug' => $program->slug,
                    'description' => $program->description,
                    'length' => $program->length,
                    'application_fee' => $program->application_fee,
                    'tuition_fee' => $program->tuition_fee,
                    'cost_of_living_fee' => $program->cost_of_living_fee,
                    'currency_id' => $program->currency_id,
                    'intake' => $program->intake,
                    'min_gpa' => $program->min_gpa,
                    'other_requirements' => $program->other_requirements,
                    'extra_notes' => $program->extra_notes,
                    'cost_of_living' => $program->cost_of_living,
                    'is_most_viewed' => $program->is_most_viewed,
                    'status' => $program->status,
                    'programType' => $program->programType,
                    'programCampus' => $program->programCampus,
                    'lang_spec_for_program' => $program->lang_spec_for_program,
                    'fieldsofstudytype' => $program->fieldsofstudytype,
                    'application_apply_date' => $program->application_apply_date,
                    'application_closing_date' => $program->application_closing_date,
                    'program_discipline' => $program->program_discipline,
                    'scholarships' => $program->scholarships,
                    'prog_category' => $program->prog_category,
                    'test_required' => $program->test_required,
                ];
            });

            return response()->json([
                'status' => true,
                'data' => $data,
                'pagination' => [
                    'total' => $program->total(),
                    'per_page' => $program->perPage(),
                    'current_page' => $program->currentPage(),
                    'last_page' => $program->lastPage(),
                    'from' => $program->firstItem(),
                    'to' => $program->lastItem(),
                ],
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }  
                               
    public function uni_filter_data(Request $request) {
    if ($request->has('university_id') || $request->has('country') || $request->has('program_id') || $request->has('course')) {
        $programs = Program::with(['university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name'])->where('is_approved', 1)
            ->when(!empty($request->country), function ($query) use ($request) {
                $query->whereHas('university_name', function ($subquery) use ($request) {
                    $subquery->where('country_id', $request->country);
                });
            })
            ->when(!empty($request->university_id), function ($query) use ($request) {
                $query->where('school_id', $request->university_id);
            })
            ->when(!empty($request->course), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->course . '%');
            })
            ->when(!empty($request->program_id), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->program_id . '%');
            })
            ->latest()
            ->paginate(12);
    } else {
        $programs =  Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)->latest()->paginate(12);
    }
    return response()->json(['data' => $programs]);
}
}
