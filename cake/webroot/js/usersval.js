$(document).ready(function () {


    $("form").validate({
        rules: {
            first_name:
            {
                required: true,
                minlength: 4,

            },
            last_name:
            {
                required: true,
                minlength: 4,
            },

            email: {
                required: true,
                email: true,
            },
            phone_number: {
                required: true,
                minlength: 10,
                maxlength: 12,
            },
            
            password: {
                required: true,
                minlength: 5,
                maxlength: 15,
            },

            gender: {
                required: true,
            },

            // cpwd: {
            //     required: true,
            //     equalTo: "#pw",

            // },

        },
        messages:
        {
           first_name:
            {
                required: "please enter the name",
                minlength: "name should be at least 4 characters",
            },
            last_name:
            {
                required: "please enter the name",
                minlength: "name should be at least 4 characters",
            },
            email: {
                required: "please enter your email",
                email: "please enter in proper format",
            },

            phone_number: {
                required: "please enter your phone number",
                minlength: "it should have minimum 10 numbers",
                maxlength: "it should not more than 12 numbers",
            },
           
            password: {
                required: "please enter your password",
                minlength: "password should atleat 5 characters long",
                maxlength: "it should not more than 15 characters long",
            },
            gender: {
                required: "please select gender",
            },
        },

    });
});