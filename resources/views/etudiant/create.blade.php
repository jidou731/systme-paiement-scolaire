@extends('layout.layout')
@section('content')
<form onsubmit="return handleData()" action="{{ route('etudiant.store') }}" method="POST">
    @csrf
    <div class="row justify-content-center">

        <div class="col-md-11 mt-3">
            <div class="card">
                <div class="card-header">{{ __('message.Inscrire Un Etudiant') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.id') }}</label>
                                <input type="text" name="code" value="{{ old('code') }}" id="code" class="form-control"
                                    placeholder="{{ __('message.Entre le code') }}">
                                @error('code')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Nom en arabe') }}</label>
                                <input type="text" name="nom_ar" value="" id="nom" class="form-control"
                                    placeholder="{{ __('message.Entre le nom en arabe') }}">
                                @error('nom_ar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Nom en francais') }}</label>
                                <input type="text" name="nom_fr" value="" id="nom" class="form-control"
                                    placeholder="{{ __('message.Entre le nom en francais') }}">
                                @error('nom_fr')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Prenom en arabe') }}</label>
                                <input type="text" value="{{ old('prenom_ar') }}" name="prenom_ar" id="prenom"
                                    class="form-control" placeholder="{{ __('message.Entre le prenom en arabe') }}">
                                @error('prenom_ar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Prenom en francais') }}</label>
                                <input type="text" value="{{ old('prenom_fr') }}" name="prenom_fr" id="prenom"
                                    class="form-control" placeholder="{{ __('message.Entre le prenom en francais') }}">
                                @error('prenom_fr')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check text-center mt-4">
                                <label class="form-check-label mr-5">
                                    <input type="radio" {{ (old('sexe')=='Homme' ) ?'checked':'' }}
                                        class="form-check-input " name="sexe_fr" id="" value="Homme">
                                    {{ __('message.Homme') }}

                                </label>
                                <label class="form-check-label">
                                    <input type="radio" {{ (old('sexe')=='femme' ) ?'checked':'' }}
                                        class="form-check-input" name="sexe_fr" id="" value="femme">
                                    {{ __('message.femme') }}
                                </label>
                                @error('sexe_fr')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Niveau') }}</label>
                                <select class="form-control niveau" name="niveau_id" id="niveau">
                                    <option value="" selected="false">{{ __('message.selectioner niveau') }}</option>
                                    @foreach ($niveaux as $item)
                                    <option {{ (old('niveau_id')==$item->id) ? 'selected':'' }} value="{{ $item->id
                                        }}">{{ $item->nom }}</option>
                                    @endforeach
                                </select>
                                @error('Niveaux_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Date Naissance') }}</label>
                                <input type="date" value="{{ old('date_naissance') }}" name="date_naissance" id=""
                                    class="form-control">
                                @error('date_naissance')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.date dinscription') }}</label>
                                <input type="date" value="{{ old('date_inscription') }}" name="date_inscription" id=""
                                    class="form-control">
                                @error('date_inscription')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('message.Telephone') }}</label>
                                <input type="text" value="{{ old('numero') }}" name="numero" id="telephone"
                                    class="form-control">
                                @error('numero')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('message.Telephone Parent') }}</label>
                                <input type="text" value="{{ old('numero_parent') }}" name="numero_parent"
                                    id="telephonep" class="form-control">
                                @error('numero_parent')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.prix mentiel') }}</label>
                                <input type="text" value="{{ old('prix_mentiel') }}" name="prix_mentiel" id=""
                                    class="form-control">
                                @error('prix_mentiel')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <table border="1" cellspacing="0">
                                    <td colspan="10"> <span style="font-family: monospace ; color:rgb(2, 183, 255)">{{
                                            __('message.Cocher les mois que letudiant non suivi si non passer')
                                            }}</span></td>

                                    <tr>
                                        @foreach ($mois as $item)
                                        <td class="text-center">
                                            <input type="checkbox" name="mois_retard[]" id="mois"
                                                value="{{  $item->id  }}">
                                        </td>
                                        @endforeach
                                        <td class="text-center">
                                            <input type="checkbox" id="checkAll" onchange="cocher(this)" name="">
                                        </td>
                                    </tr>
                                    <tr>

                                        @foreach ($mois as $item)
                                        <td class="text-center">
                                            <label style="font-family: monospace ; color:rgb(255, 2, 2)" for="">
                                                {{ $item->nom }}
                                            </label>
                                        </td>
                                        @endforeach
                                        <td class="text-center">
                                            <label style="font-family: monospace ; color:rgb(23, 20, 240)" for="">
                                                {{ __('message.Tout Cocher') }}
                                            </label>

                                        </td>

                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-success">{{ __('message.Enregistre') }}</button>
                                <a href="{{ route('etudiant.index') }}" class="btn btn-danger">{{ __('message.Annuler')
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
@section('etudiantjavascript')
<script>
    $("#niveau").select2({
        placeholder: "{{ __('message.selectioner niveau') }}"
        , allowClear: true
    , });

</script>
@stop