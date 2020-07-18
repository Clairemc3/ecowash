@extends('layouts.backend')

@section('title', 'Sliders')

@section('content')

{{-- Resource index header --}}
@resourceIndexHeader([
    'modelClass' => App\Slider::class,
    'title' => 'Sliders',
    'createRoute' => route('admin.slider.create'),
    'addResourceText' => 'Add a slider'])


@if ($sliders->isEmpty())
    <p> You have no sliders.</p>
    <p>Please add a slider.</p>
@else
    @tbl
        @tblHead([
            'headings' => ['Order', 'Image'],
        ])
            @slot('after')
                <x-table.cell type="heading" class="hidden sm:table-cell">Text</x-table.cell>
                @cell(['heading', 'class' => 'sm:table-cell']) @endcell
            @endslot
        @endtblHead

        @tblBody
            @foreach($sliders as $slider)
                @tblRow()
                    @cell {{ $slider->order }} @endcell
                    @cell <x-image-thumbnail size="table" :imageUrl="$slider->image_source"/> @endcell
                    <x-table.cell
                    class="text-center hidden sm:table-cell">
                    {{ $slider->truncatedText  }}
                     </x-table.cell>
                    @tblActions(['model' => $slider])@endtblActions
                @endtblRow
            @endforeach
        @endtblBody
    @endtbl
@endif

@endSection
