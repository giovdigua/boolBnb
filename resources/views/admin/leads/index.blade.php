{{-- foresle per visualizzare tutti i messaggi --}}
@extends('layouts.admin')
@section('content')
  <div class="container leads-container admin-container">
      <div class="row pt-5">
          <div class="col-12 col-md-9">
              <h1 class="text-center float-md-left">{{__('messages.messages')}}</h1>
          </div>
          <div class="col-12 col-md-3 d-flex justify-content-center d-lg-inline">
              <a class="text-center btn btn-info float-md-right" href="{{ route('admin.apartments.index') }}">{{__('home-admin.BtnGoBack')}}</a>
          </div>
    </div>
    <hr>
    <div class="row">
{{--    @foreach ($leads as $lead)--}}
{{--      @if ($leads->count() >= 1)--}}
{{--        <div class="col-12">--}}
{{--          <div class="card-header text-center message-recev bg-primary text-white border-white">--}}
{{--            <h5><strong>{{__('messages.messagesCardHead')}}: </strong> {{$lead->nome}}</h5>--}}
{{--          </div>--}}
{{--          <div class="card-body mex-info">--}}
{{--            <blockquote class="blockquote mb-0">--}}
{{--              <p><strong>{{__('messages.messagesCardBodyId')}}: </strong> {{$lead->apartment_id}}</p>--}}
{{--              <p><strong>Email: </strong> {{$lead->email_mittente}}</p>--}}
{{--              <p><strong>{{__('messages.messagesCardBodyObject')}}: </strong> {{$lead->oggetto}}</p>--}}
{{--              <p><strong>{{__('messages.messagesCardBodyText')}}: </strong><br> {{$lead->messaggio}}</p>--}}
{{--            </blockquote>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      @else--}}
{{--        <p>{{__('messages.messagesNone')}}</p>--}}
{{--                <p>ciao</p>--}}
{{--      @endif--}}
{{--    @endforeach--}}
        @forelse($leads as $lead)

            <div class="col-12">
                <div class="card-header text-center message-recev bg-primary text-white border-white">
                    <h5><strong>{{__('messages.messagesCardHead')}}: </strong> {{$lead->nome}}</h5>
                </div>
                <div class="card-body mex-info">
                    <blockquote class="blockquote mb-0">
                        <p><strong>{{__('messages.messagesCardBodyId')}}: </strong> {{$lead->apartment_id}}</p>
                        <p><strong>{{__('messages.messagesCardBodyTitle')}}: </strong> {{$lead->titolo}}</p>
                        <p><strong>Email: </strong> {{$lead->email_mittente}}</p>
                        <p><strong>{{__('messages.messagesCardBodyObject')}}: </strong> {{$lead->oggetto}}</p>
                        <p><strong>{{__('messages.messagesCardBodyText')}}: </strong><br> {{$lead->messaggio}}</p>
                        <form action="{{ route('admin.leads.destroy', ['lead' => $lead->id])}}" method="post" onclick="return confirm('Sei sicuro di voler eliminare questo messaggio?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">{{__('home-admin.BtnDelete')}}</button>
                        </form>
                    </blockquote>
                </div>
            </div>
          @empty
            <p>{{__('messages.messagesNone')}}</p>
        @endforelse
    <div class="paginate mx-auto">
      {{$leads->links()}}
    </div>
    </div>
  </div>
@endsection
