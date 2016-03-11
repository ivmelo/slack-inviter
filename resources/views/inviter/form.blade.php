@extends('app')

@section('content')
<div class="ui middle aligned center aligned grid">
    <div class="column">

        <form id="slack-form" method="post" action="{{ action('SlackInviterController@handleInvitation') }}" class="ui large form">
            <div class="ui green segment">

                <div id="form-loader" class="ui inverted dimmer">
                    <div class="ui text loader">Enviando...</div>
                </div>

                <h3 class="ui image header">
                    <img src="{{ asset('img/slack_mark_web.png') }}" class="image">
                    <div class="content">
                        Entrar para {{ $slack_team_url }}
                    </div>
                </h3>

                <div class="ui error message"></div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input id="input-name" type="text" name="name" placeholder="Seu nome">
                    </div>
                </div>

                <div class="field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input id="input-email" type="email" name="email" placeholder="seu@email.com">
                    </div>
                </div>

                <button type="button" class="ui fluid large green submit button">Receber convite!</button>

                <hr class="ui divider">

                <p class="simple text">
                    Design and Code by <a target="_blank" href="https://github.com/ivmjunior">Ivanilson Melo</a>.
                </p>
            </div>


        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    /*
    $( "#slack-form" ).submit(function( event ) {
        $('#form-loader').addClass('active');

        var name = $('#input-name').val();
        var email = $('#input-email').val();

        alert(name);

        $.post( "api/invite",{
            _token: "{{ csrf_token() }}",
            name: "Ivanilson",
            email: "meloivanilson@example.com"
        }).done(function( data ) {
            console.log( data );
        });

        //console.log( "Handler for .submit() called." );
        event.preventDefault();
    });
    */


    $('.ui.form').form({
        fields: {
            name: {
                identifier  : 'name',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor, digite o seu nome.'
                    },
                    {
                        type   : 'length[3]',
                        prompt : 'O campo nome precisa de pelo menos 3 caracteres.'
                    }
                ]
            },
            email: {
                identifier  : 'email',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor, digite o seu e-mail.'
                    },
                    {
                        type   : 'email',
                        prompt : 'Por favor, insira um e-mail válido.'
                    }
                ]
            }
        }
    });
});
</script>
@endsection
