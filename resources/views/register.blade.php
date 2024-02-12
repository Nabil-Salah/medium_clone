@extends('layout.layout')

@section('content')
    <link rel="icon" href="assets/TwitterFavIcon.png" />
    <link rel="stylesheet" href="/styles/SignUp.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,700;1,300;1,400;1,600;1,800&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <div class="container">
        <img
            src="/assets/TwitterFavIcon.png"
            alt="twitter logo"
            loading="lazy"
            width="70px"
            class="icon"
        />
        <h2 class="heading">sign up to twitter</h2>
        <form action="{{ route('register') }}" method="post" class="form-data">
            @csrf
            <input
                name="name"
                type="text"
                class="special-input"
                placeholder="yousef "
                required
                id="userInput"
            >
            <i class="fa-regular fa-address-card" id="fname-icon"></i>

            <input
                name="username"
                type="text"
                placeholder="Fathy"
                class="special-input2"
                required
                id="userInput"
            />
            <i class="fa-regular fa-address-card" id="lname-icon"></i>

            <input
                type="email"
                name="email"
                required
                placeholder="mm1254@bnc.com"
                class="special-input3"
                id="userInput"
            >
            <i class="fa-regular fa-envelope" id="mail-icon"></i>

            <input
                type="password"
                name="password"
                required
                min="8"
                max="22"
                id="userInput"
            >
            <i class="fa-solid fa-lock" id="password-icon"></i>
            <br /><br />
            <input type="submit" name="submit"  value="submit" class="redirect">
        </form>
        <!-- <a href="home-page.html" class="redirect">sign up</a> -->
        <br /><br /><br />
        <p>Already have an account ? <a href="/login">Sign in</a></p>
    </div>
