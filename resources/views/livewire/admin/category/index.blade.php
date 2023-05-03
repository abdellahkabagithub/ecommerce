<div>

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de la catégorie</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Vous êtes sûr de supprimer cette catégorie ? </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Oui. Supprimer</button>
                </div>
            </form>
          </div>
        </div>
      </div>

    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Catégories
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary float-end text-white btn-sm">Nouvelle Catégorie</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td>{{ $categorie->name }}</td>
                                    <td>{{ $categorie->status = '1' ? 'Hidden': 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$categorie->id.'/edit') }}" class="btn btn-success btn-sm text-white font-bold">Modifier</a>
                                        <a href="" wire:click="deleteCategory({{ $categorie->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger text-white font-bold">Supprimer</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <div>{{ $categories->links() }}</div>
                    </table>
                </div>
            </div>
        
        </div>
    </div>
</div>

@push('script')
   <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide')
        })
    </script> 
@endpush
