<script type="text/javascript">
    var url_admin;
    $(document).ready(function () {

    });
    function addAdmin() {
        $('[name=_method]').val("POST")
        url_admin = "{{ route('admin.store') }}"
        $("#modal-admin-title").html("Add New Administrator")
        $("#modal-admin-btn").prop("class", "btn btn-success")
        $("#modal-admin-btn").html("SAVE")
        $('.admin-modal form')[0].reset()
        $("#password_area").html('<div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password*</label>\n' +
            '                        <div class="col-md-4 col-sm-4 col-xs-12">\n' +
            '                            <input type="text" class="form-control" value="12345678 (default)" readonly="readonly">\n' +
            '                        </div>\n' +
            '                    </div>')
        $('.admin-modal').modal("show")
    }
    function editAdmin(id) {
        $('[name=_method]').val("PATCH")
        url_admin = "{{ url('admin') }}/" + id
        $("#modal-admin-title").html("Add New admin")
        $("#modal-admin-btn").prop("class", "btn btn-info")
        $("#modal-admin-btn").html("UPDATE")
        $("#password_area").html("")

        $.ajax({
            type: "GET",
            url: "{{ url('admin') }}/" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=name]').val(data.name)
                $('[name=phone]').val(data.phone)
                $('[name=address]').val(data.address)
                $("#status [value=" + data.status + "]").prop('selected','selected')
                $('[name=email]').val(data.email)
                $('.admin-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    function destroyAdmin(id) {
        if (confirm("Delete Permanently and All Activity (Warning!) ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('admin') }}/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    window.location.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
    $(function () {
        $('.admin-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_admin,
                    data: $('.admin-modal form').serialize(),
                    success: function () {
                        $('.admin-modal').modal("hide")
                        $('.admin-modal form')[0].reset()
                        window.location.reload()
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
</script>