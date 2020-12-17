@extends('layouts.app')
<style>
    body {
    background-color: #74EBD5;
    background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
    min-height: 100vh;
}

 ::-webkit-scrollbar {
    width: 5px;
}

 ::-webkit-scrollbar-track {
    width: 5px;
    background: #f5f5f5;
}

 ::-webkit-scrollbar-thumb {
    width: 1em;
    background-color: #ddd;
    outline: 1px solid slategrey;
    border-radius: 1rem;
}

.text-small {
    font-size: 0.9rem;
}

.messages-box,
.chat-box {
    height: 510px;
    overflow-y: scroll;
}

.rounded-lg {
    border-radius: 1.1rem;
}

input::placeholder {
    font-size: 0.9rem;
    color: #999;
}
</style>

@section('content')
<div id="app" current-user=" !! {{Auth::user()->name}} !!"   :token=" '{{ csrf_token() }}'">
<div class="container">

    <h2>Messages</h2>
    <div class="container py-5 px-4">
        <div class="row rounded-lg overflow-hidden shadow">
          <!-- Users box-->
          <div class="col-5 px-0">
            <div class="bg-white">
      
              <div class="bg-gray px-4 py-2 bg-light">
                <p class="h5 mb-0 py-1">Recent</p>
              </div>
      
              <div class="messages-box">
                <div class="list-group rounded-0">
                  <a class="list-group-item list-group-item-action active text-white rounded-0">
                    <div class="media"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                      <div class="media-body ml-4">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                          <h6 class="mb-0">{{Auth::user()->name}}</h6><small class="small font-weight-bold">25 Dec</small>
                        </div>
                        <p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- Chat Box-->
          <div class="col-7 px-0">
            <div class="px-4 py-5 chat-box bg-white">
                
              <!-- Sender Message-->
              <div class="row">
                <div class="col-md-8">
        
                    {{-- <div
                        class="clearfix"
                        v-for="message in messages"
                    >
                        @{{ message.user.name }}: @{{ message.message }}
                    </div> --}}
                <chat-messages :messages="messages"><chat-messages>
        
                   
                </div>
            </div>
      
            </div>
      
            <!-- Typing area -->
            <form action="#" class="bg-light">
              <div class="input-group">
                  <div class="input-group">
                    <input
                        type="text"
                        name="Type a message..."
                        class="form-control rounded-0 border-0 py-4 bg-light"
                        placeholder="Type your message here..."
                        v-model="newMessage"
                        @keyup.enter="sendMessage"
                    >
    
                    <button
                        class="btn btn-primary"
                        @click="sendMessage"
                    >
                        Send
                    </button>
                
                </div>
              </div>
            </form>
      
          </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
<!-- font aweseom -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" /> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>