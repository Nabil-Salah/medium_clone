@extends('layout.layout')

@section('content')

    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link rel="stylesheet" href="styles/homePage.css" />
    <link rel="icon" href="/assets/TwitterFavIcon.png" />
    <link rel="stylesheet" href="/styles/responsive.css">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="search">
                    <input value="{{ request('search','') }}" name="search" type="text" placeholder="Search article" class="search-bar"/>
                </div>
            </form>
        </div>
        <br />
        <div class="card-body">
            <form action="{{ route('storearticle') }}" method="post">
                @csrf
                <div class="search">
                    <input value="{{ request('search','') }}" name="description" type="text" placeholder="content article" class="search-bar"/>
                    <input value="" name="title" type="text" placeholder="title article" class="search-bar"/>
                    <input value="" name="tag" type="text" placeholder="tag article" class="search-bar"/>
                    <br /><br />
                    <input type="submit" name="submit"  value="submit" class="redirect">
                </div>
            </form>
        </div>
    </div>
