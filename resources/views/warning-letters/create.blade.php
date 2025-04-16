@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Surat Peringatan</h2>
    <form action="{{ route('warning-letters.store') }}" method="POST">
        @csrf
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="employee_id" class="form-label">Nama Karyawan</label>
                <select class="form-select" id="employee_id" name="employee_id" required>
                    <option value="">Pilih Karyawan</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->name }} - {{ $employee->division }} - {{ $employee->position }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="type" class="form-label">Jenis Surat</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">Pilih Jenis Surat</option>
                    @foreach($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            
            <div class="col-md-6">
                <label for="issued_by" class="form-label">Dikeluarkan Oleh</label>
                <input type="text" class="form-control" id="issued_by" name="issued_by" required>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="violation" class="form-label">Pelanggaran/Penyimpangan</label>
            <textarea class="form-control" id="violation" name="violation" rows="3" required></textarea>
        </div>
        
        <div class="mb-3">
            <label for="consequences" class="form-label">Konsekuensi</label>
            <textarea class="form-control" id="consequences" name="consequences" rows="3" required></textarea>
        </div>
        
        <div class="mb-3">
            <label for="improvement_plan" class="form-label">Rencana Perbaikan (Opsional)</label>
            <textarea class="form-control" id="improvement_plan" name="improvement_plan" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection