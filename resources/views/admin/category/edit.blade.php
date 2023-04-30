@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Modification des Catégories
                    <a href="{{ url('admin/category') }}" class="btn btn-primary float-end text-white btn-sm">Retour</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                   <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ $category->name }} " >

                            @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control"  rows="3">{{ $category->description }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="60px" alt="">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                             @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked': '' }}> 
                        </div>

                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Keybooard</label>
                            <textarea name="meta_keyword" class="form-control"  rows="3">{{ $category->meta_keyword }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control"  rows="3">{{ $category->meta_description }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Enregistré</button>
                        </div>
                   </div>

                </form>
            </div>
        </div>
       
    </div>
</div>

@endsection