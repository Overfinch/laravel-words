<script type="module">
    $(document).ready(function () {
        $("#contactForm").submit(function (event) {
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
                    // console.log(data.html);
                    $('#right-card').html(data.html);
                },
            });

            event.preventDefault();
        });

        var animateButton = function(e) {
            console.log(e.target);
            e.preventDefault;
            //reset animation
            e.target.classList.remove('animate');

            e.target.classList.add('animate');
            setTimeout(function(){
                e.target.classList.remove('animate');
            },700);
        };

        var bubblyButtons = document.getElementsByClassName("bubbly-button");

        for (var i = 0; i < bubblyButtons.length; i++) {
            bubblyButtons[i].addEventListener('click', animateButton, false);
        }
    });

</script>
