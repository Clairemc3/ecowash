<thead class="text-left bg-gray-200">
    <tr>
        @foreach($headings as $heading)
          <th scope="col" class="py-4 px-6">{{$heading}}</th>
        @endforeach
        {{ $after }}
    </tr>
</thead>
