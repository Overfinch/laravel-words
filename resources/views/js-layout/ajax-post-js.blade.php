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
                success: function (data, status, jqxhr){
                    // console.log(data.html);
                    $('.gamer-turn > span').html(data.state.actualPlayer);
                    $('#word-label > span').html(data.state.lastLetter);
                    $('#right-card').html(data.html);
                    console.log(status);
                },
                error: function (data, textStatus, errorThrown){
                    console.log('Ошибка аджакса...');
                    console.log(data.responseJSON.message);
                    console.log(data);
                }
            });

            event.preventDefault();
        });

        var animateButton = function(e) {
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
