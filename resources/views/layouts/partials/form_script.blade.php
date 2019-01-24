@push('script')
    <script>
        //title and name convert to slug value auto
        $(document).ready(function(){
            $("#name").keyup(function(e){
                var name = $(this).val().trim().toLowerCase().replace(/\s+/g, '-').replace(/\//g,'-');

                $('#slug').val(name);
            });
            $("#title").keyup(function(e){

               var title = $(this).val().trim().toLowerCase().replace(/\s+/g, '-').replace(/\//g,'-');
                $('#slug').val(title);
            });
        });
    </script>
@endpush