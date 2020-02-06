@extends('layouts.backend.app')

@section('title', 'Phone Model')

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD DEVICE MODEL
                    </h2>
                </div>
                <div class="body">
                    <form  action="{{ route('phone.store') }}" method="POST">
                        @csrf
                        <label for="name">Model Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" placeholder="Enter the model name">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                        <a href="{{ route('phone.index') }}" class="btn btn-danger waves-effect">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->
@endsection

@push('js')

@endpush