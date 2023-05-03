@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{ url('admin/products') }}" class="btn btn-danger float-end text-white btn-sm">Retour</a>
                    </h4>
                </div>
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form  autocomplete="true" action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Acceuil</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">Seo Tag</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Image du produit</button>
                              </li>
                            
                        </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-4  show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">---------------</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="mb-3">
                                    <label for="">Nom de Produit</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Produit Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                </div>
    
                                <div class="mb-3">
                                    <label for="">Choisir Une marque</label>
                                    <select name="brand" id="" class="form-control">
                                        <option value="">------------</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="mb-3">
                                    <label for="">Small Description</label>
                                    <textarea name="small_description" class="form-control" rows="4"></textarea>
                                </div>
    
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-4" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
    
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>
    
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4"></textarea>
                                </div>
    
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                                </div>
    
                                
    
                            </div>


                            <div class="tab-pane fade border p-4" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Prix Original</label>
                                            <input type="text" name="original_price" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Prix Moyen</label>
                                            <input type="text" name="selling_price" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantité</label>
                                            <input type="number" name="quantity" class="form-control">
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Tranding</label>
                                            <input type="checkbox" name="trending">
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade border p-4" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Selectionner l'image</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade border p-4" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
                                
                            </div>
                          </div>
    
                          <div>
                            <button type="submit" class="btn-primary text-white">Valider</button>
                          </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection