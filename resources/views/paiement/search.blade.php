@extends('layout.layout')
@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif
</div>
<div class="row justify-content-center">
    <div class="col-md-11 mt-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
                        @if(isset($niveau_name))
                        {{ __('message.Liste des Etudiant')}} {{ $niveau_name }} {{ __('message.Non Payer le mois')}} {{
                        $mois_name }}
                        @endif
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <button class="btn btn-warning" {{ (count($etudiant)==0)?'disabled':'' }}
                                onclick="printcontent('divp')"> <span
                                    style="font-family:'Times New Roman', Times, serif">{{ __('message.Imprimer')
                                    }}</span> <i class="fas fa-print"></i></button>
                            <a href="{{ route('paiement.index') }}" style="font-family:'Times New Roman', Times, serif"
                                class="btn btn-success">{{ __('message.Retourner') }}</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div id="divp">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr style="text-align: center;">
                                <th scope="col">{{ __('message.Matricule') }}</th>
                                <th scope="col">{{ __('message.Nom') }}</th>
                                <th scope="col">{{ __('message.Prenom') }}</th>
                                <th scope="col">{{ __('message.Classe') }}</th>
                                <th scope="col">{{ __('message.Type Paiement') }}</th>
                                <th scope="col">{{ __('message.Total Paiement') }}</th>
                                <th scope="col">{{ __('message.Rest Du Paiement') }}</th>
                                <th scope="col">{{ __('message.Mois') }}</th>
                                <th scope="col">{{ __('message.Date Paiement') }}</th>
                            </tr>
                        </thead>
                        @foreach ($etudiant as $item)
                        <tbody>
                            <tr class="shadow-lg p-3 mb-5 bg-white rounded " style="text-align: center;">
                                <th scope="col">{{ $item->id }}</th>
                                <td scope="col">
                                    @if(LaravelLocalization::getCurrentLocale()=='fr')
                                    {{ $item->nom_fr }}
                                    @else
                                    {{ $item->nom_ar }}
                                    @endif
                                </td>
                                <td scope="col">
                                    @if(LaravelLocalization::getCurrentLocale()=='fr')
                                    {{ $item->prenom_fr }}
                                    @else
                                    {{ $item->prenom_ar }}
                                    @endif

                                </td>
                                <td scope="col">{{ $niveau_name }}</td>

                                <td scope="col"><i style="color: red;" class="fa fa-times" aria-hidden="true"></i></td>
                                <td scope="col"> {{ "0 " }}{{ __('message.UM') }} </td>
                                <td scope="col">{{ $item->prix_mentiel." " }}{{ __('message.UM') }}</td>
                                <td scope="col">
                                    <i style="color: red;" class="fa fa-times" aria-hidden="true"></i>
                                </td>
                                <td scope="col">
                                    <i style="color: red;" class="fa fa-times" aria-hidden="true"></i>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                    </table>
                </div>
                @if (count($etudiant)==null)
                <div class="alert alert-success text-center" role="alert">
                    {{ __('message.aucun etudiant') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection