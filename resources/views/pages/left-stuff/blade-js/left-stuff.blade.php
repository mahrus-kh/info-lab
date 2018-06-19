<script type="text/javascript">
    var  left_stuff_dt;
    var  url_left_stuff;
    $(document).ready(function () {
        $('[name=location_id_filter],[name=admin_id_filter],[name=admin_taken_id_filter],[name=status_filter]').select2()
    });

    function loadDatatables() {
        left_stuff_dt = $("#left_stuff_datatables").DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            order: [[3,'asc'],[2,'desc']],
            ajax: {
                type: "GET",
                url: "{{route('left-stuff.datatables')}}",
                data: {location_id:$('[name=location_id_filter]').val(),admin_id:$('[name=admin_id_filter]').val(),admin_taken_id:$('[name=admin_taken_id_filter]').val(),status:$('[name=status_filter]').val()}
            },
            columns: [
                {data: 'stuff_name', name: 'stuff_name'},
                {data: 'location_id', name: 'location_id', class: 'text-center'},
                {data: 'created_at', name: 'created_at', class: 'text-center'},
                {data: 'status', class: 'text-center',
                    render: function (data, type, row) {
                        if (row.status === "0"){
                            return '<label class="label label-warning">Have Not Taken</label>'
                        } else if (row.status === "1"){
                            return '<label class="label bg-green">Taken</label>'
                        }
                    }
                },
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    }
    function addLeftStuff() {
        $('[name=_method]').val("POST")
        url_left_stuff = "{{ route('left-stuff.store') }}"
        $("#location_id_area").html("");
        listLocation();
        $("#modal-left-stuff-title").html("Add Left Stuff")
        $("#modal-left-stuff-button").prop("class", "btn btn-success")
        $("#modal-left-stuff-button").html("SAVE")
        $("#admin_posted_area").html("")
        $("#posted_at_area").html("")
        $("#status_area").html("")
        doStatus0()
        $('.left-stuff-modal form')[0].reset()
        $('.left-stuff-modal').modal("show")
    }
    function editLeffStuff(id) {
        $('[name=_method]').val("PATCH")
        url_left_stuff = "{{ url('left-stuff') }}/" + id
        $("#location_id_area").html("");
        listLocation();
        $("#modal-left-stuff-title").html("Edit Left Stuff")
        $("#modal-left-stuff-button").prop("class", "btn btn-info")
        $("#modal-left-stuff-button").html("UPDATE")
        $("#admin_posted_area").html('<div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Admin Posted</label>\n' +
            '                        <div class="col-md-7 col-sm-7 col-xs-12">\n' +
            '                            <input type="text" id="admin_posted" class="form-control" readonly="readonly">\n' +
            '                        </div>\n' +
            '                    </div>')
        $("#posted_at_area").html('  <div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Posted At</label>\n' +
            '                        <div class="col-md-5 col-sm-5 col-xs-12">\n' +
            '                            <input type="text" id="posted_at" class="form-control" readonly="readonly">\n' +
            '                        </div>\n' +
            '                    </div>')
        $("#status_area").html(' <hr>\n' +
            '                    <div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required">*</span></label>\n' +
            '                        <div class="col-md-5 col-sm-5 col-xs-12">\n' +
            '                            <label class="radio-inline"><input type="radio" name="status" id="status-1" onclick="doStatus1()" value="1" required>Taken</label>\n' +
            '                            <label class="radio-inline"><input type="radio" name="status" id="status-0" onclick="doStatus0()" value="0" required>Have Not Taken</label>\n' +
            '                            <span class="help-block with-errors"></span>\n' +
            '                        </div>\n' +
            '                    </div>')
        $.ajax({
            type: "GET",
            url: "{{ url('left-stuff')}}/" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=stuff_name]').val(data.stuff_name)
                $("#location_id_area option[value=" + data.location_id + "]").prop('selected','selected')
                $('[name=who_posted]').val(data.who_posted)
                $("#admin_posted").val(data.admin_id)
                $("#posted_at").val(data.created_at)
                $('[name=etc]').val(data.etc)
                if (data.status === "1"){
                    $("#status-1").prop('checked','true')
                    doStatus1()
                    $('[name=who_taken]').val(data.who_taken)
                    $("#admin_taken").val(data.admin_taken_id)
                    $("#taken_at").val(data.taken_at)

                } else if(data.status === "0"){
                    $("#status-0").prop('checked','true')
                    doStatus0()
                }


                $('.left-stuff-modal').modal("show")
            },
            error: function () {
                alert("Something Wrong !")
            }
        });
    }
    $(function () {
        $('.left-stuff-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_left_stuff,
                    data: $('.left-stuff-modal form').serialize(),
                    success: function () {
                        $('.left-stuff-modal').modal("hide")
                        $('.left-stuff-modal form')[0].reset()
                        left_stuff_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
            }
            return false
        });
    });
    function destroyLeftStuff(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('left-stuff') }}" + "/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    left_stuff_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
    function listLocation() {
        $.ajax({
           type: "GET",
           url: "{{ route('list.location') }}",
           success: function (data) {
               $.each(data, function (key, value) {
                   $("#location_id_area").html($("#location_id_area").html() + '<option value="' + value.id + '">' + value.location +'</option>')
               });
           }
        });
    }
    function doStatus1() {
        $("#who_taken_area").html('<div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Who Taken*</label>\n' +
            '                        <div class="col-md-7 col-sm-7 col-xs-12">\n' +
            '                            <input type="text" name="who_taken" class="form-control" maxlength="255" required="required">\n' +
            '                        </div>\n' +
            '                    </div>')
        $("#admin_taken_area").html(' <div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Admin Taken</label>\n' +
            '                        <div class="col-md-7 col-sm-7 col-xs-12">\n' +
            '                            <input type="text" id="admin_taken" class="form-control" readonly="readonly">\n' +
            '                        </div>\n' +
            '                    </div>')
        $("#taken_at_area").html('<div class="form-group">\n' +
            '                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Taken At</label>\n' +
            '                        <div class="col-md-5 col-sm-5 col-xs-12">\n' +
            '                            <input type="text" id="taken_at" class="form-control" readonly="readonly">\n' +
            '                        </div>\n' +
            '                    </div>')
    }
    function doStatus0() {
        $("#who_taken_area").html("")
        $("#admin_taken_area").html("")
        $("#taken_at_area").html("")
    }
</script>