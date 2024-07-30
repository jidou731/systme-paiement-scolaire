@extends('layout.layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-11 mt-3">
        <div class="card">
            <div class="card-header">{{ __('message.Modifier un paiement') }}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card bg-light" style="width: 80%">
                            <div class="card-header" style="font-family: monospace">{{ __('message.Etudiant') }}</div>
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: monospace">{{ __('message.Matricule') }}:{{
                                    $paiement->etudiant->id }}</h5>
                                <h6 class="card-text" style="font-family: monospace">
                                    {{ __('message.Nom et Prenom') }}: {{ $paiement->etudiant->nom."
                                    ".$paiement->etudiant->prenom}}
                                </h6>
                                <h6 class="card-text">
                                    <span dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"> {{
                                        __('message.Niveau') }}: {{ $paiement->etudiant->niveau->niveau_nom}}</span>
                                </h6>
                                <h6 class="card-text bg-info text-white">
                                    <span style="font-family: monospace">{{ __('message.prix mentiel') }} : {{
                                        $paiement->etudiant->prix_mentiel." " }}{{ __('message.UM') }}</span>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <form action="{{route('paiement.update',$paiement->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card" style="padding-bottom:40px;">
                                <div class="card-header">
                                    {{ __('message.Type De Paiement') }} :
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <label for="">{{ __('message.Espece') }}</label>
                                        <input type="radio" name="type_paiement_fr" value="Espece" {{
                                            $paiement->type_paiement_fr == 'Espece' ? 'checked' : '' }}>
                                        <label for="">{{ __('message.Virement') }}</label>
                                        <input type="radio" name="type_paiement_fr" value="Virement" {{
                                            $paiement->type_paiement_fr == 'Virement' ? 'checked' : '' }}>
                                    </li>
                                    <li class="list-group-item">
                                        <label for="">{{ __('message.Effet') }}</label>
                                        <input type="radio" name="type_paiement_fr" value="Effet" {{
                                            $paiement->type_paiement_fr == 'Effet' ? 'checked' : '' }}>
                                        <label for="">{{ __('message.Check') }}</label>
                                        <input type="radio" name="type_paiement_fr" value="Check" {{
                                            $paiement->type_paiement_fr == 'Check' ? 'checked' : '' }}>
                                    </li>
                                </ul>
                                @error('type_paiement_fr')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="checkAll"
                                        onchange="cocher(this)" name="">
                                    {{ __('message.Tout Cocher') }} <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                </label>
                            </div>
                            <input type="hidden" name="etudiant_id" value="{{ $paiement->etudiant->id  }}"
                                class="form-control">
                            @error('etudiant_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <table border="1" cellspacing="0">
                            <tr>
                                @foreach ($mois as $item)
                                @if(!$paiement->etudiant->mois_retard->pluck('moi_id')->contains($item->id))
                                <td>
                                    <input type="checkbox" class="checkbox" name="mois[]" id="mois"
                                        value="{{  $item->id  }}" {{
                                        $paiement->etudiant->mois_payes->pluck('moi_id')->contains($item->id)? 'checked'
                                    :'' }}
                                    {{ (is_array(old('mois')) && in_array($item->id, old('mois'))) ? ' checked' : '' }}
                                    >
                                    <label for="" style="font-family: monospace;">
                                        {{ $item->nom }}
                                    </label>
                                </td>
                                @endif

                                @endforeach
                            </tr>
                        </table>
                        @error('mois')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col" style="padding-top: 37px;">
                        <div class="form-group">
                            <input type="text" name="total_payer" id="total" class="form-control"
                                style="font-family: monospace" placeholder="{{ __('message.Entrer le montant') }}">
                            @error('total_payer')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-success">{{ __('message.Enregistre') }}</button>
                            <a href="{{ route('paiement.index') }}" class="btn btn-danger">{{ __('message.Annuler')
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