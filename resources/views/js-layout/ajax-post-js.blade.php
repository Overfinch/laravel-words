<script type="module">
    $(document).ready(function () {

        function capitalize(str){
            return str.charAt(0).toUpperCase() + str.slice(1)
        }

        // Отправка AJAX запроса при отправке формы
        $("#wordForm").submit(function (event) {
            var formData = {
                word: capitalize($("#word").val()),
            };


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('attempt-word')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function (data, status, jqxhr){
                    $('.gamer-turn > span').html(data.state.actualPlayer);
                    $('#word-label > span').html(data.state.lastLetter);
                    $('#table-card').html(data.htmlTable);
                    $('#wiki-card').html(data.htmlWiki);
                    $('#wordForm')[0].reset();
                },
                error: function (data){
                    $('#error-alert > span').html(data.responseJSON.message);
                    $('#error-alert').removeClass('d-none');
                    setTimeout(function (){
                        $('#error-alert').addClass('d-none');
                    }, 3000);
                }
            });

            event.preventDefault();
        });

        // Анимация кнопки
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
