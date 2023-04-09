
 <div style="display: inline;background-color: blue; justify-content: center;">
    <div style="width:100%; justify-content: center;text-align: center; margin-bottom: 2rem;">
        <img src="{{URL::asset('front/img/placeholder.svg')}}" alt="">
    </div>
    <div style="text-align: left; color:black;">
        Dear all,         
    </div>
    <br>
    <br>
    <div style="text-align: left; color:black;">
        A New message from Land bank Website. Here are the details:
    </div>

    <ul style="text-align: left; color: black;">
        @if(isset($content['full_name']))
            <li> Name : {{ $content["full_name"] }}</li>
        @endif
        @if(isset($content['email']))
            <li> Email : {{ $content["email"] }}</li>
        @endif
        @if(isset($content['subject']))
            <li> Mobile : {{ $content["subject"] }}</li>
        @endif
        @if(isset($content['link']))
            <li> Page Link : {{ $content["link"] }}</li>
        @endif
        
        @if(isset($content['best_time_to_call_from']))
            <li> Best Time To Call : {{ $content["best_time_to_call_from"] }}</li>
        @endif
        
    </ul>

    <div style="text-align: left; color:black;">
        Message : 
    </div>
    <br>
    <div style="text-align: left; color:black;">
        @if (isset($content['message']))
                {{ $content["message"] }}
        @endif
    </div>
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
