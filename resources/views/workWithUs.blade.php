<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                @if(session()->has('errorMessage'))
                <div class="col-9 col-md-6 alert alert-danger">
                    {{ session('errorMessage') }}
                </div>
                @endif
                <h1>Vuoi lavorare con noi? Diventa revisore!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8">
                <form action="{{ route('workSubmit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" disabled
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" class="form-control" disabled
                            value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        {{-- <label for="description" class="form-label">Raccontaci di te!</label> --}}
                        <textarea name="description" id="description" cols="30" rows="10"
                            class=" @error('description') is-invalid @enderror" placeholder="Raccontaci di te!"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
