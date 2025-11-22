
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to proceed?',
                text: 'Once you delete this, it will be permanently removed and cannot be recovered.!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });
});


$(document).ready(function () {
    $(".manage-top-header").validate({
        rules: {
            email: {
                required: false,
                email: true
            },
            phone_number: {
                required: false,
                minlength: 10,
                maxlength: 10
            },
            address: {
                required: false,
                minlength: 2
            },
        },
        messages: {
            email: {
                required: "Please enter email",
                email: "Please enter a valid email address"
            },
            phone_number: {
                required: "Please enter your phone number",
                minlength: "Your phone number must be 10 digits long",
                maxlength: "Your phone number must be 10 digits long"
            },
            address: {
                required: "Please enter address",
                minlength: "Address must be at least 2 characters long"
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element) {
            $(element).addClass('is-valid').removeClass('is-invalid');
        },
    });
});
