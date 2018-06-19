<script type="text/javascript">
    var prodi_dt;
    var url_prodi;
    $(document).ready(function () {
        prodi_dt = $("#prodi-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{route('prodi.datatables')}}",
            columns: [
                {data: 'prodi', name: 'prodi'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function addProdi() {
        $('[name=_method]').val("POST")
        url_prodi = "{{ route('prodi.store') }}"
        $("#modal-prodi-title").html("Add New Prodi")
        $("#modal-prodi-btn").prop("class", "btn btn-success")
        $("#modal-prodi-btn").html("SAVE")
        $('.prodi-modal form')[0].reset()
        $('.prodi-modal').modal("show")
    }
    function editProdi(id) {
        $('[name=_method]').val("PATCH")
        url_prodi = "{{ url('setting/prodi') }}/" + id
        $("#modal-prodi-title").html("Add New Prodi")
        $("#modal-prodi-btn").prop("class", "btn btn-info")
        $("#modal-prodi-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ url('setting/prodi') }}/" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=prodi]').val(data.prodi)
                $('.prodi-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.prodi-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_prodi,
                    data: $('.prodi-modal form').serialize(),
                    success: function () {
                        $('.prodi-modal').modal("hide")
                        $('.prodi-modal form')[0].reset()
                        prodi_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroyProdi(id) {
        if (confirm("Delete Permanently and All Student Card ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('setting/prodi/') }}/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    prodi_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>