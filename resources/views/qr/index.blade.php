@extends('layouts/app')
@section('header')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container">
    @if(session()->has('errorToken'))
        <section class="hero is-danger">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-4">
                        Selecteer minimaal 1 item
                    </h1>
                </div>
            </div>
        </section>
    @endif
{{--    @if(session()->has('downloadToken'))--}}
{{--        <section class="hero is-danger">--}}
{{--            <div class="hero-body">--}}
{{--                <div class="container">--}}
{{--                    <h1 class="title is-4">--}}
{{--                        Downloaded--}}
{{--                    </h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <form name="qrSelect" id="qrSelect" action="{{Route('qrDownload')}}" method="POST">
                    @csrf
                    <button type="submit" class="button">Download</button>
                </form>
            </div>

            <div class="level-item">
                <a href="{{Route('qrDownloadAll')}}"><button class="button">Download All</button></a>
            </div>

        </div>
    </div>
    <table-component :rows="{{json_encode($data)}}"></table-component>
    </div>
@endsection

@push('scripts')

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/sl-1.3.1/datatables.min.js" defer></script>
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [[1, "asc"]],
                'columnDefs': [
                    {
                        "orderable": false, "targets": 0,

                    }
                ],
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


{{--  TODO Implement VueJS for the checkboxes. Usecase would look like this: User clicks on a checkbox, Vue would then add the value to a hidden field. After the user presses download the hidden fields values get sent to the controller which will then fetch the appropriate files --}}
{{--  TODO Styling. Fun.  --}}