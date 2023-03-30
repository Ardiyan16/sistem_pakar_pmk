@extends('pages/layout')
@section('pageslayout')
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Riwayat</h2>
            <p>Berikut merupakan riwayat dari konsultasi beberapa pengunjung website</p>
        </div>

        <table id="tabel-riwayat" class="table table-striped table-bordered" width="100%" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Usia</th>
                    <th>Alamat</th>
                    <th>Diagnosa</th>
                    <th>Nilai Diagnosa</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($kunjungan as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->usia }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->nama_penyakit }}</td>
                        <td>{{ $value->nilai_hasil }}</td>
                        <td><a href="#gejala_dipilih{{ $value->id }}" data-bs-toggle="modal" class="btn btn-success btn-sm" title="gejala yang dipilih"><i class="fa fa-eye"></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@foreach ($kunjungan as $data)
    <div class="modal fade" id="gejala_dipilih{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gejala yang dipilih</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        @php
                            // Illuminate\Support\Facades\DB;

                            $detail_kunjungan = DB::table('gejala_terpilihs')
                                                    ->select('gejala_terpilihs.*', 'gejalas.gejala')
                                                    ->leftJoin('gejalas', 'gejala_terpilihs.id_gejala', '=', 'gejalas.kode_gejala')
                                                    ->where('id_kunjungan', $data->id)
                                                    ->get();
                        @endphp
                        @foreach ($detail_kunjungan as $data)
                            <span>{{ $data->id_gejala }} => {{ $data->gejala }}</span><br>
                        @endforeach
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<script>
    $(document).ready(function(){
        $('#tabel-riwayat').DataTable();
    });
</script>
@endsection
