<div class="card border-left-primary shadow h-100 py-2 mb-3">
    <div class="card-body">
        <div class=" no-gutters align-items-center">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cetak laporan per periode</div>
            <div>
                <form action="{{ route('laporan.cetak_laporanmusnah') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="periode" value="periode">
                    <div class=" row">
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Dari</label>
                                <div class="col-sm-10">
                                    <div class="input-group date" id="dari2" data-target-input="nearest">
                                        <input type="text" name="dari2" class="form-control datetimepicker-input"
                                            data-target="#dari2" required="" autocomplete="off" />
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-target="#dari2"
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
                                    <div class="input-group date" id="sampai2" data-target-input="nearest">
                                        <input type="text" name="sampai2" class="form-control datetimepicker-input"
                                            data-target="#sampai2" required="" autocomplete="off" />
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-target="#sampai2"
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
                <form action="{{ route('laporan.cetak_laporanmusnah') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="perbulan" value="perbulan">
                    <div class=" row">
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Bulan</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="bulan">
                                        @for ($m = 1; $m < 13; ) @foreach ($bulan as $bul) <option
                                            value={{ str_pad($m++, 2, "0" , STR_PAD_LEFT) }}>
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
                                    <div class="input-group date" id="tahun2" data-target-input="nearest">
                                        <input type="text" name="tahun2" class="form-control datetimepicker-input"
                                            data-target="#tahun2" required="" autocomplete="off" />
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-target="#tahun2"
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
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cetak laporan pertahun</div>
            <div>
                <form action="{{ route('laporan.cetak_laporanmusnah') }}" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="pertahun" value="pertahun">
                    <div class=" row">
                        <div class="col-5">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="tahun3" data-target-input="nearest">
                                        <input type="text" name="tahun" class="form-control datetimepicker-input"
                                            data-target="#tahun3" required="" autocomplete="off" />
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-target="#tahun3"
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
