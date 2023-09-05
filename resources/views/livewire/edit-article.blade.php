<form wire:submit.prevent="article_update"></form>
<div class="mb-3">
    <input type="file" wire:model="temporary_images"
        class="form-control  @error('temporary_images.*') is-invalid @enderror" multiple placeholder="Img/">
    @error('temporary_images.*')
        <p class="text-danger mt-2">{{ $message }}</p>
    @enderror
</div>
@if (!empty($images))
    <div class="row">
        <div class="col-12">
            <h5 class="text-muted">Photo preview:</h5>
            <div class="row rounded py-4 justify-content-around">
                @foreach ($images as $key => $image)
                    <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                        <div class="img-preview mx-auto shadow rounded"
                            style="background-image: url({{ $image->temporaryUrl() }});"> <img
                                src="{{ $image->temporaryUrl() }}}}" alt="" class="img-fluid"></div>

                        <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                            wire:click="removeImage({{ $key }})">Cancella</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
