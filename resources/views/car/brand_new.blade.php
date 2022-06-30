<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>models</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");

        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        body {
            width: 100vw;
            min-height: 100vh;
            background-color: #f0f0f0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .container .box {
            position: relative;
            width: 30rem;
            height: 30rem;
            margin: 4rem;
        }

        .container .box:hover .imgBox {
            transform: translate(-3.5rem, -3.5rem);
        }

        .container .box:hover .content {
            transform: translate(3.5rem, 3.5rem);
        }

        .imgBox {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            transition: all 0.5s ease-in-out;
        }

        .imgBox img {
            width: 30rem;
            height: 30rem;
            object-fit: cover;
            resize: both;
        }

        .content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 1.5rem;
            display: flex;
            justify-content: center;
            background-color: #fff;
            z-index: 1;
            align-items: flex-end;
            text-align: center;
            transition: 0.5s ease-in-out;
        }

        .content h2 {
            display: block;
            font-size: 2rem;
            color: #111;
            font-weight: 500;
            line-height: 2rem;
            letter-spacing: 1px;
        }

        .content span {
            color: #555;
            font-size: 1.4rem;
            font-weight: 300;
            letter-spacing: 2px;
        }

        @media (max-width: 600px) {
            .container .box:hover .content {
                transform: translate(0, 3.5rem);
            }

            .container .box:hover .imgBox {
                transform: translate(0, -3.5rem);
            }
        }

        /*# sourceMappingURL=main.css.map */
    </style>
</head>

<body>
    <div style="text-align: center; margin-top:10px;" >
        <h2>Choose Brand</h2>
    </div>

    <div class="container">

        @foreach ($brands as $brand)
            <div class="box">
                <div class="imgBox">
                 <a href="{{url("new/car",$brand->id)}}">   <img src="{{ "uploads/$brand->img" }}" alt="">  </a>
                </div>
                <div class="content">
                    <h2>{{ $brand->name }}</h2>
                </div>

            </div>
        @endforeach

    </div>
</body>

</html>
