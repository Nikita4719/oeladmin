<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\StudentByAgent;

class LeadsExcelSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
  public function model(array $row)
    {
        // Skip row if name and phone number are not present
        if (empty($row['name']) || empty($row['phone_number'])) {
            return null;
        }

        $values = [
            'name', 'email', 'father_name', 'country_id', 'province_id', 'zip', 'phone_number',
            'phone_number_one', 'stream', 'school', 'added_by', 'created_at', 'added_by_agent_id',
            'student_comment', 'next_calling_date', 'profile_created', 'student_user_id',
            'lead_status', 'preferred_country_id', 'received_date', 'interested_in', 'sent_date',
            'assigned_to', 'assigned_to_sub_sub_agents', 'course', 'source', 'intake', 'intake_year',
            'middle_name', 'last_name', 'phone_number1', 'dob', 'cand_working', 'interested',
            'status', 'profile', 'program_label', 'status_study', 'board', 'university', 'intrested',
            'preferred_program_label', 'status_threesixty', 'pay_update', 'caste', 'subject',
        ];


        $data = [];
        foreach ($values as $value) {
            $data[$value] = $row[$value] ?? null;
        }


       $data['added_by'] = Auth::id();
        $data['added_by_agent_id'] = Auth::id();
        $data['assigned_to'] = Auth::id();


        $data['updated_at'] = now();
         $data['created_at'] = now();
        $data['lead_status'] = $row['lead_status'] ?? 1;
        // Check if email already exists in `users` or `students_by_agents`
        if (array_key_exists('email', $row)) {
            $email = $row['email'];
            $emailExists = \App\Models\User::where('email', $email)->exists() ||
                           \App\Models\StudentByAgent::where('email', $email)->exists();
            if ($emailExists) {
                return null;
            }
        }
        $existingRecord = StudentByAgent::where('phone_number', $row['phone_number'])->first();
        return $existingRecord ? tap($existingRecord)->update($data) : new StudentByAgent($data);
    }
}

