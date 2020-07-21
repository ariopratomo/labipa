<div class="card border-left-primary shadow h-100 py-2 mb-3">
    <div class="card-body">
        <div class=" no-gutters align-items-center">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cetak laporan per periode</div>
            <div>
                <form action="{{ route('laporan.cetak_laporanpakai') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="periode" value="periode">
                    <div class=" row">
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Dari</label>
                                <div class="col-sm-10">
                                    <div class="input-group date" id="dari" data-target-input="nearest">
                                        <input type="text" name="dari" class="form-control datetimepicker-input"
                                            data-target="#dari" required="" autocomplete="off" />
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-target="#dari"
                                                data-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Sampai</label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="sampai" data-target-input="nearest">
                                        <input type="text" name="sampai" class="form-control datetimepicker-input"
                                            data-target="#sampai" required="" autocomplete="off" />
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-target="#sampai"
                                                data-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-2">
                            <button class="btn btn-hijau" type="submit"><i class="fas fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="card border-left-primary shadow h-100 py-2 mb-3">
    <div class="card-body">
        <div class="no-gutters align-items-center">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cetak laporan perbulan</div>
            <div>
                <form action="{{ route('laporan.cetak_laporanpakai') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="perbulan" value="perbulan">
                    <div class=" row">
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Bulan</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="bulan" id="bulan">
                                        @for ($m = 1; $m < 13; ) @foreach ($bulan as $bul) <option value="">
                                            {{ $bul }}
                                            </option>
                                            @endforeach
                                            @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="tahun" data-target-input="nearest">
                                        <input type="text" name="tahun" class="form-control datetimepicker-input"
                                            data-target="#tahun" required="" autocomplete="off" />
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-target="#tahun"
                                                data-toggle="datetimepicker">
                                                <i class="fas fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-hijau" type="submit"><i class="fas fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


















@push('style')

<link href="{{ asset('assets/vendor/datetimepicker/datetimepicker.css')}}" rel="stylesheet">

@endpush
@push('scripts')
<script src="{{ asset('assets/vendor/datetimepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datetimepicker/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datetimepicker/datetimepicker.js') }}"></script>
<script>
    $(function () {
        $.ajax('{{ route("laporan.date") }}',{
            dataType: 'json', // type of response data
            success: function (data) {   // success callback function
                const first = data.first;
                const last = data.last;
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
                $('#tahun').datetimepicker({
                    locale: 'id',
                    format: 'Y',
                    minDate: first,
                    maxDate: last
                });
            },
        });
        for(let m = 1; m < 13;) {
            $('#bulan').val(('0' +  m++).slice(-2))
        }
    });



</script>

@endpush
