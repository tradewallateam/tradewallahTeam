(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Hero Header carousel
    $(".header-carousel").owlCarousel({
        animateOut: 'fadeOut',
        items: 1,
        margin: 0,
        stagePadding: 0,
        autoplay: true,
        smartSpeed: 500,
        dots: true,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
    });


    // attractions carousel
    $(".blog-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: false,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="fa fa-angle-right"></i>',
            '<i class="fa fa-angle-left"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });


    // testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="fa fa-angle-right"></i>',
            '<i class="fa fa-angle-left"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 5,
        time: 2000
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


})(jQuery);

document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('loginModal');
    if (modalEl) {
        modalEl.addEventListener('show.bs.modal', function () {
            document.body.style.overflow = 'hidden';
        });
        modalEl.addEventListener('hidden.bs.modal', function () {
            document.body.style.overflow = '';
        });
    }
});

function switchModal(hideModalId, showModalId) {
    const hideModal = bootstrap.Modal.getInstance(document.getElementById(hideModalId));
    if (hideModal) {
        hideModal.hide();
    }

    // Wait for the hidden event, then show the new one
    document.getElementById(hideModalId).addEventListener('hidden.bs.modal', function () {
        const showModal = new bootstrap.Modal(document.getElementById(showModalId));
        showModal.show();
    }, { once: true }); // Important: run only once
}

$(document).ready(function () {
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.data('register-url');
        var btn = $('#registerBtn');
        var btnText = btn.find('.btn-text');
        var spinner = btn.find('.spinner-border');

        form.find('.is-invalid').removeClass('is-invalid');
        form.find('.invalid-feedback').remove();

        // Show loading
        btn.prop('disabled', true);
        spinner.removeClass('d-none');
        btnText.text('Creating Account...');

        $.ajax({
            url: url,
            method: "POST",
            data: form.serialize(),
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message || 'Account created successfully!',
                        timer: 2500,
                        showConfirmButton: false
                    }).then(() => {
                        // Close register modal & open login
                        $('#registerModal').modal('hide');
                        setTimeout(() => {
                            $('#loginModal').modal('show');
                        }, 300);

                        form[0].reset(); // Clear form
                    });
                }
            },
            error: function (xhr) {
                var errors = xhr.responseJSON;

                // Handle validation errors
                if (xhr.status === 422 && errors.errors) {
                    $.each(errors.errors, function (field, messages) {
                        var input = form.find('[name="' + field + '"]');
                        input.addClass('is-invalid');

                        var feedback = '<div class="invalid-feedback d-block">' + messages[0] + '</div>';
                        if (input.parent().hasClass('input-group')) {
                            input.parent().after(feedback);
                        } else {
                            input.after(feedback);
                        }
                    });
                } else {
                    // General error
                    Swal.fire('Error!', errors.message || 'Something went wrong!', 'error');
                }
            },
            complete: function () {
                // Reset button
                btn.prop('disabled', false);
                spinner.addClass('d-none');
                btnText.text('Create Account');
            }
        });
    });

    // ==================== AJAX LOGIN ====================
    $("#loginForm").on("submit", function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.data('login-url');  // Safe way to get route
        var btn = $('#loginBtn');
        var btnText = btn.find('.btn-text');
        var spinner = btn.find('.spinner-border');

        // Clear previous errors
        form.find('.is-invalid').removeClass('is-invalid');
        form.find('.invalid-feedback').remove();

        // Show loading
        btn.prop('disabled', true);
        spinner.removeClass('d-none');
        btnText.text('Logging in...');

        $.ajax({
            url: url,
            method: "POST",
            data: form.serialize(),
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success || response.redirect) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome back!',
                        text: response.message || 'Login successful!',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        // Redirect to dashboard or intended page
                        window.location.href = response.redirect || "{{ route('pages.home') }}";
                    });
                }
            },
            error: function (xhr) {
                var errors = xhr.responseJSON;

                if (xhr.status === 422 && errors.errors) {
                    // Validation errors
                    $.each(errors.errors, function (field, messages) {
                        var input = form.find('[name="' + field + '"]');
                        input.addClass('is-invalid');
                        input.after('<div class="invalid-feedback d-block">' + messages[0] + '</div>');
                    });
                } else if (xhr.status === 401 || xhr.status === 403) {
                    // Wrong credentials
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: errors.message || 'Invalid email or password.',
                    });
                } else {
                    // Server error
                    Swal.fire('Error!', errors.message || 'Something went wrong!', 'error');
                }
            },
            complete: function () {
                // Reset button
                btn.prop('disabled', false);
                spinner.addClass('d-none');
                btnText.text('Login Now');
            }
        });
    });
});
