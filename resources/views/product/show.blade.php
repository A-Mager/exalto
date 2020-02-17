@extends('layouts/app')
@section('content')
    <div class="container page-content" >
        <div class="tile is-ancestor">
            <div class="tile is-horizontal">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <h1 class="title">{{$name->model_number}}</h1>
                        <div class="buttons">
                            @if($detail->pdf_nl !== null)
                                <a href="download/{{$name->model_number}}/{{$detail->pdf_nl}}" class=""><button class="button is-info is-grouped pdfNl">Nederlandse PDF</button></a>&nbsp;
                            @endif
                            @if($detail->pdf_en !== null)
                                <a href="download/{{$name->model_number}}/{{$detail->pdf_en}}" class=""><button class="button is-info is-grouped pdfEn">English PDF</button></a>
                            @endif
                            @if($detail->pdf_nl == null && $detail->pdf_en == null)
                                <h2 class="title">Sorry! There seems to be nothing here right now.</h2>
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
