@extends('admin.template')
@section('main')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Simpan Surat Baru</h4>
    </div>
    <form method="POST" action="{{ route('admin.surat.create.save') }}" class="card-body" enctype="multipart/form-data">
        @csrf

        <div class="row gap-2">
            <div class="col-12">
                @include('components.input', [
                    'attribute' => 'readonly',
                    'name' => 'date',
                    'error_name' => 'date',
                    'title' => 'Tanggal Simpan Surat (tidak bisa diubah)',
                    'type' => 'date',
                    'another_old_input' => \Carbon\Carbon::now()->format('Y-m-d')
                ])
            </div>

            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'no_surat',
                    'error_name' => 'no_surat',
                    'title' => 'No Surat',
                    'type' => 'no_surat',
                    'another_old_input' => ''
                ])
            </div>

            <div class="col-12">
                @include('components.input', [
                    'attribute' => '',
                    'name' => 'judul',
                    'error_name' => 'judul',
                    'title' => 'Judul',
                    'type' => 'text',
                    'another_old_input' => ""
                ])
            </div>

            <div class="col-12">

                <div id="labels-container">
                    <div class="form-group">
                        <label for="labels[]">Keywords</label>
                        <div class="d-flex gap-2">
                            <!-- Dropdown for existing labels -->
                            <div class="d-flex gap-2">
                                <select id="existing-labels" class="form-control mb-2">
                                    <option value="">Select an existing keyword</option>
                                    @foreach ($labels as $label)
                                        <option value="{{ $label->title }}">{{ $label->title }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-secondary" onclick="addExistingLabel()">Add</button>
                            </div>
                            <!-- Input for new labels -->
                            <div class="d-flex gap-2">
                                <input type="text" id="new-label" class="form-control mb-2" placeholder="Enter new keyword">
                                <button type="button" class="btn btn-secondary" onclick="addNewLabel()">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12">
                @include('components.select',[
                    'title' => 'Pilih Kategori',
                    'name' => 'id_type_surat',
                    'items' => $categories,
                    'another_old_input' => '',
                    'id' => 'id_type_surat'
                ])
            </div>

            <div class="col-md-6 col-12">
                @include('components.input_image',[
                'name' => 'file',
                'title' => 'File',
                'another_old_input' => '/srcadmin/img/default.jpg',
                ])
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
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

 <script>
    function addExistingLabel() {
        const select = document.getElementById('existing-labels');
        const selectedValue = select.value;
        if (selectedValue) {
            addLabelToContainer(selectedValue);
            select.value = ''; // Clear selection
        }
    }

    function addNewLabel() {
        const input = document.getElementById('new-label');
        const newLabel = input.value.trim();
        if (newLabel) {
            addLabelToContainer(newLabel);
            input.value = ''; // Clear input field
        }
    }

    function addLabelToContainer(labelText) {
        const container = document.getElementById('labels-container');
        const existingInputs = container.querySelectorAll('input[name="labels[]"]');
        
        // Avoid adding duplicates
        for (const input of existingInputs) {
            if (input.value === labelText) {
                return; // Label already exists
            }
        }
        
        const input = document.createElement('input');
        input.type = 'hidden'; // Use hidden input to send data with form submission
        input.name = 'labels[]';
        input.value = labelText;
        container.appendChild(input);
        
        // Optional: Show label in UI for feedback
        const labelDisplay = document.createElement('div');
        labelDisplay.className = 'form-control mb-2';
        labelDisplay.textContent = labelText;
        container.appendChild(labelDisplay);
    }
</script>


 @endsection