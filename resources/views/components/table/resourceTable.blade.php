<div class="mx-auto w-full">
  <div class="bg-white my-4 p-6 rounded-lg text-sm sm:text-baseLarge">
    <table class="w-full">
        <thead class="text-left bg-gray-200">
          <tr class="">
              @foreach($headings as $heading)
                @cell(['heading']) {{ $heading }} @endcell
              @endforeach
              @if ($includeActions ?? false)
                 @cell(['heading']) @endcell
              @endif
          </tr>
        </thead>
      <tbody>
          @foreach ($models as $model)
              <tr class="border-b-2 last:border-b-0">
                  @foreach ($properties as $property)
                        @cell {{ data_get($model, $property) }} @endcell
                  @endforeach
                      @if ($includeActions ?? false)
                         @tblActions(['model' => $model])@endtblActions
                      @endif
              </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
