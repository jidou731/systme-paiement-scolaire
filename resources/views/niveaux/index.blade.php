@extends('layout.layout', ['title' => 'mowloud'])
@section('content')
    <div class="row justify-content-center">

        <div class="col-md-11 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h5>{{ __('message.Liste Des Niveaux') }}</h5>
                        </div>

                        <div class="col-4">
                            <a href="{{ route('niveau.create') }}" style="float: right"
                                class="btn btn-info">{{ __('message.Ajouter Niveau') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span class="text-center">{{ $message }}</span>
                            </div>
                        @endif
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr style="text-align: center;">
                                <th scope="col">{{ __('message.id') }}</th>
                                <th scope="col">{{ __('message.Nom') }}</th>
                                <th scope="col" style="width: 400px;">{{ __('message.Action') }}</th>
                            </tr>
                        </thead>
                        @foreach ($niveaux as $item)
                            <tbody>
                                <tr class="shadow-lg p-3 mb-5 bg-white rounded" style="text-align: center;">
                                    <th scope="col">{{ $item->id }}</th>
                                    <td scope="col">{{ $item->nom }}</td>
                                    <td scope="col">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('niveau.edit', $item->slug) }}">
                                                        <button class="btn btn-success"><i class="fa fa-edit"
                                                                aria-hidden="true"></i></button>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="javascript:delete_niveau('{{ route('niveau.destroy', $item->id) }}')">
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash-alt  w-100"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <a href="{{ route('etudiantNiveau', $item->id) }}">
                                                        <button
                                                            class="btn btn-info">{{ __('message.Voir Etudiants') }}</button>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>


                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    @if ($niveaux->count() == null)
                        <div class="alert alert-success text-center" role="alert">
                            {{ __('message.Aucun niveau') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-center">

                        {!! $niveaux->links() !!}
                    </div>
                </div>
                <form id="niveau_delete_form" method="POST">
                    @csrf
                    @method('DELETE')

                </form>
            </div>
        </div>
        <script>
            function delete_niveau(url) {
                swal({
                        title: "{{ __('message.Ete vous sur ?') }}",
                        text: "{{ __('message.Le niveau  va suprimer defintivement') }}",
                        icon: "warning",
                        buttons: ["{{ __('message.Annuler') }}", "{{ __('message.Suprimer') }}"],
                        dangerMode: true,

                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $('#niveau_delete_form').attr('action', url);
                            $('#niveau_delete_form').submit();
                        }
                    });
            }
        </script>
    @endsection
