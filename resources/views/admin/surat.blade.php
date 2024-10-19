@extends('admin.template')

@section('css')
 <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css" />
 <link rel="stylesheet" href="/assets/compiled/css/table-datatable.css" />
@endsection

@section('main')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Daftar Surat</h3>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card">
      <div class="card-header">Daftar</div>
      <div class="card-body">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>File</th>
              <th>Jenis Surat</th>
              <th>No Surat</th>
              <th>Keywords</th>
              <th>Created_at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            @foreach($items as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->file}}</td>
                <td>{{$item->jenisSurat->judul}}</td>
                <td>{{$item->no_surat}}</td>
                <td>{{$item->labels}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                  <a class="btn btn-primary" href="/admin/surat/update/{{$item->id}}">Detail</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@endsection

@section('js')
 <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
 <script src="/assets/static/js/pages/simple-datatables.js"></script>
@endsection