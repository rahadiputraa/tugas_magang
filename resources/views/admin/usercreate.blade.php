@extends('admin.template')
@section('main')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah User Baru</h4>
    </div>
    <form method="POST" action="{{ route('admin.user.create.save') }}" class="card-body">
        @csrf
        <div class="row gap-2">
            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'email',
                    'error_name' => 'email',
                    'title' => 'Email',
                    'type' => 'text',
                    'another_old_input' => ""
                ])
            </div>
            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'password',
                    'error_name' => 'password',
                    'title' => 'New Password',
                    'type' => 'password',
                    'another_old_input' => ''
                ])
            </div>
            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'password_confirmation',
                    'error_name' => 'password_confirmation',
                    'title' => 'Confirm New Password',
                    'type' => 'password',
                    'another_old_input' => ''
                ])
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
