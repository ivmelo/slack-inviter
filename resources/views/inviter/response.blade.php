@extends('app')

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="column">

        @if($status->ok == true)
        <div class="ui green segment">
            <i class="big checkmark icon"></i>
            <h3>Enviamos um convite para o e-mail {{ $email }}.</h3>
            <p>
                Siga as instruções no convite para criar a sua conta.
            </p>
        </div>
        @elseif($status->error == 'already_invited')
        <div class="ui teal segment">
            <i class="big info icon"></i>
            <h3>Você já solicitou um convite anteriormente.</h3>
            <p>
                Por favor, verifique a sua caixa de spam.
            </p>
        </div>
        @elseif($status->error == 'already_in_team')
        <div class="ui teal segment">
            <i class="big info icon"></i>
            <h3>Você já está no time {{ env('SLACK_HOST_NAME') }}.</h3>

            <div class="ui two column grid">
                <div class="ui column">
                    <a class="ui fluid green button" href="http://{{ env('SLACK_HOST_NAME') }}.slack.com?email={{ $email }}">Login</a>

                </div>
                <div class="ui column">
                    <a class="ui fluid teal button" href="http://{{ env('SLACK_HOST_NAME') }}.slack.com/forgot?email={{ $email }}">Recuperar senha</a>
                </div>
            </div>
        </div>
        @elseif($status->error == 'invalid_email')
        <div class="ui red segment">
            <i class="big delete icon"></i>
            <h3>Você forneceu um e-mail inválido.</h3>
            <p>
                Clique <a href="{{ url('/') }}">aqui</a> para tentar novamente com outro endereço de e-mail.
            </p>
        </div>
        @else
        <div class="ui red segment">
            <i class="big delete icon"></i>
            <h3>{{ $status->error }}</h3>
            <p>
                Por favor, contate o administrador do grupo.
            </p>
        </div>
        @endif
    </div>
</div>
@endsection
