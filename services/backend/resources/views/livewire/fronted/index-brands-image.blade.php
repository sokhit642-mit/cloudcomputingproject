<div>
    @if ($brand)
        @foreach ($brand as $brandItem)
            <img src="{{ Storage::url($brandItem->image) }}" width="12%" alt=""  class=" border p-1 rounded-1">
        @endforeach
    @else
        <p>No brand</p>
    @endif
   
</div>
