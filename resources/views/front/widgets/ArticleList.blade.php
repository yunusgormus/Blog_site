@forelse ($articles as $article)

<div class="post-preview">
    <a href="{{ route('single', [$article->getCategory->slug, $article->slug]) }}">
        <h2 class="post-title">{{ $article->title }}</h2>

        <div style="width:100%; height:250px; overflow:hidden;">
            <img src="{{ asset('storage/' . $article->image) }}"
                 style="width:100%; height:100%; object-fit:cover; object-position:center;"
                 class="img-fluid"/>
        </div>

        <h3 class="post-subtitle">
            {{ Str::limit($article->content,50) }}
        </h3>
    </a>

    <p class="post-meta">
        Kategori:
        <a href="{{ route('category', $article->getCategory->slug) }}">
            {{ $article->getCategory->name }}
        </a>

        <span class="float-end">
            {{ $article->created_at->diffForHumans() }}
        </span>
    </p>
</div>

@if(!$loop->last)
    <hr>
@endif

@empty
<div class="alert alert-danger">
    <h2>Bu kategoriye ait yazı bulunamadı</h2>
</div>
@endforelse

{{ $articles->links() }}