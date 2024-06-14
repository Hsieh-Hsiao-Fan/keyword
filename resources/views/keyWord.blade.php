<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #262626;

        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        input:focus-visible {
            outline: none;
        }
    </style>
</head>

<body style="background-color:#262626!important;">
    <div class="flex flex-col" style="height:100dvh;">
        <div style="background-color:#212121;border-bottom:1px solid hsla(0,0%,100%,.1);padding:20px">
            <h1 style="font-size:30px;color:#eee">Hi，{{$name}}</h1>
            <p style="margin-top:10px;font-size:20px;color:#eee">還要：<span style="color:#f97316;font-weight:700">{{$count}}</span></p>
            <ul>
                @foreach ($errors->all() as $error)
                <li style="color:red;margin-top:10px">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div id="card-body" class="" style="height:100%;overflow-y:auto;">
            <div class="card-body p-4 text-emerald-50">
                @foreach ($keywords as $keyword)
                <div class="p-2 flex justify-between">
                    <div>
                        {{$keyword->keyword;}}
                    </div>
                    <div>
                        {{$keyword->created_at->format('H:i:s');}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-xl p-px w-full " style="padding:0 16px">
            <div class="align-items-center my-3 rounded-2xl" style="padding:10px;border:1px solid rgba(255, 255, 255, 0.4);">
                <form method="post" action="/keyword/{{$uuid}}">
                    @csrf
                    <div class="flex items-center">
                        <img src="{{ asset('bot.webp') }}" width="46" height="46">
                        @if($count !== 0)
                        <input type="text" name="keyword" style="margin:0 10px;width:100%;background-color:transparent;color:white;" placeholder="請餵我關鍵字">
                        <button type="submit" class="rounded-xl" style="min-width:40px;width:40px;height:40px;background-color:rgba(255, 255, 255, 0.4)">
                            <i class="fa-solid fa-arrow-up" style="color:#262626"></i>
                        </button>
                        @else
                        <p style="color:white">恭喜完成!!!</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cardBody = document.getElementById("card-body");
            cardBody.scrollTop = cardBody.scrollHeight;
        });
    </script>
</body>

</html>