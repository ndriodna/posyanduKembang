  <!DOCTYPE html>
  <html>
  <head>
      <title>Admin</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
      {{-- bootstrapcdn --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      {{-- fontawesome --}}
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      {{-- dataTables --}}
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
      {{-- sweetalert2 --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.1/sweetalert2.min.css" integrity="sha512-A374yR9LJTApGsMhH1Mn4e9yh0ngysmlMwt/uKPpudcFwLNDgN3E9S/ZeHcWTbyhb5bVHCtvqWey9DLXB4MmZg=="
        crossorigin="anonymous" />
        {{-- select bootstrap --}}
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
      {{-- jasny fileinput --}}
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
      <!-- Template CSS -->
      <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
      <link rel="stylesheet" href="{{asset('assets')}}/css/components.css">
      <link rel="stylesheet" href="{{asset('assets')}}/css/tags.css">
  </head>

  <body>
      @auth()
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      <div id="app">
          @include('layouts.page_templates.auth')
          @endauth
      </div>
      @guest()
      @include('layouts.page_templates.guest')
      @endguest

      <!-- General JS Scripts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

      <!-- Template JS File -->
      <script src="{{asset('assets')}}/js/scripts.js"></script>
      <script src="{{asset('assets')}}/js/custom.js"></script>
      <script src="{{asset('assets')}}/js/stisla.js"></script>
      {{-- <script src="{{asset('assets')}}/js/tags.js"></script> --}}
      {{-- <script src="{{asset('assets')}}/js/page/forms-advanced-forms.js"></script> --}}
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>

      {{-- tinymce5 --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" integrity="sha512-RnlQJaTEHoOCt5dUTV0Oi0vOBMI9PjCU7m+VHoJ4xmhuUNcwnB5Iox1es+skLril1C3gHTLbeRepHs1RpSCLoQ==" crossorigin="anonymous"></script>
      <script>
        var editor_config = {
          path_absolute : "/",
          selector: 'textarea.my-editor',
          relative_urls: false,
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
              url : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no",
              onMessage: (api, message) => {
                callback(message.content);
              }
            });
          }
        };

        tinymce.init(editor_config);
      </script>



      {{-- https://datatables.net/ --}}
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

      <script type="text/javascript">
          $(document).ready(function() {
              $('#DataTable').DataTable({
                  order: [
                      [2, 'desc'],
                      [0, 'asc']
                  ]
              });
          });
      </script>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.1/sweetalert2.min.js" integrity="sha512-EA9r8JpWbDk5D7aCAyCc+BgwgJ1tbGeCTiXnOn+2Dcz2Hlh/IPyzfUzdpx5XngNElAtsAKlfyGUAfF/BgO4kuw==" crossorigin="anonymous"></script>
      <script>
          function deleteItem(id) {
              const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                  },
                  buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
                  title: 'Delete This Data?',
                  text: "Data cannot be restore!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes',
                  cancelButtonText: 'No',
                  reverseButtons: true
              }).then((result) => {
                  if (result.value) {
                      event.preventDefault();
                      document.getElementById('delete-form-' + id).submit();

                  } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                  ) {
                      swalWithBootstrapButtons.fire(
                          'Cancel',
                          'Data are safe now ',
                          'error'
                      )
                  }
              })
          }
      </script>

      <script type="text/javascript">
      //add collapse to all tags hiden and showed by select mystuff
$('.mystaff_hide').addClass('collapse');

//on change hide all divs linked to select and show only linked to selected option
$('#mystuff').change(function(){
  //Saves in a variable the wanted div
  var selector = '.mystaff_' + $(this).val();

  //hide all elements
  $('.mystaff_hide').collapse('hide');

  //show only element connected to selected option
  $(selector).collapse('show');
});
      </script>
  </body>

  </html>
