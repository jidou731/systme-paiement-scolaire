@extends('layout.layout')
@section('content')
<div class="row justify-content-center">

    <div class="col-md-11 mt-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h5>{{ __('message.Liste Des Etudiants') }}</h5>
                    </div>

                    <div class="col-4">
                        <a href="{{ route('etudiant.create') }}" style="float: right" class="btn btn-info">{{ __('message.Ajouter Etudiant') }}</a>
                    </div>
                </div>
            </div>
            
                
                
            <div class="card-body">
                @if($message=Session::get('success'))
 <div class="alert alert-success alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        <span class="text-center">{{ $message }}</span>
                        </div>
                        @endif
                <div class="table-responsive">
                    <table class="table" >
                        <thead class="thead-dark">
                            <tr style="text-align: center;">
                                <th scope="col">{{ __('message.code') }}</th>
                                <th scope="col">{{ __('message.Nom') }}</th>
                                <th scope="col">{{ __('message.Prenom') }}</th>
                                <th scope="col">{{ __('message.Classe') }}</th>
                                <th scope="col">{{ __('message.Prix Mentiel') }}</th>
                                <th scope="col">{{ __('message.Numero') }}</th>
                                <th scope="col">{{ __('message.Numero parent') }}</th>
                                <th scope="col">{{ __('message.date inscription') }}</th>
                                <th scope="col">{{ __('message.sexe') }}</th>
                                <th scope="col">{{ __('message.Action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($etudiant as $item)
                            <tr style="text-align: center;" class="shadow-lg p-3 mb-5 bg-white rounded">
                                <th scope="col">{{$item->code}}</th>
                                <td scope="col">{{$item->nom}}</td>
                                <td scope="col">{{$item->prenom}}</td>
                                <td scope="col">{{$item->niveau->nom ?? ""}}</td>
                                <td scope="col">{{$item->prix_mentiel." "}}{{ __('message.UM') }}</td>
                                <td scope="col">{{$item->numero}}</td>
                                <td scope="col">{{$item->numero_parent}}</td>
                                <td scope="col">{{$item->date_inscription}}</td>
                                <td scope="col">{{$item->sexe}}</td>
                                <td scope="col">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ route('etudiant.edit',$item->slug) }}">
                                                    <button class="btn btn-success"> <i class="fa fa-edit" aria-hidden="true"></i> </button>
                                                </a>
                                            </div>
                                            <div class="col-md-4">              
                                <form action="javascript:delete_etudiant('{{ route('etudiant.destroy',$item->id) }}')">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt  w-100"></i></button>
                                </form>      
                                            </div>
                                            @if($item->prix_mentiel==0)
                                            <div class="col-md-4">
                                                <span style="font-family:times new roman; font-size:18px;">{{ __('message.Gratuit') }}</span>
                                            </div>
                                            @else
                                            <div class="col-md-4">
                                                <a href="{{ route('paiement.validerPaiement',$item->slug) }}">
                                                    <button class="btn btn-dark"><span>{{ __('message.Payer') }}</span><i class="fas fa-money-check-alt"></i></button>
                                                </a>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- pagination --}}
                <div class="mt-3 col-md-6 mx-auto">
                    {{-- {{ $etudiant->links() }}    --}}
                   </div>
                </div>
                @if ($etudiant->count()==null)

                <div class="alert alert-success text-center" role="alert">
                    {{ __('message.aucun etudiant') }}
                </div>


                @endif

                
             
    <form id="etudiant_delete_form" method="POST">
    @csrf
    @method('DELETE')

</form>
        </div>
    </div>
</div>
</div>

<script>
    function delete_etudiant(url){
        swal({
            title:"{{ __('message.Ete vous sur ?') }}",
            text:"{{ __('message.Etudiant  va suprimer defintivement') }}",
            icon:"warning",
            buttons:["{{ __('message.Annuler') }}","{{ __('message.Suprimer') }}"],
            dangerMode:true,

        })
        .then((willDelete)=>{
            if(willDelete){
                $('#etudiant_delete_form').attr('action',url);
                $('#etudiant_delete_form').submit();
            }
        });
    }
    
</script>

@endsection
