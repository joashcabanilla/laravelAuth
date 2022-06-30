@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="add-user-container">
        <a href="user/import" class="btn btn-primary mb-3">Import Data</a>
        <a href="user/exportExcel" class="btn btn-primary mb-3">Export Data Excel</a>
        <a href="user/exportCSV" class="btn btn-primary mb-3">Export Data CSV</a>
        <a href="user/exportPDF" class="btn btn-primary mb-3">Export PDF</a>
    </div>
        <div class="containerTable">
            <div class="table-container">
                <table class="table-striped table userTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $item)
                            @php
                                $lastname = strtoupper($item['lastname']);
                                $firstname = strtoupper($item['firstname']);
                                $middlename = substr(strtoupper($item['middlename']),0,1);
                                $birthdate = substr($item['birthdate'],5,2) . "/" . substr($item['birthdate'],8,2) . "/" . substr($item['birthdate'],0,4);
                            @endphp
                            <tr>
                                <td>{{$lastname}}, {{$firstname}} {{$middlename}}.</td>
                                <td>{{$birthdate}}</td>
                                <td>{{$item['age']}}</td>
                                <td>{{$item['email']}}</td>
                                <td>{{$item['phone_number']}}</td>
                                <td class="action-td">
                                    <a class="btn btn-success" href="edit/{{$item['id']}}"><span class="material-symbols-rounded">edit</span></a>
                                    <button class="btn btn-danger" id="deletebtn-{{$item['id']}}"><span id="deletebtn-{{$item['id']}}" class="material-symbols-rounded">delete</span></button>
                                </td>   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <script src="js/table.js"></script>

</div>
@endsection
