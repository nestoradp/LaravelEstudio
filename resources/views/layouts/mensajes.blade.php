<script src="{{ asset('izitoast/iziToast.min.js') }}"></script>
@if ($message = Session::get('success'))
    <script> iziToast.success({title: 'Sistema', message: '{{ $message }}', position: 'topCenter'}); </script>
@endif


@if ($message = Session::get('error'))
    <script> iziToast.error({title: 'Sistema', message: '{{ $message }}', position: 'topCenter'}); </script>
@endif


@if ($message = Session::get('warning'))
    <script> iziToast.warning({title: 'Sistema', message: '{{ $message }}', position: 'topCenter'}); </script>
@endif


@if ($message = Session::get('info'))
    <script> iziToast.show({title: 'Sistema', message: '{{ $message }}', position: 'topCenter'}); </script>
@endif