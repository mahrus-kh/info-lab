<script type="text/javascript">
    var student_card_dt;
    var url_student_card;
    $(document).ready(function () {
        $('[name=prodi_id_filter],[name=admin_id_filter],[name=print_status_filter],[name=card_status_filter],[name=admin_taken_id_filter],[name=taken_status_filter]').select2()
    });
    function loadDatatables() {
        student_card_dt = $("#student_card_datatables").DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            // order: [[3, 'asc'], [4, 'asc']],
            ajax: {
                type: "GET",
                url: "{{route('student-card.datatables')}}",
                data: {
                    prodi_id:$('[name=prodi_id_filter]').val(),
                    admin_id:$('[name=admin_id_filter]').val(),
                    print_status:$('[name=print_status_filter]').val(),
                    card_status:$('[name=card_status_filter]').val(),
                    admin_taken_id:$('[name=admin_taken_id_filter]').val(),
                    taken_status:$('[name=taken_status_filter]').val()
                }
            },
            columns: [
                {data: 'nim', name: 'nim', class: 'text-center'},
                {data: 'name', name: 'name'},
                {data: 'prodi_id', name: 'prodi_id', class: 'text-center'},
                {
                    data: 'print_status', class: 'text-center',
                    render: function (data, type, row) {
                        if (row.print_status === "0") {
                            return '<label class="label label-warning">Not Printed</label>'
                        } else if (row.print_status === "1") {
                            return '<label class="label bg-green">Printed</label>'
                        }
                    }
                },
                {
                    data: 'taken_status', class: 'text-center',
                    render: function (data, type, row) {
                        if (row.taken_status === "0") {
                            return '<label class="label bg-orange">Have Not Taken</label>'
                        } else if (row.taken_status === "1") {
                            return '<label class="label bg-green">Taken</label>'
                        }
                    }
                },
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    }
    function addStudentCard() {
        $('[name=_method]').val("POST")
        url_student_card = "{{ route('student-card.store') }}"
        $("#prodi_id_area").html("");
        listProdi()
        $("#modal-student-card-title").html("Add Student Card")
        $("#modal-student-card-button").prop("class", "btn btn-success")
        $("#modal-student-card-button").html("SAVE")
        $('.student-card-modal form')[0].reset()
        $('.student-card-modal').modal("show")
    }
    function editStudentCard(id) {
        $('[name=_method]').val("PATCH")
        url_student_card = "{{ url('student-card') }}/" + id
        $("#prodi_id_area").html("");
        listProdi()
        $("#modal-student-card-title").html("Edit Student Card")
        $("#modal-student-card-button").prop("class", "btn btn-info")
        $("#modal-student-card-button").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ url('student-card')}}/" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=nim]').val(data.nim)
                $('[name=name]').val(data.name)
                $("#prodi_id_area option[value=" + data.prodi_id + "]").prop('selected','selected')
                $('[name=place_of_birth]').val(data.place_of_birth)
                $('[name=date_of_birth]').val(data.date_of_birth) // error
                $('[name=address]').val(data.address) // error
                $('[name=city]').val(data.city) // error
                $('[name=phone]').val(data.phone) // error
                $('[name=etc]').val(data.etc) // error
                $('[name=photo_number]').val(data.photo_number) // error
                $("#card_status option[value=" + data.card_status + "]").prop('selected','selected')
                $("#admin").val(data.admin_id)
                $("#created_at").val(data.created_at)
                $("#print_status option[value=" + data.print_status + "]").prop('selected','selected')
                $("#taken_status option[value=" + data.taken_status + "]").prop('selected','selected')
                $("#admin_taken").val(data.admin_taken_id)
                $("#taken_at").val(data.taken_at)

                $('.student-card-modal').modal("show")
            },
            error: function () {
                alert("Something Wrong !")
            }
        });

    }
    $(function () {
        $('.student-card-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_student_card,
                    data: $('.student-card-modal form').serialize(),
                    success: function () {
                        $('.student-card-modal').modal("hide")
                        $('.student-card-modal form')[0].reset()
                        student_card_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
            }
            return false
        });
    });
    function destroyStudentCard(id) {
        if (confirm("Delete Permanently ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('student-card') }}" + "/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    student_card_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
    function listProdi() {
        $.ajax({
            type: "GET",
            url: "{{ route('list.prodi') }}",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#prodi_id_area").html($("#prodi_id_area").html() + '<option value="' + value.id + '">' + value.prodi +'</option>')
                });
            }
        });
    }
</script>