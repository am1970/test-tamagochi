@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Your animal</div>

                    <div class="card-body" id="animal">
                        <animal :animal="{{$animal}}"></animal>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
