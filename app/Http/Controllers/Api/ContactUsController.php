<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactus;
use App\Models\Ads;

class ContactUsController extends Controller
{
    public function contact_us_list(Request $request)
    {
        try {
            $contact_us = Contactus::all();

            if ($contact_us->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'data' => [],
                ], 404);
            }

            $data = $contact_us->map(function ($contact_us) {
                return [
                    'id' => $contact_us->id,
                    'first_name' => $contact_us->first_name,
                    'last_name' => $contact_us->last_name,
                    'phone' => $contact_us->phone,
                    'phone_code' => $contact_us->phone_code,
                    'preferred_study_destination' => $contact_us->preferred_study_destination,
                    'email' => $contact_us->email,
                    'message' => $contact_us->message,
                    'type' => $contact_us->type,
                    'source' => $contact_us->source,
                    'preferred_study_intake' => $contact_us->preferred_study_intake,
                    'preferred_study_year' => $contact_us->preferred_study_year,
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


    public function contact_us(Request $request)
    {
    try {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'phone_code' => 'nullable|string|max:10',
            'preferred_study_destination' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string',
            'type' => 'nullable|string|max:50',
            'source' => 'nullable|string|max:100',
            'preferred_study_intake' => 'nullable|string|max:50',
            'preferred_study_year' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $contact = Contactus::create($request->only([
            'first_name',
            'last_name',
            'phone',
            'phone_code',
            'preferred_study_destination',
            'email',
            'message',
            'type',
            'source',
            'preferred_study_intake',
            'preferred_study_year'
        ]));

        return response()->json([
            'status' => true,
            'data' => $contact
        ], 200);

    } catch (ValidationException $e) {
        return response()->json([
            'status' => false,
            'errors' => $e->errors()
        ], 422);

    } catch (QueryException $e) {
        Log::error("Database error in contact_us: " . $e->getMessage());
        return response()->json([
            'status' => false,
        ], 500);

    } catch (\Exception $e) {
        Log::error("Unexpected error in contact_us: " . $e->getMessage());
        return response()->json([
            'status' => false,
        ], 500);
    }
}

    public function get_add(Request $request)
    {
        try {
            $ads = Ads::all();

            if ($ads->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'data' => [],
                ], 404);
            }

            $data = $ads->map(function ($ads) {
                return [
                    'id' => $ads->id,
                    'title' => $ads->title,
                    'image' => url("public/".$ads->image),
                    'meta_tags' => $ads->meta_tags,
                    'meta_description' => $ads->meta_description,
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
}
