@extends('layouts/app')
@section('content')
    <div class="container">
        <table id="table" class="table datatable" style="width:60%;">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Nummer</th>
                <th>Type</th>
                @if(Auth::check() === true)
                    <th id="nosort">Acties</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $product)
                    <tr data-href="product/{{$product->id}}">
                        <td><a href="product/{{$product->id}}"><button class="button is-text is-small">{{$product->model_name}}</button></a></td>
                        <td><a href="product/{{$product->id}}"><button class="button is-text is-small">{{$product->model_number}}</button></a></td>
                        <td><button class="button is-white is-small" disabled>{{$product->model_type}}</button></td>
                        @if(Auth::check() === true)
                            <td>
                                <div class="buttons are-small">
                                    <a href="product/{{$product->id}}/edit"><button class="button is-info">Pas aan</button></a>&nbsp;
                                    <a href="product/{{$product->id}}/delete"><button class="button is-danger">Verwijder</button></a>
                                </div>
                            </td>
                        @endif
                    </tr>

            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <th>Naam</th>
                <th>Nummer</th>
                <th>Type</th>
                @if(Auth::check() === true)
                    <th>Acties</th>
                @endif
            </tr>
            </tfoot>
        </table>
    </div>

@endsection

@section('scripts')
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
@endsection
