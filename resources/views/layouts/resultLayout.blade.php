<!-- Jquery for exporting the data table -->
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#dataTb').DataTable();
        var tt = new $.fn.dataTable.TableTools( table, {
            sSwfPath: "swf/copy_csv_xls_pdf.swf"
        });

        $( tt.fnContainer() ).insertAfter('div.export');
    });
</script>

<body id="result-layout">

@yield('content')

</body>
</html>
