<script>
    $(document).ready(function () {
        @foreach(\App\Services\ToasrtService::getAll() as $toastrs)
        @foreach($toastrs as $type => $message)
        toastr.{{$type}}('{{$message}}');
        @endforeach
        @endforeach
    });
</script>
