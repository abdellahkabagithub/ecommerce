<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1"    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une marque</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" wire:submit.prevent="storeBrand">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Nom de la marque</label>
                    <input type="text" wire:model.defer='name' class="form-control">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" wire:model.defer='slug' class="form-control">

                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="">Status</label> <br>
                    <input type="checkbox" wire:model.defer='status' /> 

                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Enregistré</button>
              </div>
        </form>
      </div>
    </div>
</div>


<!--Brand-update-->

<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1"    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier une marque</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div wire:loading class="p-2"> 
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> Loading...
        </div>
        <div wire:loading.remove>
            <form action="" wire:submit.prevent="updateBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nom de la marque</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" wire:model.defer='slug' class="form-control">

                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Status</label> <br>
                        <input type="checkbox" wire:model.defer='status' /> 

                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button"wire:click="closeModal" class="btn btn-secondary text-white" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary text-white">Modifier</button>
                </div>
            </form>
        </div>
        
      </div>
    </div>
</div>



<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1"    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer cette Marque </h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div wire:loading class="p-2"> 
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> Loading...
        </div>
        <div wire:loading.remove>
            <form action="" wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                    <h4>Vous êtes sûr de supprimer ça ? </h4>
                </div>
                <div class="modal-footer">
                <button type="button"wire:click="closeModal" class="btn btn-secondary text-white" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary text-white">Oui. Supprimer</button>
                </div>
            </form>
        </div>
        
      </div>
    </div>
</div>