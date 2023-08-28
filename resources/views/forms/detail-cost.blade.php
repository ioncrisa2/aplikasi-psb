@extends('layouts.front.app')

@section('content')
    <div class="row justify-content-center align-items-center w-auto h-auto">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h3>Rincian Biaya Khusus</h3>
                </div>
                <div class="card-body">
                    <div class="mt-4">
                        <form action="{{ route('identitas-siswa') }}" method="GET">
                            @csrf

                            <p>Rincian Biaya Perlengkapan</p>

                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Perlengkapan</th>
                                    <th scope="col">Biaya</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Larry the Bird</td>
                                    <td>Larry the Bird</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Larry the Bird</td>
                                    <td>Larry the Bird</td>
                                  </tr>
                                  tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Larry the Bird</td>
                                    <td>Larry the Bird</td>
                                  </tr>
                                </tbody>
                              </table>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary btn-lg" type="submit">Lanjutkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
