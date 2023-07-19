@props(['id', 'error'])

<input {{ $attributes }} class="form-control datetimepicker-input @error($error) is-invalid @enderror" onchange="this.dispatchEvent(new InputEvent('input'))" type="text" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}"/>

@push('before-livewire-scripts')
<script type="text/javascript">
    // Untuk tampilan form input type date
        $('#{{ $id }}').datetimepicker({
            format:'L'
        });
</script>
@endpush