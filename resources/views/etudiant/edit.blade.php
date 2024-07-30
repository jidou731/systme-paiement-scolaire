@extends('layout.layout')
@section('content')
<form onsubmit="return verifier_numero()" action="{{route('etudiant.update',$etudiant->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">

        <div class="col-md-11 mt-3">
            <div class="card">
                <div class="card-header">{{ __('message.Modifier Un Etudiant') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.id') }}</label>
                                <input type="text" name="code" disabled
                                    value="{{ (old('code')) ? old('code'): $etudiant->code }}" id="id"
                                    class="form-control">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Nom en arabe') }}</label>
                                <input type="text" name="nom_ar"
                                    value="{{ (old('nom_ar')) ? old('nom_ar'): $etudiant->nom_ar }}" id="nom"
                                    class="form-control">
                                @error('nom_ar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Nom en francais') }}</label>
                                <input type="text" name="nom_fr"
                                    value="{{ (old('nom_fr')) ? old('nom_fr'): $etudiant->nom_fr }}" id="nom"
                                    class="form-control">
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
                                <input type="text"
                                    value="{{ (old('prenom_ar')) ? old('prenom_ar'): $etudiant->prenom_ar }}"
                                    name="prenom_ar" id="prenom" class="form-control">
                                @error('prenom_ar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.Prenom en francais') }}</label>
                                <input type="text"
                                    value="{{ (old('prenom_fr')) ? old('prenom_fr'): $etudiant->prenom_fr }}"
                                    name="prenom_fr" id="prenom" class="form-control">
                                @error('prenom_fr')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check text-center mt-4">
                                <label class="form-check-label mr-5">
                                    <input type="radio" {{ $etudiant->sexe_fr == 'Homme' ? 'checked' : '' }}
                                    class="form-check-input " name="sexe_fr" id="" value="Homme">
                                    {{ __('message.Homme') }}

                                </label>
                                <label class="form-check-label">
                                    <input type="radio" {{ $etudiant->sexe_fr == 'femme' ? 'checked' : '' }}
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
                                <select class="form-control" name="niveau_id" id="niveau">
                                    <option value="" selected="false">{{ __('message.selectioner niveau') }}</option>
                                    @foreach ($niveaux as $item)
                                    <option @if(old('niveau_id')==$item->id)
                                        {{ 'selected' }}
                                        @elseif($etudiant->niveau_id==$item->id)
                                        {{ 'selected' }}
                                        @endif value="{{$item->id}}">{{ $item->nom }}</option>
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
                                <input type="date"
                                    value="{{ (old('date_naissance')) ? old('date_naissance'): $etudiant->date_naissance }}"
                                    name="date_naissance" id="" class="form-control">
                                @error('date_naissance')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.date dinscription') }}</label>
                                <input type="date"
                                    value="{{ (old('date_inscription')) ? old('date_inscription'): $etudiant->date_inscription }}"
                                    name="date_inscription" id="" class="form-control">
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
                                <input type="text" value="{{ (old('numero')) ? old('numero'): $etudiant->numero }}"
                                    name="numero" id="telephone" class="form-control">
                                @error('numero')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> {{ __('message.Telephone Parent') }}</label>
                                <input type="text"
                                    value="{{ (old('numero_parent')) ? old('numero_parent'): $etudiant->numero_parent }}"
                                    name="numero_parent" id="telephonep" class="form-control">
                                @error('numero_parent')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('message.prix mentiel') }}</label>
                                <input type="text"
                                    value="{{ (old('prix_mentiel')) ? old('prix_mentiel'): $etudiant->prix_mentiel }}"
                                    name="prix_mentiel" id="" class="form-control">
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
                                            <input type="checkbox" {{
                                                $etudiant->mois_retard->pluck('moi_id')->contains($item->id) ? 'checked'
                                            :'' }} name="mois_retard[]" id="mois" value="{{ (old('mois_retard[]')) ?
                                            old('mois_retard[]') : $item->id }}">

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