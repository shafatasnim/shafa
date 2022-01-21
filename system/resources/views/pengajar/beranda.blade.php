@extends('pengajar.template.base')
@section('content')
<div class="container-fluid py-2">
      <div class="row">
        <div class="col-xl-4  col-sm-6 mb-xl-0 mb-4 border-0">
          <div class="card">
            <div class="card-body shadow p-5">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Santri</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{$santri}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa fa-users" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

         <div class="col-xl-4  col-sm-6 mb-xl-0 mb-4 border-0">
          <div class="card">
            <div class="card-body shadow p-5">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Pelanggaran</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{$pelanggaran}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="fa fa-users" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
@endsection