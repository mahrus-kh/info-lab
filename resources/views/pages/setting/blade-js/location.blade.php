    <script type="text/javascript">
    var location_dt;
    var url_location;
    $(document).ready(function () {
        location_dt = $("#location-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{route('location.datatables')}}",
            columns: [
                {data: 'location', name: 'location'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function addLocation() {
        $('[name=_method]').val("POST")
        url_location = "{{ route('location.store') }}"
        $("#modal-location-title").html("Add New Location")
        $("#modal-location-btn").prop("class", "btn btn-success")
        $("#modal-location-btn").html("SAVE")
        $('.location-modal form')[0].reset()
        $('.location-modal').modal("show")
    }
    function editLocation(id) {
        $('[name=_method]').val("PATCH")
        url_location = "{{ url('setting/location') }}/" + id
        $("#modal-location-title").html("Add New Location")
        $("#modal-location-btn").prop("class", "btn btn-info")
        $("#modal-location-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ url('setting/location') }}/" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=location]').val(data.location)
                $('.location-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.location-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_location,
                    data: $('.location-modal form').serialize(),
                    success: function () {
                        $('.location-modal').modal("hide")
                        $('.location-modal form')[0].reset()
                        location_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroyLocation(id) {
        if (confirm("Delete Permanently and All Left Stuff ?")){
            $.ajax({
                type: "POST",
                url: "{{ url('setting/location/') }}/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    location_dt.ajax.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>