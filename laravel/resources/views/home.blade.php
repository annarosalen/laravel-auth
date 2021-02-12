@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('update-icon')}}" method='POST' enctype="multipart/form-data">

                        @csrf
                        @method('POST')

                        <input type="file" value="" name='icon'>

                        <br>
                        <br>

                        <input type="submit" value='UPDATE IMG'>

                    </form>

                </div>
            </div>


            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">


                    <h1>Ciao {{Auth::user() -> name}}</h1>

                    <img src="{{asset('storage/icon/' . Auth::user() -> icon)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
