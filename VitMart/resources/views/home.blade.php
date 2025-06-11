@extends('layout.master')

@section('title', "Dasboard - Home")

@section('content')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">List Produk</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ url("/") }}">Home</a></li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-body">

                  <img
                  src="{{ asset("/assets/assets/img/MiCocacola.png") }}"
                  class=" "
                  alt="User Image"
                    
                  />
                  <img
                    src="{{ asset("/assets/assets/img/MiFanta.png") }}"
                    class=" "
                    alt="User Image"
                  />

                  <img
                    src="{{ asset("/assets/assets/img/MaChitato.png") }}"
                    class=" "
                    alt="User Image"
                  />

                  <img
                    src="{{ asset("/assets/assets/img/MaKacang.png") }}"
                    class=" "
                    alt="User Image"
                  />

                  <img
                    src="{{ asset("/assets/assets/img/ObTolakBalak.jpg") }}"
                    class=" "
                    alt="User Image"
                  />

                  </div>
                  <!-- /.card-body -->
                <!-- /.card -->
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
@endsection