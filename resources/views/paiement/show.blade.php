<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reçus de paiement</title>
    <link rel="stylesheet" href="{{ asset('Labrary/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Labrary/Font_Awsome/css/all.min.css') }}">
    <style>
        .arabe {
            text-align: right;
            direction: rtl;
        }

        .francais {
            text-align: left;
            direction: ltr;
        }

        * {
            font-family: monospace;
        }
    </style>




</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col francais">
                <h5>Complexe Des Ecoles Islah Eraid Arafat</h5>
                <h5>Fondemental-College-Lycee</h5>
                <h6>Tel: 49874807-32311570</h6>
            </div>
            <div class="col arabe">
                <h4> مجمع مدارس الإصلاح الرائد عرفات </h4>
                <h5>ابتدائية - اعدادية - ثانوية</h5>
                <h6>الهاتف: 49874807-32311570</h6>

            </div>

        </div>
        <hr width="100%">
        <div class="row">
            <div class="col-md-6 francais">
                Nom et Prenom : {{ $paiement->etudiant->nom_fr." ".$paiement->etudiant->prenom_fr}}
            </div>
            <div class="col-md-6 arabe">
                الإسم الكامل: {{ $paiement->etudiant->nom_ar." ".$paiement->etudiant->prenom_ar}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 francais">
                Niveau Scolaire : {{ $paiement->etudiant->niveau->nom??""}}
            </div>
            <div class="col-md-6 arabe">
                القسم : {{ $paiement->etudiant->niveau->nom??""}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 francais">
                Prix Mensuel : {{ $paiement->etudiant->prix_mentiel." UM" }}
            </div>
            <div class="col-md-6 arabe">
                الدفع الشهري : {{ $paiement->etudiant->prix_mentiel." أوقية"}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 francais">
                Prix reçus : {{ $paiement->total_payer." UM"}}
                <span style="margin-left:5px;"> pour le mois:</span>
                @foreach ($paiement->mois as $m)
                {{ $m->nom_fr ."," }}
                @endforeach
            </div>
            <div class="col-md-6 arabe" dir="rtl">
                المبلغ : {{ $paiement->total_payer." أوقية "}}
                <span style="margin-left:5px;"> لشهر :</span>
                @foreach ($paiement->mois as $m)
                {{ $m->nom_ar ."," }}
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 francais">
                Reste Paiement : {{ $paiement->rest_payer." UM"}}
            </div>
            <div class="col-md-6 arabe">
                الباقي: {{ $paiement->rest_payer." أوقية"}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 francais">
                Date Paiement : {{ $paiement->created_at}}
            </div>
            <div class="col-md-6 arabe">
                تاريخ الدفع : {{ $paiement->created_at}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 francais">
                signature :
            </div>
            <div class="col-md-6 arabe">
                التوقيع :
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-info" id="btnPrint"> <span
                    style="font-family:'Times New Roman', Times, serif">Imprimer</span> <i
                    class="fas fa-print"></i></button>
            <a href="{{ route('paiement.index') }}" class="btn btn-danger" id="annuler">{{ __('message.Annuler') }}</a>
        </div>
    </div>





    <footer class="footer fixed-bottom footer-dark  navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">il faut garder le recus</span>
            <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">يرجى الإحتفاظ بالوصل</span>
        </p>
    </footer>
    <script src="{{ asset('Labrary/JS/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('Labrary/JS/jqueryCode.js') }}"></script>
</body>

</html>