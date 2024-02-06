@extends('layout.layout')

@section('content')
    @forelse ($articles as $article)
        <div class="mt-3">
            <div>
                {{$article->description}}
            </div>
        </div>
    @empty
        <p class="text-center mt-4">No results Found.</p>
    @endforelse

