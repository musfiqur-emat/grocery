@extends('developer.layouts.base')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>
                    <h4>To see the item list, <a style="text-decoration: none" href="{{url('items')}}">click here !</a></h4>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
