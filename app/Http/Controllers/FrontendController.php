<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;

use App\Models\{Ads, Blog, Documents, GradingScheme, Contactus, AdditionalQualification, SchoolAttended, TestScore, Country, EducationLevel, EngProficiencyLevel, Fieldsofstudytype, Exam, Instagram, Payment, Program, ProgramDiscipline, ProgramLevel, ProgramSubdiscipline, ProgramSubLevel, Student, StudentByAgent, University, Faq, FeedBackVideo, PaymentsLink, ServiceLanding, Testimonials};
use App\Jobs\SendOTPJob;
use App\Models\VerificationOtp;
use App\Mail\SendOtp;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\{Auth, DB, Mail, RateLimiter, Log};
use Validator;
use App\Models\SubServiceLanding;
use Crypt;
use Carbon\Carbon;



class FrontendController extends Controller
{


    public function index()
    {
        return view('frontend.index', [
            'service' => ServiceLanding::where('status', 1)->select('name', 'image', 'id', 'content')->take(4)->get(),
            'instagram' => Instagram::where('status', 1)->select('id', 'url')->get(),
            'blogs' => Blog::where('status', 1)->select('image', 'text', 'id', 'title')->take(3)->get(),
            'programs' => Program::with(['university_name' => function ($query) {
                $query->select('id', 'university_name', 'logo', 'banner', 'country_id')
                    ->with('country_name:id,name');
            }])
                ->select('id', 'school_id', 'name', 'description', 'application_fee')
                ->where('is_approved', 1)
                ->inRandomOrder() // Fetch random records
                ->take(20)
                ->get(),



            'ads' => Ads::select('image', 'title')->get(),

            // 'program_level'=>ProgramLevel::select()->get(),
            // 'program_sublevel'=>ProgramSubLevel::get(),

            'feedback_video' => FeedBackVideo::where('status', 1)->get(),
            'testimonials' => Testimonials::where('status', 1)->Select('profile_picture', 'designation', 'name', 'location', 'testimonial_desc')->where('status', 1)->take(6)->get(),
            'universitiesltl' => University::select('id', 'university_name', 'logo')->where('is_approved', 1)->take(16)->get(),
            'universitiesrtl' => University::select('id', 'university_name', 'logo')->where('is_approved', 1)->latest()->take(16)->get(),
            'country' => Country::select('name', 'id')->where('is_active', 1)->get()

        ]);
    }


    public function get_testimonials(Request $request)
    {

        $testimonials = Testimonials::where('status', 1)->Select('profile_picture', 'designation', 'name', 'location', 'testimonial_desc', 'id', 'review_link')->where('status', 1)->get();


        return response()->json($testimonials);
    }

    public function termscondition()
    {
        return view('frontend.termscondition');
    }


    public function service_details($id)
    {

        $service_detials = ServiceLanding::join('sub_service_landings', 'sub_service_landings.service_id', 'service_landings.id')->where('sub_service_landings.service_id', $id)->select('service_landings.name', 'sub_service_landings.name as sub_name', 'sub_service_landings.name_one as sub_name_one', 'sub_service_landings.name', 'sub_service_landings.main_title', 'sub_service_landings.image', 'sub_service_landings.image_one', 'service_landings.id', 'sub_service_landings.content', 'sub_service_landings.content_one')->get();

        return view('frontend.service_details', compact('service_detials'));
    }

    public function check_eligibility()
    {
        $country = Country::select('name', 'id')->where('is_active', 1)->get();
        $program_level = ProgramLevel::select('name', 'id')->get();
        $sub_program_level = ProgramSubLevel::select('name', 'id', 'program_id')->get();
        $program_discipline = ProgramDiscipline::select('name', 'id')->get();
        $eng_proficiency_level = EngProficiencyLevel::select('name', 'id')->get();
        return view('frontend.check-my-eligibility', compact('country', 'eng_proficiency_level', 'program_level', 'sub_program_level', 'program_discipline'));
    }

    public function get_country(Request $request)
    {
        $country = Country::whereIn('id', $request->country_id)->where('is_active', 1)->get();
        return response()->json(['country' => $country, '']);
    }

