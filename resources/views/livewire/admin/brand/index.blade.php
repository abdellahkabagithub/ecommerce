<div>

    @include('livewire.admin.brand.modal-form')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Liste des Marques
                        <a href="" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary btn-sm float-end text-white">Ajouter une marque</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="#" wire:click="editBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#updateBrandModal"  class="btn btn-success text-white font-bold">Modifier</a>
                                    <a href="#" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal"   class="btn btn-danger text-white font-bold">Supprimer</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Aucune marque trouvée</td>
                                </tr>
                            @endforelse
                                
                        </tbody>

                        <div>{{ $brands->links() }}</div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
   <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide')
            $('#updateBrandModal').modal('hide')
            $('#deleteBrandModal').modal('hide')
        })
    </script> 
@endpush