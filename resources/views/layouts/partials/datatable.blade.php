@push('script')
    <script type="text/javascript" src="{{url('assets/vali/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/vali/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $('#data-table').DataTable();
    </script>
@endpush