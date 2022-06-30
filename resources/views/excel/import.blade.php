@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header importUserHeader">
                    Import User Data
                </div>
                <div class="card-body">
                    <form  class="importUserForm" enctype="multipart/form-data" action="{{route('user.import')}}" method="POST">
                        @csrf
                        <div class="form-group importUserFormDiv">
                            <label for="file">Import User Excel File</label>
                            <input type="file" name="file" class="form-control" required />
                        </div>
                        <div class="importUserSubmit"> 
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection