<script type="text/javascript">
    var url_admin;
    $(document).ready(function () {

    });
    function setupAkun() {
        $('[name=_method]').val("PATCH")
        url_admin = "{{ url('admin/setup-akun') }}/" + {{ auth('admin')->user()->id }}
        $("#modal-admin-title").html("Add New admin")
        $("#modal-admin-btn").prop("class", "btn btn-info")
        $("#modal-admin-btn").html("UPDATE")
        $("#password_area").html('<div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password*</label>\n' +
            '                        <div class="col-md-4 col-sm-4 col-xs-12">\n' +
            '                            <input type="password" name="password" class="form-control" minlength="8" maxlength="100" required="required">\n' +
            '                        </div>\n' +
            '                    </div>')

        $.ajax({
            type: "GET",
            url: "{{ url('admin') }}/" + {{ auth('admin')->user()->id }} + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=name]').val(data.name)
                $('[name=phone]').val(data.phone)
                $('[name=address]').val(data.address)
                $('[name=email]').val(data.email)
                $('.admin-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
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