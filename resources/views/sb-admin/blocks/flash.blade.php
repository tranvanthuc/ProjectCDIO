@if(Session::has('flash_level'))
    <div id="flash_msg" >
        <b>{{ Session::get('flash_message')}}</b>
    </div>
@endif