<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\EducationHistory;
use App\Models\Documents;

class ProfilesController extends Controller
{
    public function updateStudent_profile(Request $request)
{
    try {
        $student = Student::where('user_id', $request->user_id)->first();
        if (!$student) {
            return response()->json(['status' => false, 'message' => 'Student not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'working_from' => 'nullable|date_format:Y-m-d',
            'working_upto' => 'nullable|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $student_data = $request->only([
            'first_name', 'middle_name', 'last_name', 'gender', 'maritial_status',
            'passport_status', 'passport_number', 'passport_expiry', 'dob', 'first_language',
            'country_id', 'province_id', 'city', 'address', 'zip', 'working_from', 'organization_name',
            'job_profile', 'working_upto', 'mode_of_selary', 'ever_refused_visa', 'visa_details',
            'pref_countries', 'studentImage', 'status_threesixty', 'pref_course_tags',
            'personal_information_completed', 'educational_information_completed', 'work_experience',
            'working_experience_document', 'country_preference_completed', 'passport_document',
            'eng_prof_level_result', 'pref_subjects', 'working_status', 'has_visa', 'assigned_to',
            'general_info_completed', 'visa_documents', 'study_permit', 'study_permit_documents',
            'education_history_completed', 'test_scores_completed', 'background_info_completed',
            'document_info_completed', 'passport_status', 'profile_complete', 'pay_approve',
            'added_by', 'ielts_waiver'
        ]);

        if ($request->hasFile('passport_document')) {
            $file = $request->file('passport_document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $passport_image = 'imagesapi/' . $filename;
            $file->move(public_path('imagesapi/'), $filename);
            $student_data['passport_document'] = $passport_image;

            if ($student->passport_document) {
                $old_image_path = public_path($student->passport_document);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
        }

        DB::table('student')->where('user_id', $student->user_id)->update($student_data);
        DB::table('users')->where('id', $student->user_id)->update([
            'name' => $request->first_name,
            'email' => $request->email,
        ]);

        return response()->json(['status' => true, 'message' => 'Student updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['status' => false, 'message' => 'Server Error', 'error' => $e->getMessage()], 500);
    }
}

}



