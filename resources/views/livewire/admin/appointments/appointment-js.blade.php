@push('js')

    <script type="text/javascript" src="https://unpkg.com/moment"></script>

<script type="text/javascript" src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{ asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

    {{--  Untuk halaman appointments  --}}
  
    <script>
      $('#colorPicker').colorpicker().on('colorpickerChange', function(event) {
          $('#colorPicker .fa-square').css('color', event.color.toString());
      })
    </script>
  
    {{--  Library CK Editor  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
  
    {{--  Untuk multiple select option member dan note textarea  --}}
    <script>
      ClassicEditor.create(document.querySelector('#note'));
  
      // Untuk eksekusi proses setelah mengklik tombol submit
      $('form').submit(function(){
          @this.set('state.members', $('#members').val());
          @this.set('state.note', $('#note').val());
          @this.set('state.color', $('[name=color]').val());
      })
    </script>
  @endpush