@extends('layouts.admin')

@section('content')

    <div class="row">

        {{-- @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-end text-white btn-sm">Ajouter un produit</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Catégorie</th>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->selling_price }} <span class="text-warning">FG</span></td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->status == '1' ? 'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-success text-white">Modifier</a>
                                    <a href="" class="btn btn-sm btn-danger text-white">Supprimer</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Pas de produit</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection