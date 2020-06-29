<script>
    @if (session('success'))
        $.notify({
            message: '{{ session('success') }}'
            },{
                type: 'success',
                z_index: 9999,
            });
    @endif
    @if (session('info'))
        $.notify({
            message: '{{ session('info') }}'
            },{
                type: 'info',
                z_index: 9999,
            });
    @endif
    @if (session('danger'))
        $.notify({
                message: '{{ session('danger') }}'
            },{
                type: 'danger',
                z_index: 9999,
            });
    @endif
</script>
