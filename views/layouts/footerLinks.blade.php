<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = {{ config('chatify.pusher.options.logToConsole') }};
  var pusher = new Pusher("{{ config('chatify.pusher.key') }}", {
    encrypted: {{ config('chatify.pusher.options.encrypted') }},
    cluster: "{{ config('chatify.pusher.options.cluster') }}",
    
    //Laravel websocet configuration
    wsHost: {{ config('chatify.laravel-websocket-js.wsHost') }},
    wsPort: {{ config('chatify.laravel-websocket-js.wsPort') }},
    forceTLS: {{ config('chatify.laravel-websocket-js.forceTLS') }},
    disableStats: {{ config('chatify.laravel-websocket-js.disableStats') }},

    authEndpoint: '{{route("pusher.auth")}}',
    auth: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
  });
</script>
<script src="{{ asset('js/chatify/code.js') }}"></script>
<script>
  // Messenger global variable - 0 by default
  messenger = "{{ @$id }}";
</script>