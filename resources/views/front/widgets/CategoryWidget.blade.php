
@isset($categories)

<div class="col-md-3">
                  <div class="card">
                    <div class="card-header">
                        Kategoriler
                    </div>
                    <div class="list-group">
                            @foreach ( $categories as $category )    
                            <li class="list-group-item d-flex justify-content-between align-items-center ">    
                             <a @if(request()->segment(2) != $category->slug) href="{{ route('category', $category->slug) }}" @else class="active fw-bold text-danger" @endif>{{ $category->name }}</a>
                             <span class="badge bg-danger float-end">{{ $category->artcileCount() }}</span>
                            </li>
                            @endforeach
                    </div>
                </div>
        </div>
@endif