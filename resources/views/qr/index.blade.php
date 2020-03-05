@extends('layouts/app')
@section('content')

    <form name="qrSelect" id="qrSelect" action="{{Route('qrDownload')}}" method="POST">
        @csrf

        <button type="submit">Download</button>
    </form>

    <div class="container">

            <table id="table" class="table display stripe" style="width:60%;">
                <thead style="background-color:#b51f38">
                <tr>
                    <th style="color:#ffffff">Naam</th>
                    <th style="color:#ffffff">Nummer</th>
                    <th style="color:#ffffff">Type</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $product)
                    <tr data-href="product/{{$product->id}}">
                        <td><input type="checkbox" name="selected[]" value="{{ $product->model_number .'/'. $product->qr_link}}" form="qrSelect"><button class="button is-text is-small">{{$product->model_name}}</button></td>
                        <td><button class="button is-text is-small">{{$product->model_number}}</button></td>
                        <td><button class="button is-text is-small">{{$product->model_type}}</button></td>
                    </tr>

                @endforeach

                </tbody>
                <tfoot style="background-color:#b51f38; color: #ffffff">
                <tr>
                    <th style="color:#ffffff">Naam</th>
                    <th style="color:#ffffff">Nummer</th>
                    <th style="color:#ffffff">Type</th>
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
