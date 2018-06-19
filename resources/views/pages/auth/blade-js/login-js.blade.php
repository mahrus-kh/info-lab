<script type="text/javascript">
    $(document).ready(function () {

    });
    $(function () {
        $("#login-form").validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ route('do.login') }}",
                    data: $("#login-form").serialize(),
                    success: function (data) {
                        if (data === true) {
                            window.location.reload()
                        } else if (data === false) {
                            $('[name=password]').val("")
                            var error = new PNotify({
                                title: 'Something Wrong !!!',
                                text: 'Email or password an incorrect... \n Maybee your account is inactive...',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                        }
                    },
                    error: function () {
                        $('[name=password]').val("")
                        var error = new PNotify({
                            title: 'Something Wrong !!!',
                            type: 'warning',
                            styling: 'bootstrap3'
                        });
                    }
                });
                return false
            }
        });
    });
</script>