@extends('layouts.backend.app')

@section('title', 'Products')

@push('css')

@endpush

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="card">
                <div class="header">
                    <h4>
                        Add Product
                    </h4>
                </div>
                <div class="body">
                    <form  action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <label for="name">Product Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" placeholder="Enter the product name">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger waves-effect">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->
@endsection

@push('js')

@endpush