
 <div style="display: inline;background-color: blue; justify-content: center; text-align: justify;">
    <div style="width:100%; justify-content: center;text-align: center; margin-bottom: 2rem;">
        <img src="{{URL::asset('front/img/mail.png')}}" style="width: 100%;" alt="">
    </div>
    <div style="color: black; width: 90%;">
        @if (isset($content['full_name']))
            <div style="text-align: left;">
                Thank you, {{ $content["full_name"] }}
            </div>

        @endif
            <br>
            <div style="text-align: left; color: black;">
                @if (isset($content['message']))
                        {{ $content["message"] }}
                @else
                @if(App::getLocale() == 'en')
                    @if($setting->auto_reply_message_en)
                        {{$setting->auto_reply_message_en}}
                    @endif
                @else
                    @if($setting->auto_reply_message_ar)
                        {{$setting->auto_reply_message_ar}}
                    @endif
                @endif
                @endif
            </div>
        @if(isset($content['urls']) && count($content['urls']))
            <h4 style="color: black;">Related Urls</h4>
            @foreach($content['urls'] as $key => $url)
            <div style="text-align: left;">
                <a href="{{$url}}">{{ $key }}</a>
            </div>
            @endforeach
        @endif
        <br>
        <br>
        <br>
        <div style="text-align: center;">
            <h5 style="color: green;">Have A Nice Day :)</h5>
        </div>
        <br>
        <br>
        <div style="text-align: center;">
            <h6 style="color:black;">Note: This is automated email generated from <a href="{{route('front.home')}}">Land bank</a> website </h6>
        </div>

    </div>
</div>
