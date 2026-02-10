@extends('admin.include.app')
@section('main-content')
<div class="page-header">
    <div class="row">
      <div class="card card-buttons">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <ol class="breadcrumb text-muted mb-0">
                <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item text-muted">Leads List </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="card card-stretch-full">
      <div class="card-body">
        <div class="card-header  d-flex">
            <h5 class="card-title">{{ isset($leads_data['leads_name']) ? ucfirst($leads_data['leads_name']) : 'N/A' }}</h5>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <div class="col-12"></div>
        <br>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>S.N</th>
                      <th>Date</th>
                      <th> Source </th>
                      <th> Name </th>
                      <th> PinCode</th>
                      <th> Phone</th>
                      <th> Email</th>
                      <th> Comment </th>
                      <th> Intereset</th>
                      <th> Course </th>
                      <th> Intake </th>
                      <th> IntakeYear </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($leads_data['leads'] as $data)
                    <tr>
                        <td>
                            <input type="checkbox" >
                        </td>
                      <td>
                        <a href="#">{{$i}}</a>
                      </td>
                      <td>
                        <a href="#">{{$data->created_at}}</a>
                      </td>
                      <td> {{$data->source}}</td>
                      <td>{{ $data->zip }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->phone_number }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->student_comment }}</td>
                      @php
                      $interest = App\Models\Intrested::where('is_deleted', '0')->where('id', $data->interested)->first();
                     @endphp
                       <td>{{ $interest->name ?? '' }}</td>
                      <td>{{ $data->course }}</td>
                      {{-- <td>{{ DateTime::createFromFormat('m', $data->intake)->format('F') ?? '' }}</td> --}}
                    <td>
                        @php
                        $dateTime = DateTime::createFromFormat('m', $data->intake);
                        $formattedDate = $dateTime ? $dateTime->format('F') : '';
                        @endphp
                        {{ $formattedDate }}
                    </td>
                      <td>{{ $data->intake_year }}</td>
                      <td class="text-end">
                        <div class="dropdown dropdown-action">
                          <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('manage-lead',[$data->id])}}">
                              <i class="fa-solid fa-pencil m-r-5"></i> Manage Lead </a>

                            <a class="dropdown-item" href="{{route('edit-lead',[$data->id])}}">
                              <i class="fa-solid fa-pencil m-r-5"></i> Edit </a>

                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="row">
                  <div class="
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        {{ $leads_data['leads']->links() }}
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div></div>
        <br>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection



