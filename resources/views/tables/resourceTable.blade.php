<div class="mx-auto w-full">
  <div class="bg-white my-4 p-6 rounded-lg">
    <table class="w-full">
        <thead class="text-left bg-gray-200 hidden sm:table-header-group">
          <tr class="">
              @foreach($headings as $heading)
                <th scope="col" class="py-4 px-6">{{$heading}}</th>
              @endforeach
              @if ($includeActions ?? false)
                <th scope="col" class="py-4 px-6" ></th>
              @endif
          </tr>
        </thead>
      <tbody>
          @foreach ($models as $model)
              <tr class="border-b-2 last:border-b-0">
                  @foreach ($properties as $property)
                      <td class="py-4 px-6">{{data_get($model, $property)}}</td>
                  @endforeach
                  <td>
                      @if ($includeActions ?? false)
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
                      @endif
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
