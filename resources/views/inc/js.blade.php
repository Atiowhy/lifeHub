<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- General JS Scripts -->
<script src="{{asset('assets/dist/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/popper.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('assets/dist/assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('assets/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<script src="{{asset('assets/dist/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>



<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('assets/dist/assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/dist/assets/js/custom.js')}}"></script>

<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     var testBtn = document.querySelector('.testbtn')
    //     testBtn.addEventListener('click', function() {
    //         alert('berhasil')
    //     })
    // })
    $(document).ready(function(){
        $('#articlePost').on('submit', function(e){
            e.preventDefault();

            var formData = new FormData(this)

            $.ajax({
                url:  '{{route('store-articles')}}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    Swal.fire({
                        title: "Sukses!",
                        text: response.message,
                        icon: "success"
                    }).then(() => {
                        $('#articlePost')[0].reset();
                        $('#image-preview-img').hide();
                    });
                    console.log(response);
                },
                error: function(xhr){
                var errors = xhr.responseJSON.errors;
                    var errorMessage = '<ul>';
                    $.each(errors, function (key, value) {
                        errorMessage += '<li>' + value[0] + '</li>';
                    });
                    errorMessage += '</ul>';
                    Swal.fire({
                        title: "Kesalahan!",
                        html: errorMessage, // SweetAlert2 mendukung HTML secara default
                        icon: "error"
                    });
                }
            })
        })
    })

    $(document).ready(function(){
        $('#image-upload').on('change', function(){
            const file = this.files[0]
            if(file){
                const reader = new FileReader()
                reader.onload = function(){
                    $('#image-preview-img').attr('src', event.target.result).show()
                }
                reader.readAsDataURL(file)
                console.log(reader);

            }
        })
    })
</script>
