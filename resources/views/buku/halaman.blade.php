@extends('layouts.book')
@section('per-page')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-copy mr-3"></i>
        HTML5 Professional - 1/144
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-sm-12">
            <div class="deep-orange" style="padding: 25rem 0;"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-4 text-right">
            <i class="fas fa-chevron-left mt-2"></i>
          </div>
          <div class="col-4">
            <input type="number" class="form-control form-control-sm" min="1" max="144" value="1" />
          </div>
          <div class="col-4">
            <i class="fas fa-chevron-right mt-2"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection