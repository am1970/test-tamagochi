@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Choice Animal</div>

                    <div class="card-body" id="choice-animal">
                        <animal-list></animal-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
