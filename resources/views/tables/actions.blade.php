<td>
    {{-- @can('update', $model) --}}
        <a class="inline-block mr-3" href="{{$model->path()}}">@editIcon</a>
    {{-- @endcan  --}}
    {{-- @can('delete', $model) --}}
    <form method="POST" action="{{ $model->path()}}" class="inline-block">
        @method('DELETE')
        @csrf
        <confirm-button
        message="Are you sure you want to delete this {{$model->modelName}}?">
        @trashIcon
        </confirm-button>
    </form>
    <confirm-dialog></confirm-dialog>
    {{-- @endcan --}}
</td>
