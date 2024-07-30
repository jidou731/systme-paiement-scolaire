@extends('layout.layout')
@section('content')
<form onsubmit="return verifier_nom_niveau()" action="{{ route('niveau.update',$niveau->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">

        <div class="col-md-11 mt-3">
            <div class="card">
                <div class="card-header">{{ __('message.Ajouter Niveau') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">{{ __('message.Nom') }}</label>
                                <input type="text" name="nom" id="niveau" class="form-control"
                                    value="{{ (old('nom')) ? old('nom'): $niveau->nom }}">
                                @error('nom')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">{{ __('message.Enregistre') }}</button>
                                <a href="{{ route('niveau.index') }}" class="btn btn-danger">{{ __('message.Annuler')
                                    }}</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection