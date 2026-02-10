@extends('frontend.layouts.main')
@section('title', 'Programs')
@section('content')
<style>
    .program_title_honors {
        height: 100% !important;
    }
    /* Mobile-friendly filter section */
    .search_dropdown {
        flex-wrap: wrap;
        gap: 10px;
    }
    .search_dropdown select,
    .search_dropdown .serch_btn {
        min-width: 200px;
        flex: 1;
    }
    @media (max-width: 768px) {
        .search_dropdown {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>

<section>
    <div class="university_title">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="fw-bold">Find your Program</h1>
                </div>
                <form action="{{ route('programs') }}" method="get">
                    <div class="row g-2 mt-4">
                        <div class="col-md-3 col-sm-6 col-12">
                            <select id="country_search" name="country" class="form-control">
                                <option value="">--Select Country--</option>
                                @foreach(\App\Models\Country::where('is_active', 1)->select('id','name')->get() as $c) <option value="{{ $c->id }}">{{ $c->name }}</option> @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <select id="university_search" name="university_id" class="form-control"></select>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <select id="program_search" name="program_id" class="form-control"></select>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <button class="serch_btn w-100 border-0 text-white rounded px-4 py-2" style="background:#007bff;">
                                Search
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<section>
    <div class="program_title my-5">
        <div class="container">
            <div class="row h-100 gy-4" id="program-data"></div>
            <div class="ajax-load text-center" style="display:none">
                <i class="fa fa-spinner"></i> Loading ...
            </div>
            <div class="no-data text-center mb-4" style="display:none">
                <b>No data - last page</b>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript_section')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function () {
    function getParams() {
        return new URLSearchParams(window.location.search).toString();
    }

    function renderPrograms(data) {
        let assetBaseUrl = "{{ asset('') }}/";
        return data.map(item => `
            <div class="col-lg-4 col-md-6 col-12">
                <div class="program_title_honors p-3 border rounded">
                    <div class="main_ors_title d-flex gap-3">
                        <div class="foundation_ttile">
                            <img src="${assetBaseUrl}${item.university_name?.logo || ''}" alt="logo" style="max-width:60px;">
                        </div>
                        <div class="low_title fw-bold">
                            <h2 class="fw-bold">${item.name}</h2>
                            <span class="fw-medium">${item.university_name?.university_name || ''}</span>
                        </div>
                    </div>
                    <div class="fees_structure mt-4">
                        <ul>
                            <li>Level: ${item.program_level?.name || 'N/A'}</li>
                            <li>Duration: ${item.length} month</li>
                            <li>Application Fees: ${item.application_fee}</li>
                            <li>1st Year Tuition Fees: ${item.currency} ${item.tution_fee}</li>
                            <li>Exams Required: ${item.university_name?.testrequired || 'N/A'}</li>
                        </ul>
                    </div>
                    <hr>
                    <p class="small">Fees may vary according to university current structure and policy</p>
                    <hr>
                    <div class="uni_king">
                        <span>${item.university_name?.country_name?.name || ''} - ${item.programType || ''}</span>
                        <div class="deatils_view mt-2">
                            <a href="{{ url('course-details') }}/${item.id}" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    }

    function loadData(page) {
        $.ajax({
            url: `?page=${page}&${getParams()}`,
            type: 'GET',
            beforeSend: () => $('.ajax-load').show(),
            success: (response) => {
                $('.ajax-load').hide();
                if (response.data.data.length === 0) {
                    $('.no-data').show();
                    return;
                }
                $('#program-data').append(renderPrograms(response.data.data));
            }
        });
    }

    // Initial load
    loadData(1);

    // Infinite scroll
    let page = 2, loading = false;
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !loading) {
            loading = true;
            loadData(page++);
            setTimeout(() => loading = false, 500);
        }
    });

    // Select2 dropdowns
    $("#country_search").select2({ placeholder: "Select Country", allowClear: true, width: '100%' });

    $("#university_search").select2({
        placeholder: "Search University",
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('ajax.universities') }}",
            dataType: 'json',
            delay: 250,
            data: params => ({ term: params.term }),
            processResults: data => ({
                results: data.map(item => ({ id: item.id, text: item.university_name }))
            })
        }
    });

    $("#program_search").select2({
        placeholder: "Search Program",
        allowClear: true,
        width: '100%',
        ajax: {
            url: "{{ route('ajax.programs') }}",
            dataType: 'json',
            delay: 250,
            data: params => ({ term: params.term }),
            processResults: data => ({
                results: data.map(item => ({ id: item.id, text: item.name }))
            })
        }
    });
});
</script>
@endsection
