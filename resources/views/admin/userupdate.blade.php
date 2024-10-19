@extends('admin.template')
@section('main')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Profile</h4>
    </div>
    <form method="POST" action="{{ route('admin.user.update.save') }}" class="card-body">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="row gap-2">
            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'email',
                    'error_name' => 'email',
                    'title' => 'Email',
                    'type' => 'text',
                    'another_old_input' => $item->email
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
