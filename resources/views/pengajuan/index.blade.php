@extends('layouts.template')
@section('title', 'Pengajuan')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">List Pengajuan Cuti</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                data-target="#modal">Tambah</button>
                        </div>

                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h6><i class="icon fas fa-check"></i> {{ session('success') }}</h6>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h6><i class="icon fas fa-times"></i> {{ session('error') }}</h6>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Dari Tanggal</th>
                                            <th>Ke Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengajuan as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d-m-Y', strtotime($row->dari_tanggal)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($row->ke_tanggal)) }}</td>
                                                <td>{{ $row->keterangan }}</td>
                                                <td>
                                                    @if ($row->st_pengajuan == 'R')
                                                        <span class="badge badge-warning">Pengajuan</span>
                                                    @elseif ($row->st_pengajuan == 'T')
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    @else
                                                        <span class="badge badge-success">Diterima</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning btn-block"
                                                        data-toggle="modal"
                                                        data-target="#modal{{ $row->id }}">Histori</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" style="text-align: center">Data tidak ditemukan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pengajuan as $row)
        <div class="modal fade" id="modal{{ $row->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Histori Pengajuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histori as $his)
                                    @if ($his->pengajuan_id == $row->id)
                                        <tr>
                                            <td>
                                                @if ($row->st_pengajuan == 'R')
                                                    <span class="badge badge-warning">Pengajuan</span>
                                                @elseif ($row->st_pengajuan == 'T')
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @else
                                                    <span class="badge badge-success">Diterima</span>
                                                @endif
                                            </td>
                                            <td>{{ $his->keterangan }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengajuan.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="dari_tanggal">Dari Tanggal</label>
                            <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal"required>
                        </div>

                        <div class="form-group">
                            <label for="ke_tanggal">Ke Tanggal</label>
                            <input type="date" class="form-control" id="ke_tanggal" name="ke_tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="ke_tanggal">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" cols="10" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
