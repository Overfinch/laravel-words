<script type="module">
    $(document).ready(function () {
        $("form").submit(function (event) {
            var formData = {
                word: $("#word").val(),
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('check-word')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function (data){
                    $('#right-card').html(data.html);
                },
            });

            event.preventDefault();
        });
    });

</script>
