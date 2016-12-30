$('#logout').click(function() {


    if (confirm("Вы уверены что хотите выйти из сайта?")) {

        $.ajax({
            type: 'post',
            url: 'ajax/auth_exec',
            data: {
                login: "",
                password: ""
            },

            success: function(data){

            location.replace("");

            }

        });

    }

});