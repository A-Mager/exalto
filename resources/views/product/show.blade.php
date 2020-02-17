@extends('layouts/app')
@section('content')
    <div class="container page-content" >
        <div class="tile is-ancestor">
            <div class="tile is-horizontal">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <h1 class="title">{{$name->model_number}}</h1>
                        <div class="buttons">
                            <a href="download/{{$name->model_number}}/{{$detail->pdf_nl}}" class=""><button class="button is-info is-grouped pdfNl">Nederlandse PDF</button></a>&nbsp;
                            <a href="download/{{$name->model_number}}/{{$detail->pdf_en}}" class=""><button class="button is-info is-grouped pdfEn">English PDF</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
