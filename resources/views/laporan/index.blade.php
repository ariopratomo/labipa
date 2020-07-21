@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Laporan</h6>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="lapbarang-tab" data-toggle="tab" href="#lapbarang" role="tab"
                        aria-controls="lapbarang" aria-selected="true">Laporan Barang</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="lappakai-tab" data-toggle="tab" href="#lappakai" role="tab"
                        aria-controls="lappakai" aria-selected="false">Laporan Pemakaian Barang</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="lapmusnah-tab" data-toggle="tab" href="#lapmusnah" role="tab"
                        aria-controls="lapmusnah" aria-selected="false">Laporan Pemusnahan Barang</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="lapbarang" role="tabpanel" aria-labelledby="lapbarang-tab">
                    @include('laporan.tab.barang')
                </div>
                <div class="tab-pane fade" id="lappakai" role="tabpanel" aria-labelledby="lappakai-tab">
                    @include('laporan.tab.pakai')
                </div>
                <div class="tab-pane fade" id="lapmusnah" role="tabpanel" aria-labelledby="lapmusnah-tab">
                    @include('laporan.tab.musnah')
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
@push('style')

<link href="{{ asset('assets/vendor/datetimepicker/datetimepicker.css')}}" rel="stylesheet">

@endpush
@push('scripts')
<script src="{{ asset('assets/vendor/datetimepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datetimepicker/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datetimepicker/datetimepicker.js') }}"></script>
<script>
    $(function () {
        $.ajax('{{ route("laporan.datepakai") }}',{
            dataType: 'json', // type of response data
            success: function (data) {   // success callback function
               let first = data.first;
               let last = data.last;
                $('#dari').datetimepicker({
                    locale: 'id',
                    format: 'Y-MM-DD',
                    minDate: first,
                    maxDate: last
                });
                $('#sampai').datetimepicker({
                    locale: 'id',
                    format: 'Y-MM-DD',
                    minDate: first,
                    maxDate: last
                });

            },
        });
        $('#tahun').datetimepicker({
                    locale: 'id',
                    format: 'Y'

                });
        $('#tahun1').datetimepicker({
                    locale: 'id',
                    format: 'Y'

                });

        $.ajax('{{ route("laporan.datemusnah") }}', {
            dataType: 'json', // type of response data
            success: function(data) { // success callback function
                let first = data.first;
                let last = data.last;
                $('#dari2').datetimepicker({
                    locale: 'id',
                    format: 'Y-MM-DD',
                    minDate: first,
                    maxDate: last
                });
                $('#sampai2').datetimepicker({
                    locale: 'id',
                    format: 'Y-MM-DD',
                    minDate: first,
                    maxDate: last
                });

            },
        });
        $('#tahun2').datetimepicker({
            locale: 'id',
            format: 'Y'

        });
        $('#tahun3').datetimepicker({
            locale: 'id',
            format: 'Y'

        });
    });



</script>

@endpush
