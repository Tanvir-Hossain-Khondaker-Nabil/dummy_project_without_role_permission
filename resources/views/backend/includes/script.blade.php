<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>


<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- Datatable js -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Include Dropify JS and CSS from jsdelivr -->
<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>

<!-- Sweetalert2 js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#photo').dropify({
            allowedFileExtensions: ['webp', 'jpg', 'jpeg', 'png', 'gif'] ,
            messages: {
                'default': 'Drag and drop a file here or <span>click</span>'
            }
        });
    });


    $('form').submit(function() {
        $(this).find(':submit').attr('disabled', 'disabled');
        //the rest of your code
        setTimeout(() => {
            $(this).find(':submit').attr('disabled', false);
        }, 2000)
    });

</script>


@stack('js')
