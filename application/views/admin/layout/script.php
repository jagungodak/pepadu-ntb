<script>
    $('#mn_logout').click(function (e) {
        Swal.fire({
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

<script>
    var gAutoPrint = true;

    function processPrint() {

        if (document.getElementById != null) {
            var html = '<HTML>\n<HEAD>\n';
            if (document.getElementsByTagName != null) {
                var headTags = document.getElementsByTagName("head");
                if (headTags.length > 0) html += headTags[0].innerHTML;
            }

            html += '\n</HE' + 'AD>\n<BODY>\n';
            var printReadyElem = document.getElementById("printMe");

            if (printReadyElem != null) html += printReadyElem.innerHTML;
            else {
                alert("Error, no contents.");
                return;
            }

            html += '\n</BO' + 'DY>\n</HT' + 'ML>';
            var printWin = window.open("", "processPrint");
            printWin.document.open();
            printWin.document.write(html);
            printWin.document.close();

            if (gAutoPrint) printWin.print();
        } else alert("Browser not supported.");

    }
</script>