@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt--6">
      <div class="row">
        <div class="col-12">
          <div class="shadow-none card border-2">
            <div class="card-body py-4 px-4">
              <div class="row">
                <div class="col-md-8 my-auto p-5">
                  <h1 class="text-dark px-0">Checkout Course</h1>
                  <h3 class="text-muted px-0 text-lg">
                    Bergabung dengan kami di kelas Premium HSK 1
                  </h3>
                </div>
                <div class="col-md-4 ml-auto">
                  <img src="../assets/img/6134223.png" style="max-height: 200px">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt--6">
      <div class="row" style="height: 500px">
        <div class="col-md-6 m-auto">
          <div class="card shadow-none" style="border-radius: 20px; border: 2px solid #ddd;">
            <div class="card-body py-4 ps-5">
              <h1 class="text-center text-dark">Pembayaran</h1>
              <a class="btn col-12 font-weight-bold" style="border: 1px solid #333" data-bs-toggle="modal" data-bs-target="#promoModal">
                <div class="row">
                  <div class="col-4 d-flex">
                    <p class="m-0 font-weight-bold text-dark"><i class="mdi mdi-content-cut"></i> ABCDEF</p>
                  </div>
                  <div class="col-2 row ml-auto">
                    <p class="m-0 font-weight-bold"><i class="mdi mdi-chevron-right"></i></p>
                  </div>
                </div>
              </a>
              <p class="text-dark font-weight-bold my-2 h2">Detail Pembayaran</p>
              <table class="col-12 text-dark" style="font-weight: 600;">
                <tr>
                  <td class="text-muted">Harga Course</td><td class="text-muted">Rp. 650.000</td>
                </tr>
                <tr>
                  <td class="text-muted">Potongan</td><td class="text-muted">Rp. 350.000</td>
                </tr>
                <tr>
                  <td class="text-muted">Total Transfer</td><td>Rp. 300.000</td>
                </tr>
              </table>
              <br>
              <div class="row">
                <div class="col d-flex m-0">
                  <button type="button" class="btn btn-brown mx-auto border-0 py-2 px-4">Bayar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h1 class="text-center text-dark">Pilih Promo</h1>
            <a class="btn col-12 font-weight-bold mb-3 text-dark" style="border: 1px solid #333">
              <p class="m-0 font-weight-bold"><i class="mdi mdi-content-cut"></i> ABCDEF - Harga menjadi Rp. 300.000</p>
            </a>
            <a class="btn col-12 font-weight-bold mb-3 text-dark" style="border: 1px solid #333">
              <p class="m-0 font-weight-bold"><i class="mdi mdi-content-cut"></i> ABCDEF - Harga menjadi Rp. 350.000</p>
            </a>
            <div class="row justify-content-between">
              <div class="col-4">
                <input class="form-control"  type="text" placeholder="ABCDEF">
              </div>
              <div class="col-4">
                <button type="button" class="btn btn-brown mx-auto border-0 py-2 px-4">Terapkan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection