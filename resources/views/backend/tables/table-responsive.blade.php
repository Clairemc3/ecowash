<div class="w-full mx-auto">
    <div class="bg-white shadow-md rounded my-6">
      <table class="text-left w-full border-collapse">
        <thead>
          <tr>
              @foreach($headings as $heading)
                <th scope="col"class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">{{$heading}}</th>
             @endforeach
             @if ($includeActions ?? false)
                <th scope="col"class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
             @endif
          </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
                <tr class="hover:bg-grey-lighter">
                    @foreach ($properties as $property)
                        <td class="py-4 px-6 border-b border-grey-light">{{data_get($model, $property)}}</td>
                    @endforeach
                    <td class="py-4 px-6 border-b border-grey-light">
                        @if ($includeActions ?? false)
                            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>