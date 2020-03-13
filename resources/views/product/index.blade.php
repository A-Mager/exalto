@extends('layouts/app')
@section('content')
    <div class="container">
        <table id="table" class="table display stripe" style="width:60%;">
            <thead style="background-color:#b51f38">
            <tr>
                <th style="color:#ffffff">Naam</th>
                <th style="color:#ffffff">Nummer</th>
                <th style="color:#ffffff">Type</th>
                @auth
                    <th style="color:#ffffff">Acties</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $product)
                    <tr data-href="product/{{$product->id}}">
                        <td><a href="product/{{$product->id}}"><button class="button is-text is-small">{{$product->model_name}}</button></a></td>
                        <td><a href="product/{{$product->id}}"><button class="button is-text is-small">{{$product->model_number}}</button></a></td>
                        <td><button class="button is-white is-small" disabled>{{$product->model_type}}</button></td>
                        @auth
                            <td>
                                <div class="buttons are-small">
                                    <a href="product/{{$product->id}}/edit"><button class="button is-info">Pas aan</button></a>&nbsp;
                                    <a href="product/{{$product->id}}/delete"><button class="button is-danger">Verwijder</button></a>
                                </div>
                            </td>
                        @endauth
                    </tr>

            @endforeach

            </tbody>
{{--            <tfoot style="background-color:#b51f38; color: #ffffff">--}}
{{--            <tr>--}}
{{--                <th style="color:#ffffff">Naam</th>--}}
{{--                <th style="color:#ffffff">Nummer</th>--}}
{{--                <th style="color:#ffffff">Type</th>--}}
{{--                @auth--}}
{{--                    <th style="color:#ffffff">Acties</th>--}}
{{--                @endauth--}}
{{--            </tr>--}}
{{--            </tfoot>--}}
        </table>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                @if(Auth::check() === true)
                "columnDefs": [
                    { "orderable": false, "targets": 3 }
                ],
                @endif
                language: {
                    "sProcessing": "Bezig...",
                    "sLengthMenu": "_MENU_ resultaten weergeven",
                    "sZeroRecords": "Geen resultaten gevonden",
                    "sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
                    "sInfoEmpty": "Geen resultaten om weer te geven",
                    "sInfoFiltered": " (gefilterd uit _MAX_ resultaten)",
                    "sInfoPostFix": "",
                    "sSearch": "Zoeken:",
                    "sEmptyTable": "Geen resultaten aanwezig in de tabel",
                    "sInfoThousands": ".",
                    "sLoadingRecords": "Een moment geduld aub - bezig met laden...",
                    "oPaginate": {
                        "sFirst": "Eerste",
                        "sLast": "Laatste",
                        "sNext": "Volgende",
                        "sPrevious": "Vorige"
                    },
                }
            });
        });

    </script>
@endpush
