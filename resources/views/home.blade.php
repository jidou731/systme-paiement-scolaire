@extends('layout.layout')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">
                <di class="card">
                    <div class="card-header">
                        {{ __('message.Statistique') }}
                    </div>
                    <div class="card-body">
                        <div style="margin:auto">
                            <div style="align-content: center; display: flex; width: 100%;">
                                <div style="font-size: 23px; width: 33.33%;">
                                    <div class="bg-info text-center text-white" style="width: 90%;  height: 140px;">
                                        <i style="font-size: 25px" class="fa fa-users text-white m-lg-2"
                                            aria-hidden="true"></i>
                                        {{ __('message.Etudiants') }}

                                        @php
                                            use App\Models\Etudiant;
                                            $etudiants = Etudiant::all();
                                            $nbr_etudiant = count($etudiants);
                                        @endphp
                                        <div>{{ $nbr_etudiant }}</div>
                                    </div>
                                </div>
                                <div style="font-size: 23px; width: 33.33%;">
                                    <div class="bg-warning text-center text-white" style="width: 90%; height: 140px;">
                                        <i class="fas fa-building "></i>
                                        {{ __('message.Niveaux') }}
                                        @php
                                            use App\Models\Niveau;
                                            $niveaux = Niveau::all();
                                            $nbr_niveaux = count($niveaux);
                                        @endphp
                                        <div>{{ $nbr_niveaux }}</div>
                                    </div>
                                </div>
                                <div style="font-size: 23px; width: 33.33%;">
                                    <div class="bg-danger text-center text-white" style="width: 90%;  height: 140px;">
                                        <i style="font-size: 25px;" class="fas fa-money-check-alt    "></i>
                                        {{ __('message.Paiements') }}
                                        @php
                                            use App\Models\Paiement;
                                            $paiements = Paiement::all();
                                            $nbr_paiements = count($paiements);
                                        @endphp
                                        <div>{{ $nbr_paiements }}</div>
                                    </div>
                                </div>
                                <div style="font-size: 23px; width: 33.33%;">
                                    <div class="bg-success text-center text-white" style="width: 90%;  height: 140px;">
                                        <i class="fas fa-dollar-sign"></i>
                                        {{ __('message.Recette') }}
                                        @php
                                            $paiements = Paiement::sum('total_payer');
                                            $somme = $paiements;
                                        @endphp
                                        <div>{{ $somme . ' ' }}{{ __('message.UM') }}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
