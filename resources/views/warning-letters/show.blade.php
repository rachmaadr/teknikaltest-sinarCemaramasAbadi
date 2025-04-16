@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Surat Peringatan {{ $warningLetter->type }}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Tanggal:</strong> {{ $warningLetter->date->format('d F Y') }}</p>
                    <p><strong>Nomor:</strong> SP/{{ $warningLetter->id }}/HRD/{{ $warningLetter->date->format('Y') }}</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>Kepada Yth.</p>
                    <p><strong>{{ $warningLetter->employee->name }}</strong></p>
                    <p>{{ $warningLetter->employee->position }}</p>
                    <p>{{ $warningLetter->employee->division }}</p>
                </div>
            </div>
            
            <div class="mb-4">
                <h5 class="text-center"><u>SURAT PERINGATAN</u></h5>
                <p class="text-center">No: SP/{{ $warningLetter->id }}/HRD/{{ $warningLetter->date->format('Y') }}</p>
            </div>
            
            <div class="mb-4">
                <p>Dengan ini kami menyampaikan Surat Peringatan {{ $warningLetter->type }} kepada:</p>
                
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama</th>
                        <td>{{ $warningLetter->employee->name }}</td>
                    </tr>
                    <tr>
                        <th>Divisi</th>
                        <td>{{ $warningLetter->employee->division }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{ $warningLetter->employee->position }}</td>
                    </tr>
                </table>
            </div>
            
            <div class="mb-4">
                <h6><strong>Pelanggaran/Penyimpangan:</strong></h6>
                <p>{{ $warningLetter->violation }}</p>
            </div>
            
            <div class="mb-4">
                <h6><strong>Konsekuensi:</strong></h6>
                <p>{{ $warningLetter->consequences }}</p>
            </div>
            
            @if($warningLetter->improvement_plan)
            <div class="mb-4">
                <h6><strong>Rencana Perbaikan:</strong></h6>
                <p>{{ $warningLetter->improvement_plan }}</p>
            </div>
            @endif
            
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <p>Dikeluarkan oleh,</p>
                        <br><br><br>
                        <p><strong>{{ $warningLetter->issued_by }}</strong></p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p>Diterima oleh,</p>
                        <br><br><br>
                        <p><strong>{{ $warningLetter->employee->name }}</strong></p>
                        
                        @if(!$warningLetter->acknowledged)
                            <form action="{{ route('warning-letters.acknowledge', $warningLetter) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Tanda Tangan Digital</button>
                            </form>
                        @else
                            <p>Telah diakui pada: {{ $warningLetter->acknowledged_at->format('d F Y H:i') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection