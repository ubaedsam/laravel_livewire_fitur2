@props(['id', 'error'])

<input {{ $attributes }} class="form-control datetimepicker-input @error($error) is-invalid @enderror" onchange="this.dispatchEvent(new InputEvent('input'))" type="text" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}"/>

@push('before-livewire-scripts')
<script type="text/javascript">
    $('#{{ $id }}').datetimepicker({
            format:'LT'
        });
</script>
@endpush