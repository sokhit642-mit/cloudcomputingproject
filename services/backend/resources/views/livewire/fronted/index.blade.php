<div>
    <div class="container-small">
        <div class="scrollbar">
          <div class="d-flex">
            @foreach ($brand as $brandItem)
              <a class="icon-nav-item" href="{{ url('/brands/'.$brandItem->slug)}}">
              <div class="icon-container mb-2" data-bs-theme="undefined">
                <img src="{{ Storage::url($brandItem->image) }}" width="90%" alt="">
              </div>
              <p class="nav-label">{{$brandItem->name}}</p>
              </a>
            @endforeach
          </div>
        </div>
      </div>
  
</div>
