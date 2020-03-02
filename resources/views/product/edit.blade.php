@extends('layouts/app')

@section('content')

    <div class="container page-content" >
        <div class="tile is-ancestor">
            <div class="tile is-horizontal">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <!-- Form aspect of the website. -->
                        <h1 class="title is-4"><strong>Item aanpassen</strong></h1>

                        <form action="{{Route('update', $name->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="field">

                                <label class="label"for="name">Product naam</label>

                                <div class="control">
                                    <input type="text" class="input" name="name" id="name" value="{{$name->model_name}}" disabled>
                                    <p class="help is-danger">{{ ($errors->first('model')) }}</p>
                                </div>

                            </div>

                            <div class="field">

                                <label class="label"for="name">Product nummer</label>

                                <div class="control">
                                    <input type="text" class="input" name="model" id="model" value="{{$name->model_number}}" disabled>
                                    <p class="help is-danger">{{ ($errors->first('model')) }}</p>
                                </div>

                            </div>

                            <div class="field">

                                <label for="type" class="label">Type</label>

                                <div class="control">
                                    <input type="text" class="input" name="type" id="type" value="{{ $name->model_type }}">
                                    <p class="help is-danger">{{ $errors->first('model_type') }}</p>
                                </div>
                            </div>

                            <div class="field">
                                <label for="pdfEN" class="label">Nederlandse PDF</label>
                                <div class="control">
                                    <div id="file-pdf-nl" class="file has-name">
                                        <label class="file-label">
                                            <input class="file-input" type="file" name="pdfNL" accept=".rtf,.pdf" >
                                            <span class="file-cta">
                                              <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                              </span>
                                              <span class="file-label">
                                                Kies een bestand...
                                              </span>
                                            </span>
                                            <span class="file-name">
                                                {{ $detail->pdf_nl }}
                                            </span>
                                        </label>
                                    </div>

                                    <p class="help is-danger">{{ $errors->first('pdfNL') }}</p>
                                </div>
                            </div>

                            <div class="field">
                                <label for="pdfEN" class="label">Engelse PDF</label>
                                <div class="control">
                                    <div id="file-pdf-en" class="file has-name">
                                        <label class="file-label">
                                            <input class="file-input" type="file" name="pdfEN" accept=".rtf,.pdf">
                                            <span class="file-cta">
                                              <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                              </span>
                                              <span class="file-label">
                                                Kies een bestand...
                                              </span>
                                            </span>
                                            <span class="file-name">
                                              {{ $detail->pdf_en }}
                                            </span>
                                        </label>
                                    </div>
                                    <p class="help is-danger">{{ $errors->first('pdfEN') }}</p>
                                </div>
                            </div>

                            <div class="field is-grouped">
                                <button class="button is-link" type="submit">Opslaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

