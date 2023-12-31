@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

// Untuk alert appointment delete
<script>
  window.addEventListener('show-delete-confirmation', event => {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Livewire.emit('deleteConfirmed');
      }
    })
  });

  window.addEventListener('deleted', event => {
    Swal.fire(
      'Deleted!',
      event.detail.message,
      'success'
    )
  })
</script>
@endpush