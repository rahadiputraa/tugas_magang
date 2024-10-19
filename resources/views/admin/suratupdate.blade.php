@extends('admin.template')
@section('main')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Detail Surat</h4>
    </div>
    <form method="POST" action="{{route('admin.surat.update.save')}}" class="card-body" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="row gap-2">
            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'no_surat',
                    'error_name' => 'no_surat',
                    'title' => 'No Surat',
                    'type' => 'no_surat',
                    'another_old_input' => $data->no_surat
                ])
            </div>
            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'judul',
                    'error_name' => 'judul',
                    'title' => 'Judul',
                    'type' => 'text',
                    'another_old_input' => $data->judul
                ])
            </div>
            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'keywords',
                    'error_name' => 'keywords',
                    'title' => 'keywords',
                    'type' => 'text',
                    'another_old_input' => $data->labels
                ])
            </div>
            
            <div class="col-12">
                @include('components.select',[
                    'title' => 'Pilih Kategori',
                    'name' => 'id_type_surat',
                    'items' => $categories,
                    'another_old_input' => $data->id_type_surat,
                    'id' => 'id_type_surat',
                ])
                </div>
            
            <div class="col-md-6 col-12">
                @include('components.input_image',[
                'name' => 'file',
                'title' => 'file',
                'another_old_input' => '/storage/surat/' . $data->file,
                ])
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
 <script src="/srcadmin/js/input_image.js"></script>
 <script src="/assets/extensions/jquery/jquery.min.js"></script>
 <script src="/assets/extensions/summernote/summernote-lite.min.js"></script>
 <script src="/assets/static/js/pages/summernote.js"></script>
@endsection