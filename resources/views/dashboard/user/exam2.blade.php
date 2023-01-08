@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row" style="height: 500px">
        <div class="col-md-6 m-auto">
          <div class="card shadow-none" style="border-radius: 20px; border: 2px solid #ddd;">
            <div class="card-body py-4 ps-5">
              <h1 class="text-center text-dark">Selamat anda lulus!</h1>
              <table class="mt-3 text-dark" style="font-weight: 600;">
                <tr>
                  <td>Soal</td><td>: 10 soal</td>
                </tr>
                <tr>
                  <td>Benar</td><td>: 8 soal</td>
                </tr>
                <tr>
                  <td>Salah</td><td>: 2 soal</td>
                </tr>
                <tr>
                  <td>Nilai</td><td>: 80</td>
                </tr>
              </table>
              <p class="text-dark" style="font-weight: 600;">Persyaratan nilai minimum untuk lulus kelas ini adalah 70</p>
              <div class="row">
                <div class="col d-flex m-0">
                  <a href="exam" class="btn btn-brown ms-auto border-0 py-2 px-4" style="background-color: #C07555;">Tutup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection