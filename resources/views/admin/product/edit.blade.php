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
                    <h2>
                        EDIT PRODUCT
                    </h2>
                </div>
                <div class="body">
                    <form  action="{{ route('product.update',$product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name">Product Name</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                        <a href="{{ route('product.index') }}" class="btn btn-danger waves-effect">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->
@endsection

@push('js')

@endpush