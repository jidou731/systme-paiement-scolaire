@extends('layout.layout')
@section('content')
    @if (!isset($niveau_name) and !isset($niveau_nom))
        <form action="{{ route('searchPaiement') }}" method="Post">
            @csrf
            @method('POST')
            <div class="row justify-content-center">
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="card-header">


                            {{ __('message.Chercher') }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-control" name="niveau" id="niveau" required>
                                        <option value="" selected="false">
                                            {{ __('message.selectioner niveau') }}
                                        </option>
                                        @foreach ($niveaux as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="mois" id="month" required>
                                        <option value="" selected="false">
                                            {{ __('message.selectioner Mois') }}
                                        </option>
                                        @foreach ($mois as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="paiement" id="etat" required>
                                        <option value="" selected="false">
                                        </option>
                                        <option value="payer">
                                            {{ __('message.payer') }}
                                        </option>
                                        <option value="non payer">
                                            {{ __('message.non payer') }}
                                        </option>
                                        <option value="rest">
                                            {{ __('message.rest') }}
                                        </option>

                                    </select>

                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-primary rounded" type="submit" id="search" name="search">
                                        {{ __('message.Search') }}<i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
    @if ($message = Session::get('vide'))
        <div class="alert alert-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span class="text-center">{{ $message }}</span>
        </div>

    @endif
    <div class="row justify-content-center">
        @if (isset($niveau_nom) or isset($niveau_name))
            <div class="col-md-11 mt-2">
            @else
                <div class="col-md-12 mt-2">
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        @if (isset($niveau_name))
                            <span
                                dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">{{ __('message.Liste des Etudiant') }}
                                {{ $niveau_name }} {{ __('message.payer le mois') }} {{ $mois_name }}</span>
                        @elseif(isset($niveau_nom))
                            <span
                                dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">{{ __('message.Liste des Etudiant') }}
                                {{ $niveau_nom }} {{ __('message.payer avec rest le mois') }}
                                {{ $mois_name }}</span>
                        @else
                            <di class="row">
                                <div class="col-md-5">
                                    {{ __('message.Liste des Etudiant payer') }}

                                </div>
                                <div class="col-5">
                                    <form class="form-inline my-2 my-lg-0 mr-2" method="GET"
                                        action="{{ route('cherherpaiements') }}">
                                        @csrf
                                        <input class="form-control mr-sm-2" name="q" type="text"
                                            style="font-family:monospace" required
                                            placeholder="{{ __('message.Matricule') }}">
                                        <button class="btn btn-outline-success my-2 my-sm-0"
                                            type="submit">{{ __('message.Chercher') }}</button>
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-info" data-target="#modelId" data-toggle="modal"
                                        style="float: right; font-family:monospace;"
                                        type="submit">{{ __('message.Ajouter paiement') }}</button>

                                </div>



                    </div>
                    @endif
                </div>
                <div class="col-3">
                    @if (isset($niveau_name) or isset($niveau_nom))
                        <div class="form-group">

                            <button {{ $paiement->count() == 0 ? 'disabled' : '' }} class="btn btn-warning"
                                onclick="printcontent('divp')"> <span
                                    style="font-family:'Times New Roman', Times, serif">{{ __('message.Imprimer') }}</span>
                                <i class="fas fa-print"></i></button>
                            <a href="{{ route('paiement.index') }}" style="font-family:'Times New Roman', Times, serif"
                                class="btn btn-success">{{ __('message.Retourner') }}</a>
                        </div>

                    @endif
                </div>

            </div>

        </div>
        <div class="card-body">
            <div class="container">
                <div id="div_mois" style="
        background: #6c757d;
        width: 13rem;
        border-radius: 1rem;
        padding: 1rem;
        color: rgb(255, 255, 255);
        position: absolute;
        left: 41%;
        text-align: center;
        box-shadow: 0px -1rem 16rem 0rem #0000005e;
        border: 1px solid #fff;display:none">
                    <button class="btn btn-warning p-1 mt-2" id="fermer">{{ __('message.Fermer') }}</button>
                </div>
            </div>
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span class="text-center">{{ $message }}</span>
                </div>
            @endif
            {{-- bootstrap --}}
            <div class="table-responsive">
                <div id="divp">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr style="text-align: center;">
                                <th scope="col">{{ __('message.code') }}</th>
                                <th scope="col">{{ __('message.Nom') }}</th>
                                <th scope="col">{{ __('message.Prenom') }}</th>
                                <th scope="col">{{ __('message.Classe') }}</th>
                                <th scope="col">{{ __('message.Type Paiement') }}</th>
                                <th scope="col">{{ __('message.Total Paiement') }}</th>
                                <th scope="col">{{ __('message.Rest Du Paiement') }}</th>
                                <th scope="col">{{ __('message.Mois') }}</th>
                                <th scope="col">{{ __('message.Date Paiement') }}</th>
                                <th scope="col">{{ __('message.Action') }}</th>
                            </tr>
                        </thead>
                        @foreach ($paiement as $item)
                            <tbody>
                                <tr class="shadow-lg p-3 mb-5 bg-white rounded " style="text-align: center;">
                                    <th scope="col">{{ $item->etudiant->code }}</th>
                                    <td scope="col">
                                        @if (LaravelLocalization::getCurrentLocale() == 'fr')
                                            {{ $item->etudiant->nom_fr }}
                                        @else
                                            {{ $item->etudiant->nom_ar }}
                                        @endif
                                    </td>
                                    <td scope="col">
                                        @if (LaravelLocalization::getCurrentLocale() == 'fr')
                                            {{ $item->etudiant->prenom_fr }}
                                        @else
                                            {{ $item->etudiant->prenom_ar }}
                                        @endif
                                    </td>
                                    <td scope="col"> {{ $item->etudiant->niveau->nom ?? ' ' }}</td>
                </div>
                <td scope="col">
                    @if (LaravelLocalization::getCurrentLocale() == 'fr')
                        {{ $item->type_paiement_fr ?? ' ' }}
                    @else
                        {{ $item->type_paiement_ar ?? ' ' }}
                    @endif
                </td>
                <td scope="col"> {{ $item->total_payer }} </td>
                <td scope="col">{{ $item->rest_payer }}</td>
                <td scope="col">
                    <button class="btn btn-info bt">{{ __('message.Afficher') }}</button>
                    <div style="display:none;" a="1" class="mois">
                        @foreach ($item->mois as $m)
                            <i class="fa fa-check" style="color: rgb(2, 150, 219)" aria-hidden="true"></i>
                            @if (LaravelLocalization::getCurrentLocale() == 'fr')
                                {{ $m->nom_fr }} <br>
                            @else
                                {{ $m->nom_ar }} <br>
                            @endif
                        @endforeach
                    </div>
                </td>
                <td scope="col">
                    {{ $item->created_at }}
                </td>
                <td scope="col">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('paiement.edit', $item->slug) }}">
                                    <button class="btn btn-primary"> <i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <form action="javascript:delete_paiement('{{ route('paiement.destroy', $item->id) }}')">
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fas fa-trash-alt  w-100"></i></button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('paiement.show', $item->slug) }}">
                                    <button class="btn btn-success"><i class="fa fa-eye"
                                            aria-hidden="true"></i></button>
                                </a>
                            </div>

                        </div>
                    </div>
                </td>
                </tr>
                </tbody>
                @endforeach
                </table>
            </div>
            @if ($paiement->count() == null)
                <div class="alert alert-success text-center" role="alert">
                    {{ __('message.aucun paiement') }}
                </div>
            @endif

            <div class="d-flex justify-content-center">

                {{-- {!! $paiement->links() !!} --}}
            </div>
        </div>
    </div>
    </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('message.Donner le Matricule') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>

                    </button>
                </div>

                <div class="modal-body">
                    <form class="forming" action="{{ route('paiement.create') }}" method="post">
                        @csrf
                        <div class="container-fluid">
                            <div class="form-group">
                                <input name="matricule" required type="text" class="form-control"
                                    placeholder="{{ __('message.Matricule de l\'etudiant') }}">

                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary "
                        data-dismiss="modal">{{ __('message.Annuler') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('message.Suivant') }}</button>
                    </form>
                </div>

            </div>
            <form id="paiement_delete_form" method="POST">
                @csrf
                @method('DELETE')

            </form>
        </div>
    </div>




@endsection


@section('paiementjavascript')
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });

        function delete_paiement(url) {
            swal({
                    title: "{{ __('message.Ete vous sur ?') }}",
                    text: "{{ __('message.Le paiement  va suprimer defintivement') }}",
                    icon: "warning",
                    buttons: ["{{ __('message.Annuler') }}", "{{ __('message.Suprimer') }}"],
                    dangerMode: true,

                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#paiement_delete_form').attr('action', url);
                        $('#paiement_delete_form').submit();
                    }
                });
        }
        $("#niveau").select2({
            placeholder: "{{ __('message.selectioner niveau') }}",
            allowClear: true,
        });
        $("#month").select2({
            placeholder: "{{ __('message.selectioner Mois') }}",
            allowClear: true,
        });
        $("#etat").select2({
            placeholder: "{{ __('message.selectioner un etat') }}",
            allowClear: true,

        });
    </script>
@endsection
