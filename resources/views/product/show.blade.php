@extends('layouts/app')
@section('content')
    <div class="container page-content" style="margin-top: 4%">
        <div class="tile is-ancestor">
            <div class="tile is-horizontal">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <h1 class="title is-3">{{$name->model_name}}</h1>
                        <h2 class="subtitle is-4">{{$name->model_number}}, {{$name->model_type}}</h2>
                        <div class="buttons">
                            @if($detail->pdf_manual_nl !== null)
                                <a href="download/{{$name->model_number}}/{{$detail->pdf_manual_nl}}" class=""><button class="button is-info is-grouped pdfNl">Nederlandse PDF</button></a>&nbsp;
                            @endif

                            @if($detail->pdf_manual_en !== null)
                                <a href="download/{{$name->model_number}}/{{$detail->pdf_manual_en}}" class=""><button class="button is-info is-grouped pdfEn">English PDF</button></a>&nbsp;
                            @endif

                            @if($detail->pdf_manual_nl == null && $detail->pdf_manual_en == null)
                                <h2 class="title">Sorry! There seems to be nothing here right now.</h2>
                            @endif

                            @if(Auth::check() === true)
                                <a href="download/{{$name->model_number}}/{{$detail->qr_link}}" class=""><button class="button is-success is-grouped qrCode">QR Code</button></a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
