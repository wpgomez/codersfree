@props(['category'])

<div class="grid grid-cols-4 p-4">
  <div>
      <p class="text-lg font-bold text-center text-trueGray-500 mb-3">Sub-Categorías</p>

      <ul>
          @if (count($category->subcategories)>0)
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="" class="text-trueGray-500 inline-block font-semibold py-1 px-4 hover:bg-orange-500 hover:text-white">
                        {{$subcategory->name}}
                    </a>
                </li>
            @endforeach
          @endif
      </ul>
  </div>

  <div class="col-span-3">
      <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="">
  </div>
</div>