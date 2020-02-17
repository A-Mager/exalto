@extends('layouts/app')

@section('content')

    <div class="container page-content" >
        <div class="tile is-ancestor">
            <div class="tile is-horizontal">
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <!-- Form aspect of the website. -->
                        <h1 class="title is-4"><strong>Nieuwe item toevoegen</strong></h1>

                        <form action="{{Route('store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="field">

                                <label class="label"for="name">Model</label>

                                <div class="control">
                                    <input type="text" class="input" name="model" id="model" required>
                                    <p class="help is-danger">{{ ($errors->first('model')) }}</p>
                                </div>

                            </div>

                            <div class="field">

                                <label for="type" class="label">Type</label>

                                <div class="control">
                                    <input type="text" class="input" name="type" id="type">
                                    <p class="help is-danger">{{ $errors->first('type') }}</p>
                                </div>
                            </div>

                            <div class="field">
                                <label for="pdfEN" class="label">Nederlandse PDF</label>
                                <div class="control">
                                    <div id="file-pdf-nl" class="file has-name">
                                        <label class="file-label">
                                            <input class="file-input" type="file" name="pdfNL" accept=".rtf,.pdf" required>
                                            <span class="file-cta">
                                              <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                              </span>
                                              <span class="file-label">
                                                Kies een bestand...
                                              </span>
                                            </span>
                                            <span class="file-name">
                                                Geen bestand gekozen
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
                                            <input class="file-input" type="file" name="pdfEN" accept=".rtf,.pdf" required>
                                            <span class="file-cta">
                                              <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                              </span>
                                              <span class="file-label">
                                                Kies een bestand...
                                              </span>
                                            </span>
                                            <span class="file-name">
                                              Geen bestand gekozen
                                            </span>
                                        </label>
                                    </div>
                                    <p class="help is-danger">{{ $errors->first('pdfEN') }}</p>
                                </div>
                            </div>

                            <div class="field is-grouped">
                                <button class="button is-link" type="submit">Verstuur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

