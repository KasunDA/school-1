@extends('layouts.app')

@section('content')
<div class="padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header"><h3>داشبورد</h3></div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    شما وارد شده اید!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
