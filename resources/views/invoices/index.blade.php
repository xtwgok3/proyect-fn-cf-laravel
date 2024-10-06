@extends('layouts.app')
@if (request()->is('invoices')&& !preg_match('/mobile/i', request()->header('User-Agent')))
<style>
    footer {
        margin: 0;
        width: 100%;
        position: fixed !important;
        bottom: 0;
    }
</style>
@else
<style>
    footer {
        margin-top: 20px;
    }
    #github{ margin-top:12px }
</style>
@endif
@section('content')
<div class="row d-flex justify-content-center mt-3" style="user-select: none;" ondragstart="return false;">
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h3>Ordenes</h3>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Fecha</th>
              <th>Total</th>
              <th>Factura</th>
            </tr>
          </thead>
          <tbody>
            @foreach($invoices as $invoice)
              <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->created_at }}</td>
                <td>{{ $invoice->getTotal() }}</td>
                <td>
                  @if (!$invoice->hasInvoice())
                    <form action="{{ route('invoices.store') }}" method="POST" id="invoiceController">
                      @csrf
                      <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                    </form>
                    <button form="invoiceController" class="btn btn-primary">Facturar</button>
                  @else
                    <a href="{{ route('invoice.download', ['order' => $invoice]) }}" class="btn btn-primary">Descargar</a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection