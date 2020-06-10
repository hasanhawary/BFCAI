
<input type="hidden" name="message_replay"  value="{{$message_replay->id}}" id="message_replay">

<div class="modal " id="replay" tabindex="11" role="dialog" aria-labelledby="replay">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Replay To {{$user->full_name}}</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <div class="modal-body">
                <form action="{{route('instructor.messages.update', $message_replay->id)}}" method="post">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="form-group" style="margin-bottom: -15px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="ik ik-mail"></i>
                                </div>
                            </div>
                            <input id="subject" value="{{old('subject')}}" name="subject" placeholder="@lang('site.subject')" type="text"  class="form-control  @error('subject') is-invalid @enderror">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message_replay }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="ik ik-user"></i>
                                </div>
                            </div>
                            <select disabled class="form-control wide select1" name="receive_user" required>
                                <option selected value='{{$message_replay->receive_user}}'>{{$message_replay->receive_user}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="ik ik-users"></i>
                                </div>
                            </div>
                            <select disabled class="form-control wide select1" name="receive_user" required>
                                <option selected value='{{$message_replay->receive_user_id}}'>{{$user->full_name}}</option>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" required cols="4" id="editor1" name="content" rows=6>{{!empty($message_replay->content) ? $message_replay->content : ''}}</textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message_replay }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-20">
                        <div class="dropzone" id="myzone" ></div> 
                    </div>

                    <div class="modal-footer mt-20">
                        <button class="btn btn-primary l-s-1 s-12 text-uppercase">
                            Send Message
                        </button>
                    </div>  
                </form>
            </div>
            
        </div>
    </div>
</div>  
