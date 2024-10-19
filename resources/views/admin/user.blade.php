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
        <h3>Daftar User</h3>
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
              <th>Email</th>
              <th>Created_at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            @foreach($users as $user)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                  <a class="btn btn-primary" href="/admin/user/update/{{$user->id}}">Detail</a>
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