@extends('layouts.admin')
@section('content')
@can('doctor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.doctors.create') }}">
                Add New
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
       Doctors List 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Language
                        </th>
                        <th>
                            Country
                        </th>
                        <th>
                            Join_at
                        </th>
                        <th>
                            Major
                        </th>
                        <th>
                            Rateing
                        </th>
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $key => $doctor)
                        <tr data-entry-id="{{ $doctor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $doctor->id ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->description ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->language ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->country ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->join_at ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->major ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->rateing ?? '' }}
                            </td>
                            
                        
                            <td>
                                <!-- @can('doctor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.doctors.show', $doctor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('doctor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.doctors.edit', $doctor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('doctor_delete')
                                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan -->

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('doctor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Doctor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