    public function education_level_filter(Request $request)
    {
        $education_level = EducationLevel::whereIn('program_level_id', $request->program_level_id)->whereIn('program_sublevel_id', $request->program_sublevel_id)->get();
        return response()->json($education_level);
    }
  
  
     public function course_university(Request $request)
    {


        $course = Program::where('is_approved', 1)->paginate(1);
        $country = Country::select('name', 'id')->where('is_active', 1)->get();
        $program_level = ProgramLevel::select('name', 'id')->get();
        $sub_program_level = ProgramSubLevel::select('name', 'id', 'program_id')->get();
        $program_discipline = ProgramDiscipline::select('name', 'id')->get();
        $eng_proficiency_level = EngProficiencyLevel::select('name', 'id')->get();

        $exam = Exam::select('name', 'id')->where('program_level_id', $request->program_level)->get();
        DB::statement("SET SESSION group_concat_max_len = 1000000"); //  Increase limit


        if ($request->ajax()) {


            if ($request->has('country') || $request->has('intake') || $request->has('other_exam') || $request->has('program_level') ||  $request->has('program_sub_level') ||  $request->has('education_level') ||  $request->has('program_discipline') ||  $request->has('program_subdispline') ||  $request->has('eng_proficiency_level') ||  $request->has('eng_pro_input') ||  $request->has('other_exam')) {

                $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)
                    ->when($request->has('program_level'), function ($query) use ($request) {
                        return $query->whereIn('program_level_id', explode(',', $request->program_level));
                    })
                    ->when($request->has('country'), function ($query) use ($request) {
                        return $query->whereHas('university_name', function ($query) use ($request) {
                            return $query->whereIn('country_id', explode(',', $request->country));
                        });
                    })
                    ->when($request->has('intake'), function ($query) use ($request) {
                        $intakes = array_map(function ($intake) {
                            return str_pad($intake, 2, "0", STR_PAD_LEFT);
                        }, explode(',', $request->intake));
                        $query->whereIn('intake', $intakes);
                    })
                    ->when($request->has('other_exam'), function ($query) use ($request) {
                        return $query->whereIn('other_exam', explode(',', $request->other_exam));
                    })
                    ->when($request->has('program_sub_level'), function ($query) use ($request) {
                        return $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                    })
                    ->when($request->has('education_level'), function ($query) use ($request) {
                        return $query->whereIn('education_level_id', explode(',', $request->education_level));
                    })
                    ->when($request->has('program_discipline'), function ($query) use ($request) {
                        return $query->whereIn('program_discipline', explode(',', $request->program_discipline));
                    })
                    ->when($request->has('program_subdispline'), function ($query) use ($request) {
                        return $query->whereIn('program_subdiscipline', explode(',', $request->program_subdispline));
                    })
                    ->when($request->has('other_exam'), function ($query) use ($request) {
                        return $query->whereIn('other_exam', explode(',', $request->other_exam));
                    })
                    ->paginate(12);


                $applyProgramFilters = function ($query) use ($request) {
                    $query->when($request->program_level, function ($query) use ($request) {
                        $query->whereIn('program_level_id', explode(',', $request->program_level));
                    })
                        ->when($request->has('intake'), function ($query) use ($request) {
                            return $query->whereIn('intake', explode(',', $request->intake));
                        })
                        ->when($request->has('other_exam'), function ($query) use ($request) {
                            return $query->whereIn('other_exam', explode(',', $request->other_exam));
                        })
                        ->when($request->program_sub_level, function ($query) use ($request) {
                            $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                        })
                        ->when($request->education_level, function ($query) use ($request) {
                            $query->whereIn('education_level_id', explode(',', $request->education_level));
                        })
                        ->when($request->program_discipline, function ($query) use ($request) {
                            $query->whereIn('program_discipline', explode(',', $request->program_discipline));
                        })
                        ->when($request->program_subdiscipline, function ($query) use ($request) {
                            $query->whereIn('program_subdiscipline', explode(',', $request->program_subdiscipline));
                        });
                };

               

                $universities = University::select('universities.*')
                    ->with([
                        'country',
                        'university_type',
                        'program.programLevel',
                        'program.programSubLevel',
                        'program.educationLevelprogram'
                    ])
                    ->where('universities.is_approved', 1) // Only approved universities
                    ->selectSub(function ($query) use ($applyProgramFilters) {
                        $query->from('program')
                            ->selectRaw('COUNT(*)')
                            ->whereColumn('universities.id', 'program.school_id')
                            ->where('program.is_approved', 1) // ✅ Only approved programs
                            ->where(function ($query) use ($applyProgramFilters) {
                                $applyProgramFilters($query);
                            });
                    }, 'program_count')
                    ->addSelect([
                        'program_ids' => function ($query) use ($applyProgramFilters) {
                            $query->from('program')
                                ->selectRaw('GROUP_CONCAT(DISTINCT id ORDER BY id ASC)')
                                ->whereColumn('program.school_id', 'universities.id')
                                ->where('program.is_approved', 1) // ✅ Only approved programs
                                ->where(function ($query) use ($applyProgramFilters) {
                                    $applyProgramFilters($query);
                                });
                        }
                    ])
                    ->when($request->has('country'), function ($query) use ($request) {
                        return $query->whereIn('country_id', explode(',', $request->country));
                    })
                    ->whereExists(function ($query) use ($applyProgramFilters) {
                        $query->from('program')
                            ->selectRaw('1')
                            ->whereColumn('universities.id', 'program.school_id')
                            ->where('program.is_approved', 1) // ✅ Only approved programs
                            ->where(function ($query) use ($applyProgramFilters) {
                                $applyProgramFilters($query);
                            });
                    })
                    ->paginate(50);

                



                return response()->json(['data' => $universities, 'course_data' => $course]);
            } else {

                $user = Auth::user();

                if (!empty($user)) {
                    if ($user->hasRole('student')) {
                        $student_data = DB::table('student')->where('user_id', $user->id)->first();

                        $program_id = DB::table('education_history')->select('education_level_id')
                            ->where('student_id', $student_data->id  ?? null)
                            ->pluck('education_level_id')->toArray();

                        $program_level_name = ProgramLevel::where('id', $program_id)->pluck('name')->first();
                        $documents_id = Documents::where('name', 'like', '%' . $program_level_name . '%')->pluck('id')->first();
                        $last_school_attended = SchoolAttended::where('student_id', $student_data->id)->where('documents', $documents_id)
                            ->select('grading_scheme_id', 'max_score', 'grading_average')
                            ->first();

                        //$grading_scheme_id = explode('-', $last_school_attended->grading_scheme_id );
                        $grading_scheme_id = [];

                        if ($last_school_attended && isset($last_school_attended->grading_scheme_id)) {
                            $grading_scheme_id = explode('-', $last_school_attended->grading_scheme_id);
                        }

                        $grading_scheme_value = end($grading_scheme_id);
                        if ($grading_scheme_value == null) {
                            $grading_scheme_id = GradingScheme::where('name', 'like', '%Out of 100%')->pluck('id')->toArray();
                        } else {

                            $grading_scheme_id = GradingScheme::where('name', 'like', '%Out of ' . $grading_scheme_value . '%')->pluck('id')->toArray();
                        }

                        $Additional_qualification = AdditionalQualification::where('student_id', $student_data->id)
                            ->whereIn('type', ['GRE', 'GMAT'])
                            ->select('type', 'total_score')
                            ->get();
                        $test_score = TestScore::where('student_id', $student_data->id)
                            ->select('type', 'total_score')
                            ->get();
                        $test_score_additional_qualification = [];
                        foreach ($test_score as $key => $value) {
                            $test_score_additional_qualification[$value->type] = $value->total_score;
                        }
                        foreach ($Additional_qualification as $key => $value) {
                            $test_score_additional_qualification[$value->type] = $value->total_score;
                        }
                        $test_scores = collect($test_score_additional_qualification)
                            ->filter(function ($score) {
                                return !is_null($score);
                            });
                        $program_id = array_map(function ($item) {
                            if ($item == 1) {
                                return 2;
                            } elseif ($item == 2) {
                                return 3;
                            } elseif ($item == 3) {
                                return 3;
                            } elseif ($item == 4) {
                                return 1;
                            }
                        }, $program_id);

                        if (!empty($program_ids) || !empty($program_id) || !empty($student_data)) {
                            $course = Program::with([
                                'university_name',
                                'programLevel',
                                'university_name.country_name',
                                'university_name.university_type_name'
                            ])
                                ->when(!empty($program_id), function ($query) use ($program_id) {
                                    return $query->whereIn('program_level_id', $program_id);
                                })
                                ->when(!empty($grading_scheme_id), function ($query) use ($grading_scheme_id) {
                                    return $query->whereIn('grading_scheme_id', $grading_scheme_id);
                                })
                                ->when(!empty($last_school_attended->grading_average), function ($query) use ($last_school_attended) {
                                    return $query->where('grading_number', '<=', $last_school_attended->grading_average);
                                })
                                
                                ->when(!empty($student_data->work_experience), function ($query) use ($student_data) {
                                    $query->where('work_experience', $student_data->work_experience);
                                })
                                ->where('is_approved', 1)
                                ->paginate(12);


                            $applyFilter = function ($query) use ($program_id, $grading_scheme_id, $last_school_attended, $test_scores, $student_data) {
                                $query->when(!empty($program_id), function ($query) use ($program_id) {
                                    $query->whereIn('program_level_id', $program_id);
                                });
                                $query->when(!empty($grading_scheme_id), function ($query) use ($grading_scheme_id) {
                                    $query->whereIn('grading_scheme_id', $grading_scheme_id);
                                });
                                $query->when(!empty($last_school_attended->grading_average), function ($query) use ($last_school_attended) {
                                    $query->where('grading_number', '<=', $last_school_attended->grading_average);
                                });
                               
                                $query->when(!empty($student_data->work_experience), function ($query) use ($student_data) {
                                    $query->where('work_experience', $student_data->work_experience);
                                });
                            };

                            $universities = University::select('universities.*')
                                ->with([
                                    'country',
                                    'university_type',
                                    'program' => function ($query) use ($applyFilter) {
                                        $applyFilter($query);
                                    }
                                ])
                                ->withCount([
                                    'program' => function ($query) use ($applyFilter) {
                                        $applyFilter($query);
                                    }
                                ])
                                ->addSelect([
                                    'program_ids' => function ($query) use ($applyFilter) {
                                        $query->from('program')
                                            ->selectRaw('GROUP_CONCAT(id)')
                                            ->whereColumn('school_id', 'universities.id')
                                            ->where(function ($query) use ($applyFilter) {
                                                $applyFilter($query);
                                            });
                                    }
                                ])
                                ->whereHas('program', function ($query) use ($applyFilter) {
                                    $applyFilter($query);
                                })
                                ->paginate(12);
                        } else {
                            $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)->paginate(12);
                            $universities = University::withCount('program')->with('country', 'province', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                                ->where('country_id', $student_data->country_id ?? null)
                                ->paginate(12);
                        }
                    } else {

                        $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)->paginate(12);
                        // $universities = University::withCount('program')->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')->paginate(12);

                        $universities = University::withCount([
                            'program as program_count' => function ($q) {
                                $q->where('is_approved', 1); // Only approved programs counted
                            }
                        ])
                            ->with([
                                'country',
                                'university_type',
                                'program' => function ($q) {
                                    $q->where('is_approved', 1); // Load only approved programs
                                },
                                'program.programLevel',
                                'program.programSubLevel',
                                'program.educationLevelprogram'
                            ])
                            ->addSelect([
                                'program_ids' => function ($query) {
                                    $query->from('program')
                                        ->selectRaw('GROUP_CONCAT(id)')
                                        ->whereColumn('school_id', 'universities.id')
                                        ->where('is_approved', 1); // Only approved programs in IDs
                                }
                            ])
                            ->paginate(12);
                    }
                } else {
                    $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)->paginate(12);
                    $universities = University::withCount([
                        'program as program_count' => function ($q) {
                            $q->where('is_approved', 1); // ✅ Only approved programs counted
                        }
                    ])
                        ->with([
                            'country',
                            'university_type',
                            'program' => function ($q) {
                                $q->where('is_approved', 1); // ✅ Only approved programs loaded
                            },
                            'program.programLevel',
                            'program.programSubLevel',
                            'program.educationLevelprogram'
                        ])
                        ->addSelect([
                            'program_ids' => function ($query) {
                                $query->from('program')
                                    ->selectRaw('GROUP_CONCAT(id)')
                                    ->whereColumn('school_id', 'universities.id')
                                    ->where('is_approved', 1); // ✅ Only approved programs in program_ids
                            }
                        ])
                        ->paginate(12);


                    return response()->json(['data' => $universities, 'course_data' => $course]);
                }

