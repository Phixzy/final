
<style>
    body{
        margin: 0;
        font-family: 'Rubik', sans-serif;
        background: #111;

    }

    *{
        box-sizing: border-box;
    }

    h1, h3{
        font-weight: 400;
    }

    .weather-app {
    min-height: 100vh;
    background-image: url('bg_image/sun.webp');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    color: #fff;
    position: relative;
    transition: 500ms;
    opacity: 1; /*Change to 0 once finish */
    }


    .weather-app::before{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        z-index: 0;
    }

    .weather-app::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px; 
    background-image: url('bg_image/sun.webp');
    background-size: cover;
    transform: translate(-50%, -50%);
    z-index: -1;
}


    .container{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-direction: column;
        padding: 2em 3em 4em 3em;
    }

    .container > div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .city-time,
    .temp,
    .weather {
        margin: 0 1em; 
    }

    .city-time h1{
        margin: 0;
        margin-bottom: 0.2em;
        font-size: 3em;
    }

    .temp{
        font-size: 7em;
        margin: 0;
    }

    .weather img{
        display: block;
        margin: 0.5em 0;
    }

    .panel{
        position: absolute;
        width: 40%;
        height: 100%;
        top: 0;
        right: 0;
        background: rgba(110, 110, 110, 0.25);
        box-shadow: 0 8px 32px 0;
        rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        z-index: 1;
        padding: 3em 2em;
        overflow-Y: scroll;
    }

    .panel form{
        margin-bottom: 3em;
    }
    .submit i {
    color: #fff; /* Ensures the icon is white */
}

    .submit {
    position: absolute;
    top: 0;
    right: 0;
    padding: 1.5em;
    margin: 0;
    border: none;
    outline: none;
    background: #ff5722; 
    color: #fff;
    cursor: pointer;
    font-size: 1.2em; 
    transition: 0.4s;
    }

    .submit:hover {
        background: #fff !important;
        color: #000;
    }



    .search{
        background: none;
        border: none;
        border-bottom: 1px #ccc solid;
        padding: 0 1em 0.5em 0;
        width: 80%;
        color: #fff;
        font-size: 1.1em;
    }

    .search:focus{
        outline: none;
    }

    .search::placeholder{
        color: #ccc;
    }

    .panel ul{
        padding: 0 0 1em 0;
        margin: 2em 0;
        border-bottom: 1px #ccc solid;
    }

    .panel ul li{
        color: #ccc;
        margin: 2.5em 0;
    }

    .panel ul h4{
        margin: 3em 0;
    }

    .city{
        display: block;
        cursor: pointer;
    }
    .back-button {
        display: inline-block;
        padding: 1em 2em;
        background: #ff5722; 
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 1.2em;
        transition: 0.4s;
    }

    .city:hover{
        color: #fff;
    }

    .details li{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>