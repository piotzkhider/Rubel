@extends('layouts.master')

@section('title', 'Post')

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/dist/css/home.min.css') }}">
@endsection

@section('content')
  <div>
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Post
          </h1>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2 posts-column">
            @forelse ($posts as $post)
              <div class="column">
                @if(is_date_within_a_week($post->publication_date))
                  <p>
                    <span class="tag is-danger">New!</span>
                  </p>
                @endif
                <p>
                  <span>{{ $post->publication_date }}</span>
                </p>
                <h1 class="title">
                  <a href="{{ route('web.posts.show', $post->title) }}">
                    {{ mb_str_limit($post->title, 20, '...') }}
                  </a>
                </h1>
                <h2 class="blog-summary">
                  {{ mb_str_limit(strip_tags($post->html_content), 300, '...') }}
                </h2>
                <p class="has-text-right has-text-muted">
                  <a href="{{ route('web.posts.categories.getPosts', $post->category->name) }}">
                    {{ $post->category->name }}
                  </a>
                </p>
                <p class="has-text-right">
                  @forelse ($post->tags as $tag)
                    <a href="{{ route('web.posts.tags.getPosts', $tag->name) }}">
                      <span class="tag is-primary">
                        {{ $tag->name }}
                      </span>
                    </a>
                  @empty
                    No Tags.
                  @endforelse
                </p>
              </div>
            @empty
              <div class="column">
                <p class="has-text-centered">Nothing Found.</p>
              </div>
            @endforelse
          </div>
          <div class="column is-3">
            @include('partials.sidebar')
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-7 is-offset-2">
          @include('partials.links')
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/js/post.bundle.js') }}></script>
@endsection
