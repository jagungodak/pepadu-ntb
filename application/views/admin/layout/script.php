<script>
    $('#mn_logout').click(function(e) {
        swal({
            title: 'Perhatian!',
            text: "Yakin anda akan keluar dari aplikasi PEPADU NTB?",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                window.location = "<?= base_url(); ?>index.php/login/logout";
            }
        })
    });
</script>