                return response()->json(['data' => $universities, 'course_data' => $course]);
            }
        }
        return view('frontend.course-finder', compact('country', 'exam', 'program_level', 'program_discipline', 'eng_proficiency_level'));
    }


    public function course_university_old(Request $request)
    {


        $course = Program::where('is_approved', 1)->paginate(1);
        $country = Country::select('name', 'id')->where('is_active', 1)->get();
        $program_level = ProgramLevel::select('name', 'id')->get();
        $sub_program_level = ProgramSubLevel::select('name', 'id', 'program_id')->get();
        $program_discipline = ProgramDiscipline::select('name', 'id')->get();
        $eng_proficiency_level = EngProficiencyLevel::select('name', 'id')->get();

        $exam = Exam::select('name', 'id')->where('program_level_id', $request->program_level)->get();
        DB::statement("SET SESSION group_concat_max_len = 1000000"); //  Increase limit


        if ($request->ajax()) {


            if ($request->has('country') || $request->has('intake') || $request->has('other_exam') || $request->has('program_level') ||  $request->has('program_sub_level') ||  $request->has('education_level') ||  $request->has('program_discipline') ||  $request->has('program_subdispline') ||  $request->has('eng_proficiency_level') ||  $request->has('eng_pro_input') ||  $request->has('other_exam')) {

                $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)
                    ->when($request->has('program_level'), function ($query) use ($request) {
                        return $query->whereIn('program_level_id', explode(',', $request->program_level));
                    })
                    ->when($request->has('country'), function ($query) use ($request) {
                        return $query->whereHas('university_name', function ($query) use ($request) {
                            return $query->whereIn('country_id', explode(',', $request->country));
                        });
                    })
                    ->when($request->has('intake'), function ($query) use ($request) {
                        $intakes = array_map(function ($intake) {
                            return str_pad($intake, 2, "0", STR_PAD_LEFT);
                        }, explode(',', $request->intake));
                        $query->whereIn('intake', $intakes);
                    })
                    ->when($request->has('other_exam'), function ($query) use ($request) {
                        return $query->whereIn('other_exam', explode(',', $request->other_exam));
                    })
                    ->when($request->has('program_sub_level'), function ($query) use ($request) {
                        return $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                    })
                    ->when($request->has('education_level'), function ($query) use ($request) {
                        return $query->whereIn('education_level_id', explode(',', $request->education_level));
                    })
                    ->when($request->has('program_discipline'), function ($query) use ($request) {
                        return $query->whereIn('program_discipline', explode(',', $request->program_discipline));
                    })
                    ->when($request->has('program_subdispline'), function ($query) use ($request) {
                        return $query->whereIn('program_subdiscipline', explode(',', $request->program_subdispline));
                    })
                    ->when($request->has('other_exam'), function ($query) use ($request) {
                        return $query->whereIn('other_exam', explode(',', $request->other_exam));
                    })
                    ->paginate(12);

                $applyProgramFilters = function ($query) use ($request) {
                    $query->when($request->program_level, function ($query) use ($request) {
                        $query->whereIn('program_level_id', explode(',', $request->program_level));
                    })
                        ->when($request->has('intake'), function ($query) use ($request) {
                            return $query->whereIn('intake', explode(',', $request->intake));
                        })
                        ->when($request->has('other_exam'), function ($query) use ($request) {
                            return $query->whereIn('other_exam', explode(',', $request->other_exam));
                        })
                        ->when($request->program_sub_level, function ($query) use ($request) {
                            $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
                        })
                        ->when($request->education_level, function ($query) use ($request) {
                            $query->whereIn('education_level_id', explode(',', $request->education_level));
                        })
                        ->when($request->program_discipline, function ($query) use ($request) {
                            $query->whereIn('program_discipline', explode(',', $request->program_discipline));
                        })
                        ->when($request->program_subdiscipline, function ($query) use ($request) {
                            $query->whereIn('program_subdiscipline', explode(',', $request->program_subdiscipline));
                        });
                };

                $universities = University::select('universities.*')
                    ->with([
                        'country',
                        'university_type',
                        'program.programLevel',
                        'program.programSubLevel',
                        'program.educationLevelprogram'
                    ])
                  ->where('is_approved', 1) // ✅ Only approved universities
                    ->selectSub(function ($query) use ($applyProgramFilters) {
                        $query->from('program')
                            ->selectRaw('COUNT(*)')
                            ->whereColumn('universities.id', 'program.school_id')
                            ->where(function ($query) use ($applyProgramFilters) {
                                $applyProgramFilters($query);
                            });
                    }, 'program_count')
                    ->addSelect(['program_ids' => function ($query) use ($applyProgramFilters) {
                        $query->from('program')
                            ->selectRaw('GROUP_CONCAT(DISTINCT id ORDER BY id ASC)')
                            ->whereColumn('program.school_id', 'universities.id')
                            ->where(function ($query) use ($applyProgramFilters) {
                                $applyProgramFilters($query);
                            });
                    }])
                    ->when($request->has('country'), function ($query) use ($request) {
                        return $query->whereIn('country_id', explode(',', $request->country));
                    })
                    ->whereExists(function ($query) use ($applyProgramFilters) {
                        $query->from('program')
                            ->selectRaw('1')
                            ->whereColumn('universities.id', 'program.school_id')
                            ->where(function ($query) use ($applyProgramFilters) {
                                $applyProgramFilters($query);
                            });
                    })

                    ->paginate(12);

                return response()->json(['data' => $universities, 'course_data' => $course]);
            } else {

                $user = Auth::user();

                if (!empty($user)) {
                    if ($user->hasRole('student')) {
                        $student_data = DB::table('student')->where('user_id', $user->id)->first();

                        $program_id = DB::table('education_history')->select('education_level_id')
                            ->where('student_id', $student_data->id  ?? null)
                            ->pluck('education_level_id')->toArray();

                        $program_level_name = ProgramLevel::where('id', $program_id)->pluck('name')->first();
                        $documents_id = Documents::where('name', 'like', '%' . $program_level_name . '%')->pluck('id')->first();
                        $last_school_attended = SchoolAttended::where('student_id', $student_data->id)->where('documents', $documents_id)
                            ->select('grading_scheme_id', 'max_score', 'grading_average')
                            ->first();

                        //$grading_scheme_id = explode('-', $last_school_attended->grading_scheme_id );
                          $grading_scheme_id = [];

                          if ($last_school_attended && isset($last_school_attended->grading_scheme_id)) {
                              $grading_scheme_id = explode('-', $last_school_attended->grading_scheme_id);
                          }

                        $grading_scheme_value = end($grading_scheme_id);
                        if ($grading_scheme_value == null) {
                            $grading_scheme_id = GradingScheme::where('name', 'like', '%Out of 100%')->pluck('id')->toArray();
                        } else {

                            $grading_scheme_id = GradingScheme::where('name', 'like', '%Out of ' . $grading_scheme_value . '%')->pluck('id')->toArray();
                        }

                        $Additional_qualification = AdditionalQualification::where('student_id', $student_data->id)
                            ->whereIn('type', ['GRE', 'GMAT'])
                            ->select('type', 'total_score')
                            ->get();
                        $test_score = TestScore::where('student_id', $student_data->id)
                            ->select('type', 'total_score')
                            ->get();
                        $test_score_additional_qualification = [];
                        foreach ($test_score as $key => $value) {
                            $test_score_additional_qualification[$value->type] = $value->total_score;
                        }
                        foreach ($Additional_qualification as $key => $value) {
                            $test_score_additional_qualification[$value->type] = $value->total_score;
                        }
                        $test_scores = collect($test_score_additional_qualification)
                            ->filter(function ($score) {
                                return !is_null($score);
                            });
                        $program_id = array_map(function ($item) {
                            if ($item == 1) {
                                return 2;
                            } elseif ($item == 2) {
                                return 3;
                            } elseif ($item == 3) {
                                return 3;
                            } elseif ($item == 4) {
                                return 1;
                            }
                        }, $program_id);

                        if (!empty($program_ids) || !empty($program_id) || !empty($student_data)) {
                            $course = Program::with([
                                'university_name',
                                'programLevel',
                                'university_name.country_name',
                                'university_name.university_type_name'
                            ])
                                ->when(!empty($program_id), function ($query) use ($program_id) {
                                    return $query->whereIn('program_level_id', $program_id);
                                })
                                ->when(!empty($grading_scheme_id), function ($query) use ($grading_scheme_id) {
                                    return $query->whereIn('grading_scheme_id', $grading_scheme_id);
                                })
                                ->when(!empty($last_school_attended->grading_average), function ($query) use ($last_school_attended) {
                                    return $query->where('grading_number', '<=', $last_school_attended->grading_average);
                                })
                                // ->when($test_scores->isNotEmpty(), function ($query) use ($test_scores) {
                                //     $query->join('program_english_required', 'program.id', '=', 'program_english_required.program_id')
                                //         ->where(function ($subQuery) use ($test_scores) {
                                //             foreach ($test_scores as $type => $score) {
                                //                 $subQuery->orWhere(function ($subQuery) use ($type, $score) {
                                //                     $subQuery->where('program_english_required.type', $type)
                                //                         ->where('program_english_required.overall_score', '<=', $score);
                                //                 });
                                //             }
                                //         });
                                // })
                                ->when(!empty($student_data->work_experience), function ($query) use ($student_data) {
                                    $query->where('work_experience', $student_data->work_experience);
                                })
                                ->where('is_approved', 1)
                                ->paginate(12);


                            $applyFilter = function ($query) use ($program_id, $grading_scheme_id, $last_school_attended, $test_scores, $student_data) {
                                $query->when(!empty($program_id), function ($query) use ($program_id) {
                                    $query->whereIn('program_level_id', $program_id);
                                });
                                $query->when(!empty($grading_scheme_id), function ($query) use ($grading_scheme_id) {
                                    $query->whereIn('grading_scheme_id', $grading_scheme_id);
                                });
                                $query->when(!empty($last_school_attended->grading_average), function ($query) use ($last_school_attended) {
                                    $query->where('grading_number', '<=', $last_school_attended->grading_average);
                                });
                                // $query->when(!empty($test_scores), function ($query) use ($test_scores) {
                                //     $query->join('program_english_required as per', 'program.id', '=', 'per.program_id')
                                //         ->where(function ($subQuery) use ($test_scores) {
                                //             foreach ($test_scores as $type => $score) {
                                //                 $subQuery->orWhere(function ($subQuery) use ($type, $score) {
                                //                     $subQuery->where('per.type', $type)
                                //                         ->where('per.overall_score', '<=', $score);
                                //                 });
                                //             }
                                //         });
                                // });
                                $query->when(!empty($student_data->work_experience), function ($query) use ($student_data) {
                                    $query->where('work_experience', $student_data->work_experience);
                                });
                            };

                            $universities = University::select('universities.*')
                                ->with([
                                    'country',
                                    'university_type',
                                    'program' => function ($query) use ($applyFilter) {
                                        $applyFilter($query);
                                    }
                                ])
                                ->withCount([
                                    'program' => function ($query) use ($applyFilter) {
                                        $applyFilter($query);
                                    }
                                ])
                                ->addSelect([
                                    'program_ids' => function ($query) use ($applyFilter) {
                                        $query->from('program')
                                            ->selectRaw('GROUP_CONCAT(id)')
                                            ->whereColumn('school_id', 'universities.id')
                                            ->where(function ($query) use ($applyFilter) {
                                                $applyFilter($query);
                                            });
                                    }
                                ])
                                ->whereHas('program', function ($query) use ($applyFilter) {
                                    $applyFilter($query);
                                })
                                ->paginate(12);
                        } else {
                            $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)->paginate(12);
                            $universities = University::withCount('program')->with('country', 'province', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                                ->where('country_id', $student_data->country_id ?? null)
                                ->paginate(12);
                        }
                    } else {

                        $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)->paginate(12);
                        // $universities = University::withCount('program')->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')->paginate(12);

                        $universities = University::withCount('program')
                            ->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                            ->addSelect(['program_ids' => function ($query) {
                                $query->from('program')
                                    ->selectRaw('GROUP_CONCAT(id)')
                                    ->whereColumn('school_id', 'universities.id');
                            }])
                            ->paginate(12);
                    }
                } else {
                    $course = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')->where('is_approved', 1)->paginate(12);
                    $universities = University::withCount('program')
                        ->with('country', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                        ->addSelect(['program_ids' => function ($query) {
                            $query->from('program')
                                ->selectRaw('GROUP_CONCAT(id)')
                                ->whereColumn('school_id', 'universities.id');
                        }])
                        ->paginate(12);
                    return response()->json(['data' => $universities, 'course_data' => $course]);
                }


                return response()->json(['data' => $universities, 'course_data' => $course]);
            }
        }
        return view('frontend.course-finder', compact('country', 'exam', 'program_level', 'program_discipline', 'eng_proficiency_level'));
    }



    public function send_otp_job($details)
    {
        dispatch(new SendOTPJob($details));
    }

    public function send_otp(Request $request)
    {
        


        $validator = Validator::make($request->all(), [
            'email' => [
                'required|email',
            ],
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $email = request()->get('email');
        $otp = rand(100000, 999999);
        $exist_data = VerificationOtp::where("email", $email)->first();
        if ($exist_data) {
            VerificationOtp::where("email", $email)->delete();
        }
        session(['otp' => $otp]);
        $smsmessage = "Your overseas education lane login OTP is " . $otp;
        $items = [
            'method' => 'sms',
            'api_key' => env('SMS_API_KEY'),
            'to' => $request->phone_number,
            'sender' => env('SMS_SENDER'),
            'unicode' => 'auto',
            'message' => $smsmessage,
            'format' => 'json',
            'otp' => $otp
        ];

        $data = VerificationOtp::create(['email' => $email, 'phone_number' => request()->input('phone_number'), 'email_otp' => $otp, 'type' => 'login']);
        if ($email) {
            try {
                Mail::to($email)->queue(new SendOtp($otp));
            } catch (\Exception $ex) {
                $stack_trace = $ex->getTraceAsString();
                $message = $ex->getMessage() . $stack_trace;
                Log::error($message);
            }
        }


        try {
            $this->send_otp_job($items); // Attempt to send OTP
            session()->put('WithdrawEmailOtp', $otp); // Store OTP in session
            return response()->json(['message' => 'OTP sent successfully.', 'success' => true]);
        } catch (\Exception $e) {
            // Log the exception if needed
            Log::error('Error sending OTP: ' . $e->getMessage());

            return response()->json(['message' => 'Failed to send OTP. Please try again later.', 'success' => false]);
        }


       
    }
    public function verify_otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric',
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'unique:student,email',
                'unique:student_by_agent,email',
            ],
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $storedOtp = session('otp');
        if ($request->otp == $storedOtp) {
            session()->forget('otp');
            VerificationOtp::where("email", $request->input("email"))->delete();
            StudentByAgent::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);
            return response()->json(['message' => 'OTP verified successfully.', 'success' => true]);
        } else {
            return response()->json(['message' => 'Invalid OTP.', 'success' => false], 401);
        }
    }

    public function view_program_data(Request $request, $id = null)
    {
        $programIds = $request->query('selected_program_id');


        $programIdsArray = explode(',', $programIds);

        $program_data = Program::with('university_name', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')
            ->where('is_approved', 1)
            ->when(!empty($id), function ($query) use ($id) {
                return $query->where('school_id', $id);
            })
            ->when($request->has('program_level'), function ($query) use ($request) {
                return $query->whereIn('program_level_id', explode(',', $request->program_level));
            })
            ->when(!empty($programIdsArray), function ($query) use ($programIdsArray) {
                return $query->whereIn('id', $programIdsArray);
            })
            ->when($request->has('country'), function ($query) use ($request) {
                return $query->whereHas('university_name', function ($query) use ($request) {
                    return $query->whereIn('country_id', explode(',', $request->country));
                });
            })
            ->when($request->has('intake'), function ($query) use ($request) {
                return $query->whereIn('intake', explode(',', $request->intake));
            })
            ->when($request->has('other_exam'), function ($query) use ($request) {
                return $query->whereIn('other_exam', explode(',', $request->other_exam));
            })
            ->when($request->has('program_sub_level'), function ($query) use ($request) {
                return $query->whereIn('program_sub_level', explode(',', $request->program_sub_level));
            })
            ->when($request->has('education_level'), function ($query) use ($request) {
                return $query->whereIn('education_level_id', explode(',', $request->education_level));
            })
            ->when($request->has('program_discipline'), function ($query) use ($request) {
                return $query->whereIn('program_discipline', explode(',', $request->program_discipline));
            })
            ->when($request->has('program_subdispline'), function ($query) use ($request) {
                return $query->whereIn('program_subdiscipline', explode(',', $request->program_subdispline));
            })
            ->when($request->has('other_exam'), function ($query) use ($request) {
                return $query->whereIn('other_exam', explode(',', $request->other_exam));
            })->get();



        if ($program_data->isEmpty()) {
            return redirect('/apply-program')->with('error', 'No data found.');

            // abort(404);
        }
        return view('frontend.program-data', compact('program_data'));
    }


    public function course_details($id = null)
    {
        $program_data = Program::where('id', $id)->with('university_name', 'educationLevelprogram', 'programLevel', 'university_name.country_name', 'university_name.university_type_name')
            ->where('is_approved', 1)->first();
        $exam_text = DB::table('program_english_required')
            ->join('eng_proficiency_levels', 'program_english_required.type', '=', 'eng_proficiency_levels.id')
            ->where('program_id', $id)->get();

        if (!$program_data) {
            abort(404);
        }
        return view('frontend.program-details', compact('program_data', 'exam_text'));
    }

    public function apply_program_payment(Request $request, $student_id, $program_id)
    {

        $intake_month = $request->intake_month ?? '';
        $intake_year = $request->intake_year ?? '';

        $student_details = Student::where('id', $student_id)->first();
        $program_data = Program::with('university_name')->where('id', $program_id)->where('is_approved', 1)->first();
        if (!$student_details) {
            abort(404);
        }

        if (Auth::check() && Auth::user()->hasRole('student') && ($student_details->profile_complete != 1)) {
            return redirect()->route('student-edit')->with(['message' => 'Please Complete Your Profile']);
        }

        return view('frontend.apply-program-payment', compact('program_data', 'student_id', 'intake_month', 'intake_year'));
    }

    public function pay_amount($student_id, $program_id, $amount, $intake_month, $intake_year)
    {

        $fee = Crypt::decrypt($amount);

        $da = Carbon::now()->startOfMonth()->format('Y-m');

        // Fetch the last "fallowp_unique_id" to determine the latest incremented number
        $lastPayment = PaymentsLink::orderBy('id', 'desc')->first();
        $lastId = $lastPayment ? $lastPayment->app_id : 'OEL00';  // Default to OEL000 if no previous ID exists

        // Extract the number from the last "fallowp_unique_id"
        preg_match('/(\d{3})/', $lastId, $matches);
        $lastNumber = isset($matches[0]) ? (int)$matches[0] : 0;

        // Increment the number
        $incrementedNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);  // Pad to 3 digits

        // Combine the prefix with the incremented number
        $app_id = 'OEL' . $incrementedNumber . '-' . $da;
        // CONVERT CURRENCY
        $student_details = Student::where('id', $student_id)->first();
        $program_data = Program::with('university_name')->where('is_approved', 1)->select('id', 'currency', 'school_id')->where('id', $program_id)->first();
        $freecurrencyapi = new \FreeCurrencyApi\FreeCurrencyApi\FreeCurrencyApiClient('fca_live_mt9NJ25AtC6V2SEojGBNmlM01WMMdmOUyJOctMzI');


        $rates = $freecurrencyapi->latest([
            'base_currency' => $program_data->currency,
            'symbols' => 'INR',
            'amount' => $fee,
        ]);

        $currency = $rates['data']['INR'];
        $controller = new LeadsManageCotroller();
        $token         = $controller->generateToken();
        $uniqueId         = $controller->uniqidgenrate();
        $paymentLink = PaymentsLink::updateOrCreate(
            ['user_id' => $student_details->user_id, 'program_id' => $program_id],

            [
                'token'  => $token,
                'app_id' => $app_id,
                'selected_university' =>  $program_data->school_id,
                'email'                    => $student_details->email,
                'payment_type'            => null,
                'payment_type_remarks'     => "applied_program",
                'payment_mode'          => null,
                'payment_mode_remarks'     => "",
                'amount'                 => round($currency * $fee, 2),
                'expired_in'            => date('Y-m-d H:i:s', strtotime('+ 10 days')),
                'fallowp_unique_id' => $uniqueId,
                'master_service' => 2,
                'sub_service' => 18,
                'remarks' => "Program Application Paid",
                'intake_month' => $intake_month ?? null,
                'intake_year' => $intake_year ?? null
            ]
        );

        return redirect(url('/pay-now/c?token=' . $token));
    }

    public function pay_later($student_id, $program_id, $amount, $intake_month, $intake_year)
    {

        $intake_month = $intake_month ?? '';
        $intake_year = $intake_year ?? '';

        $fee = Crypt::decrypt($amount);

        $da = Carbon::now()->startOfMonth()->format('Y-m');

        // Fetch the last "fallowp_unique_id" to determine the latest incremented number
        $lastPayment = PaymentsLink::orderBy('id', 'desc')->first();
        $lastId = $lastPayment ? $lastPayment->app_id : 'OEL00';  // Default to OEL000 if no previous ID exists

        // Extract the number from the last "fallowp_unique_id"
        preg_match('/(\d{3})/', $lastId, $matches);
        $lastNumber = isset($matches[0]) ? (int)$matches[0] : 0;

        // Increment the number
        $incrementedNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);  // Pad to 3 digits

        // Combine the prefix with the incremented number
        $app_id = 'OEL' . $incrementedNumber . '-' . $da;

        $student_details = Student::where('id', $student_id)->first();
        $program_data = Program::with('university_name')->where('is_approved', 1)->select('id', 'currency', 'school_id')->where('id', $program_id)->first();

        $freecurrencyapi = new \FreeCurrencyApi\FreeCurrencyApi\FreeCurrencyApiClient('fca_live_mt9NJ25AtC6V2SEojGBNmlM01WMMdmOUyJOctMzI');
        $rates = $freecurrencyapi->latest([
            'base_currency' => $program_data->currency,
            'symbols' => 'INR',
            'amount' => $fee,
        ]);
        $currency = $rates['data']['INR'];
        $controller = new LeadsManageCotroller();
        $token         = $controller->generateToken();
        $uniqueId         = $controller->uniqidgenrate();
        $paymentLink = PaymentsLink::updateOrCreate(
            ['user_id' => $student_details->user_id, 'program_id' => $program_id],

            [
                'token'                    => $token,
                'app_id' => $app_id ?? 0,
                'selected_university' =>  $program_data->school_id,
                'email'                    => $student_details->email,
                'payment_type'            => null,
                'payment_type_remarks'     => "applied_program_pay_later",
                'payment_mode'          => null,
                'payment_mode_remarks'     => "",
                'amount'                 => round($currency * $fee, 2),
                'expired_in'            => date('Y-m-d H:i:s', strtotime('+ 10 days')),
                'fallowp_unique_id' => $uniqueId,
                'master_service' => 2,
                'sub_service' => 18,
                'remarks' => "Pay Later",
                'intake_month' => $intake_month ?? null,
                'intake_year' => $intake_year ?? null


            ]
        );
        return redirect(url('student/applied-program'));
    }



    public function continue_course($student_id, $program_id, $amount, $intake_month, $intake_year)
    {
        // dd($intake_month);
        $fee = Crypt::decrypt($amount);
        $da = Carbon::now()->startOfMonth()->format('Y-m');

        // Fetch the last "fallowp_unique_id" to determine the latest incremented number
        $lastPayment = PaymentsLink::orderBy('id', 'desc')->first();
        $lastId = $lastPayment ? $lastPayment->app_id : 'OEL00';  // Default to OEL000 if no previous ID exists

        // Extract the number from the last "fallowp_unique_id"
        preg_match('/(\d{3})/', $lastId, $matches);
        $lastNumber = isset($matches[0]) ? (int)$matches[0] : 0;

        // Increment the number
        $incrementedNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);  // Pad to 3 digits

        // Combine the prefix with the incremented number

        $app_id = 'OEL' . $incrementedNumber . '-' . $da;

        // Generate token and unique ID
        $controller = new LeadsManageCotroller();
        $token = $controller->generateToken();
        $uniqueId = $controller->uniqidgenrate();

        // Fetch student details and program data
        $student_details = Student::where('id', $student_id)->first();
        $program_data = Program::with('university_name')->where('is_approved', 1)->select('id', 'currency', 'school_id')->where('id', $program_id)->first();

        // Store in PaymentsLink table
        PaymentsLink::updateOrCreate(
            ['user_id' => $student_details->user_id, 'program_id' => $program_id],
            [
                'token' => $token,
                'app_id' => $app_id,
                'selected_university' =>  $program_data->school_id,
                'email' => $student_details->email,
                'payment_type' => null,
                'payment_type_remarks' => "applied_program",
                'payment_mode' => null,
                'payment_mode_remarks' => "Application Fee 0.00",
                'amount' => $fee,
                'expired_in' => date('Y-m-d H:i:s', strtotime('+10 days')),
                'fallowp_unique_id' => $uniqueId,
                'master_service' => 2,
                'sub_service' => 18,
                'remarks' => "Application Fee 0.00",
                'intake_month' => $intake_month ?? null,
                'intake_year' => $intake_year ?? null
            ]
        );

        // Store in Payment table
        Payment::create([
            'payment_id' => $app_id,
            'payment_method' => 'free',
            'currency' => $fee,
            'fallowp_unique_id' => $uniqueId,
            'customer_name' => $student_details->first_name,
            'user_id' => $student_details->user_id,
            'customer_email' => $student_details->email,
            'amount' => $fee,
            'payment_status' => 'success',
            'json_response' => 'free',

        ]);

        // Redirect with success message
        return redirect(url('apply-program'))->with('success', 'Program Applied Successfully!');
    }


    public function universities(Request $request)
    {
        $country = Country::select('name', 'id')->where('is_active', 1)->get();
        $universities = University::select('id', 'university_name')->get();
        if ($request->ajax()) {
            if ($request->has('university_name') || $request->has('country') || $request->has('country_name')) {
                $country_id = $country->where('name', 'like', '%' . $request->country_name . '%')->pluck('id')->first();
                $universities = University::select('universities.*')->with('country', 'Program:name', 'province', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram');
                if (!empty($request->university_name)) {
                    $universities = $universities->where('id', $request->university_name);
                }
                if (!empty($country_id)) {
                    $universities = $universities->where('country_id', $country_id);
                }

                if (!empty($request->country)) {
                    $universities = $universities->where('country_id', $request->country);
                }
                $universities = $universities->latest()->paginate(12);
            } else {
                $universities = University::select('universities.*')->with('country', 'Program:name', 'province', 'university_type', 'program.programLevel', 'program.programSubLevel', 'program.educationLevelprogram')
                    ->latest()->paginate(12);
            }
            return response()->json(['data' => $universities]);
        }
        return view('frontend.universities', compact('country', 'universities'));
    }


    public function programso(Request $request)
    {
        $program_name = Program::where('is_approved', 1)->select('name', 'id')->get();
        $country = Country::select('name', 'id')->where('is_active', 1)->get();
        $universities = University::select('id', 'university_name')->get();
        if ($request->ajax()) {
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
        return view('frontend.programs', compact('program_name', 'country', 'universities'));
    }
    public function programs(Request $request)
    {
        if ($request->ajax()) {
            $programs = Program::with([
                    'university_name:id,university_name,logo,country_id,testrequired',
                    'programLevel:id,name',
                    'university_name.country_name:id,name'
                ])
                ->select('id', 'name', 'school_id', 'program_level_id', 'length', 'application_fee', 'tution_fee', 'currency', 'is_approved', 'programType')
                ->where('is_approved', 1)
                ->when($request->country, fn($q) =>
                    $q->whereHas('university_name', fn($sub) =>
                        $sub->where('country_id', $request->country)
                    )
                )
                ->when($request->university_id, fn($q) =>
                    $q->where('school_id', $request->university_id)
                )
                ->when($request->course, fn($q) =>
                    $q->where('name', 'like', '%' . $request->course . '%')
                )
                ->when($request->program_id, function ($q) use ($request) {
                    $programParam = $request->program_id;
                    if (is_numeric($programParam)) {
                        $q->where('id', $programParam);
                    } else {
                        $q->where('name', 'like', '%' . $programParam . '%');
                    }
                })
                ->latest()
                ->paginate(12);
    
            return response()->json(['data' => $programs]);
        }
    
        // No heavy loading here, dropdowns will use AJAX
        return view('frontend.programs');
    }
    
    // AJAX search for universities
   public function searchUniversities(Request $request)
    {
        
        $term = $request->get('term', '');

        $universities = University::select('id', 'university_name')
            ->where('is_approved', 1) // Only approved universities
            ->when($term, function ($query) use ($term) {
                return $query->where('university_name', 'like', "%$term%");
            })
            ->limit(20)
            ->get();

        return response()->json($universities);
    }
    
    // AJAX search for programs
    public function searchPrograms(Request $request)
    {
      
        $term = $request->get('term', '');
        $programs = Program::select('id', 'name')
            ->where('is_approved', 1)
            ->when($term, fn($q) => $q->where('name', 'like', "%$term%"))
            ->limit(20)
            ->get();
 
        return response()->json($programs);
    }
    
    public function about_oel()
    {
        return view('frontend.about_oel');
    }

    public function contact_us()
    {
        return view('frontend.contact_us');
    }

    public function  user_query(Request $request)
    {

        $validatedData = $request->validate([
            'agfirst_name' => 'required|max:235',
            'aglast_name' => 'required|max:235',
            'agMobileno' => 'required|numeric',
        ]);
        Contactus::create([
            "first_name" => $request->agfirst_name,
            "last_name" => $request->aglast_name,
            "phone_code" => $request->phone_code ?? null,
            "phone" => $request->agMobileno,
            "email" => $request->agemailId ??  null,
            "preferred_study_destination" => $request->preferred_study_destination  ?? null,
            "preferred_study_year" => $request->preferred_study_year ?? null,
            "preferred_study_intake" => $request->preferred_study_intake ?? null,
            "message" => $request->agMessage ?? null,
            "source" => 'Website',
            "type" => $request->type ?? null
        ]);

        session()->flash('message', 'We have successfully received your message, We are working hard to get in touch with you as soon as possible. Thank you for your patience.');
        return redirect()->back();
    }

    public function storeContactusold(Request $request)
    {
        

        $validatedData = $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/',
            'phone' => 'required|numeric',

        ]);
        Contactus::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,

            // "phone_code" => $request->phone_cod e,
            "phone" => $request->phone ?? null,
            "preferred_study_destination" => $request->preferred_study_destination,
            "preferred_study_year" => $request->preferred_study_year,
            "preferred_study_intake" => $request->preferred_study_intake
        ]);
        try {
            // Rate limiting check should be done first, before any email sending.
            if (RateLimiter::tooManyAttempts('email:' . $request->ip(), 5)) {
                return response()->json([
                    'message' => 'Too many email requests. Please wait a minute before trying again.'
                ], 429);
            }
            $country_name =  Country::where('id', $request->preferred_study_destination)->first();
            $name = $country_name->name;
            // Prepare the email details
            $mail_details = [
                'name' => $request->first_name,
                "phone" => $request->phone,
                "preferred_study_destination" => $name,
                "preferred_study_year" => $request->preferred_study_year,
                "preferred_study_intake" => $request->preferred_study_intake
            ];

            // Send the email to the admin
            Mail::to('vinay.jaisval2015@gmail.com')->send(new ContactMail($mail_details));

            // Send the email to the system's configured address
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($mail_details));

            // Record the attempt to prevent rate limiting
            RateLimiter::hit('email:' . $request->ip());

            // Flash success message to the session and redirect
            session()->flash('message', 'We have successfully received your message. We are working hard to get in touch with you as soon as possible. Thank you for your patience.');
            return redirect()->back();
        } catch (\Exception $e) {
            // Catch any errors that occur during the email sending process
            return response()->json(['message' => 'Failed to send email: ' . $e->getMessage()], 500);
        }
    }
  
  public function storeContactus(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|regex:/^[a-zA-Z]+$/',
        'last_name'  => 'required|regex:/^[a-zA-Z]+$/',
        'phone'      => 'required|numeric',
    ]);

    // 1️⃣ Store in Contactus
    $contact = Contactus::create([
        "first_name" => $request->first_name,
        "last_name"  => $request->last_name,
        "phone"      => $request->phone,
        "preferred_study_destination" => $request->preferred_study_destination,
        "preferred_study_year"        => $request->preferred_study_year,
        "preferred_study_intake"      => $request->preferred_study_intake,
    ]);

    // 2️⃣ Store in StudentByAgent with source = contactus
     StudentByAgent::firstOrCreate(
            ['phone_number' => $request->phone],
            [
                "first_name" => $request->first_name,
                "last_name"  => $request->last_name,
                "intake_year"        => $request->preferred_study_year,
                "lead_status"        => 1,
                "source"     => "contactus",   // 👈 important
            ]
        );


    try {
        // 3️⃣ Rate limit check
        if (RateLimiter::tooManyAttempts('email:' . $request->ip(), 5)) {
            return response()->json([
                'message' => 'Too many email requests. Please wait a minute before trying again.'
            ], 429);
        }

        $country = Country::find($request->preferred_study_destination);

        $mail_details = [
            'name'  => $request->first_name,
            'phone' => $request->phone,
            'preferred_study_destination' => $country?->name,
            'preferred_study_year'        => $request->preferred_study_year,
            'preferred_study_intake'      => $request->preferred_study_intake
        ];

        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($mail_details));

        RateLimiter::hit('email:' . $request->ip());

        session()->flash(
            'message',
            'We have successfully received your message. We will contact you soon.'
        );

        return redirect()->back();

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to send email: ' . $e->getMessage()
        ], 500);
    }
}


    public  function blogs()
    {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('frontend.blogs', compact('blogs'));
    }

    public function blog_details($title)
    {
        $blog = Blog::where('slug', $title)
                    ->where('status', 1)
                    ->first();

        if (!$blog) {
            abort(404);
        }

        return view('frontend.blog_details', compact('blog'));
    }

    public function testimonials()
    {
        $testimonials = Testimonials::where('status', 1)->get();
        return view('frontend.testimonials', compact('testimonials'));
    }

    public function frequently_asked_questions()
    {
        $faqs = Faq::where('status', 1)->get();
        return view('frontend.faq', compact('faqs'));
    }

    public function privacy_policy()
    {
        return view('frontend.privacy_policy');
    }

    public function program_offered()
    {
        return view('frontend.program-offered');
    }


    public function programs_offered_filter(Request $request)
    {

        $programs = Program::where('name', 'like', '%' . $request->program_name . '%')->where('is_approved', 1)->get();
        return view('frontend.offered-program', compact('programs'));
    }


    public function getCountries(Request $request)
    {

        $searchTerm = $request->input('search', '');  // Get the search term
        $page = $request->input('page', 1);  // Get the page number

        $countries = Country::where('name', 'LIKE', "%{$searchTerm}%")
            ->paginate(30);  // You can adjust the number 30 to the number of items per page

        return response()->json([
            'items' => $countries->items(),
            'total_count' => $countries->total(),
        ]);
    }
}
