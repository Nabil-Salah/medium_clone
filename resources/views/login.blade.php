@extends('layout.layout')

@section('content')


    <link rel="stylesheet" href="/styles/Login_style.css" />
    <div class="login-form">
        <img
            src="/assets/TwitterFavIcon.png"
            alt="twitter icon"
            loading="lazy"
            width="70px"
            class="logo"
        />
        <h2 class="main-heading">Log in to twitter</h2>
        <button>
            <img
                src="/assets/google icon.png"
                alt="google logo"
                loading="lazy"
                width="25px"
            />Sign in with google
        </button>
        <button>
            <img
                src="/assets/apple icon.png"
                alt="apple logo"
                loading="lazy"
                width="50px"
            />Sign in with apple
        </button>
        <hr />
        <span class="or"></span>
        <form method="post" action="{{route('login')}}">
            @csrf
            <input type="text" name= "email" placeholder="Enter email, phone or username" required id="user-Input"/>
            <input type="password" name = "password" required id="user-Input"/>
            <input type="submit" name="submit" value="submit" class="special" >
        </form>
        <button class="last">Forget password</button>
        <p>Don't Have an account? <a href="/register" class="hover-sign">sign up</a></p>
        <script src="/script/app.js"></script>
    </div>
