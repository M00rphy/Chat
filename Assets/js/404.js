const src = document.getElementById("terminal");
let blue = undefined;
let red = undefined;
let quest = false;
let answer = undefined;
// noinspection SyntaxError
let input = $(".404-input");
input.focus();
$('.container').on('click', function (e) {
    input.focus();
});

input.on('keyup', function (e) {
    $('.new-input').text(input.val());
});

$('.four-o-four-form').on('submit', function (e) {
        e.preventDefault();
        // noinspection SyntaxError
        const val = $(this).children($('.404-input')).val().toLowerCase();
        let href;

        switch (val) {
            case 'let_me_in':
                answer = "No";
                resetForm();
                break;

            case 'hello_there':
                answer = "General Kenobi";
                resetForm();
                break;

            case 'anon_ops':
                showAnon();
                answer = "Greetings World";
                break;

            case 'lol':
                answer = 'Do you think this is funny m8??';
                resetForm();
                break;

            case 'allow_access':
                answer = 'Nope';
                resetForm();
                break;

            case 'why':
                answer = "Because I don't want to";
                resetForm();
                break;

            case 'access_granted':
                answer = "Access Denied";
                resetForm();
                break;

            case 'override_mainframe':
                answer = "Are you being serious?";
                resetForm();
                break;

            case 'play_game':
                answer = "not unless you know how";
                resetForm();
                break;

            case 'join_now':
                join_now();
                break;

            case 'red':
                red = 'red';
                redPillHandler();
                break;

            case 'blue':
                blue = 'blue';
                bluePillHandler();
                break;


            case 'clear':
            case 'cls':
                $(".prompt_output").remove();
                resetForm();
                quest = false;
                $(".prompt").empty();
                $(".prompt").remove();
                $(".imgPrint").remove();
                break;


            case '/help':
                answer = "Available commands:\n\
             delete\n\
             clear || cls";
                resetForm();
                break;

            case 'help':
                answer = "Available commands:\n\
             delete\n\
             clear || cls";
                resetForm();
                break;

            case '/help_ext':
                answer = "Available extended commands: \n\
            join_now \n\
            allow_access \n\
            access_granted \n\
            anon_ops \n\
            override_mainframe \n\
            play_game";
                resetForm();
                break;

            case 'help_ext':
                answer = "Available extended commands: \n\
            join_now \n\
            allow_access \n\
            access_granted \n\
            anon_ops \n\
            override_mainframe \n\
            play_game";
                resetForm();
                break;

            case 'exit':
                answer = "Do you really thought this was a real terminal? LOL";
                resetForm();
                break;

            case 'Anon_ops':
                showAnon();
                answer = "Greetings World";
                break;

            case 'Lol':
                answer = 'Do you think this is funny m8??';
                resetForm();
                break;

            case 'Allow_access':
                answer = 'Nope';
                resetForm();
                break;

            case 'Why':
                answer = "Because I don't want to";
                resetForm();
                break;

            case 'Access_granted':
                answer = "Access Denied";
                resetForm();
                break;

            case 'Override_mainframe':
                answer = "Are you being serious?";
                resetForm();
                break;

            case 'Play_game':
                answer = "not unless you know how";
                resetForm();
                break;

            case 'Join_now':
                join_now();
                quest = true;
                resetForm();
                break;

            case 'Red':
                red = 'red';
                redPillHandler();
                break;

            case 'Blue':
                blue = 'blue';
                bluePillHandler();
                break;


            case 'Clear':
            case 'Cls':
                $('.prompt_output').remove();
                resetForm();
                quest = false;
                $('.prompt').empty();
                $('.prompt').remove();
                $('.imgPrint').remove();
                break;


            case '/Help':
                answer = "Available commands:\n\
             delete\n\
             clear || cls";
                resetForm();
                break;

            case 'Help':
                answer = "Available commands:\n\
             delete\n\
             clear || cls";
                resetForm();
                break;

            case '/Help-ext':
                answer = "Available extended commands: \n\
            join_now \n\
            allow_access \n\
            access_granted \n\
            anon_ops \n\
            override_mainframe \n\
            play_game";
                resetForm();
                break;

            case 'Help-ext':
                answer = "Available extended commands: \n\
            join_now \n\
            allow_access \n\
            access_granted \n\
            anon_ops \n\
            override_mainframe \n\
            play_game";
                resetForm();
                break;

            case 'Exit':
                answer = "Do you really thought this was a real terminal? LOL";
                resetForm();
                break;

            case '':
                answer = "That's an empty string dude";
                resetForm();
                break;

            default:
                answer = "'" + val + "'" + " " + "it's not acceptable!";
                resetForm();
                break;
        }
    }
);

function join_now() {
    $('.terminal').append("<div class='imgPrint'>" +
        "<p class='lr_out'>This is your last chance.</p>" +
        "<p class='lr_out'>After this, there is no turning back.</p>" +
        "<p class='lr_out'>You take the right path—the story ends,</p>" +
        "<p class='lr_out'>you wake up in your bed and believe whatever you want to believe.</p>" +
        "<p class='lr_out'>You take the left path—you stay in Wonderland,</p>" +
        "<p class='lr_out'>and I show you how deep the rabbit hole goes.</p>" +
        "<p class='lr_out'>Remember: all I'm offering is the truth.</p>" +
        "<p class='lr_out'>Nothing more.</p>" +
        "</div>");
    const lines = $('.imgPrint p');
    $.each(lines, function (index, line) {
        setTimeout(function () {
            $(line).css({
                "opacity": 1
            });

            textEffect($(line))
        }, index * 100);
    });

    setTimeout(function () {

        resetForm(true);
    }, (lines.length * 100) + 1000);
    resetForm();
    quest = true;
}

function redPillHandler() {
    if (red === 'left' && quest === true) {
        answer = "So be it 🜏 ⛧!";
        pentagram();
        resetForm();
        $('.prompt_output').remove();
        $('.prompt').remove();
    }
}

function bluePillHandler() {
    if (blue === 'right' && quest === true) {
        showMiddleFinger();
        $('.prompt').remove();
        answer = "ok ┌∩┐(◣_◢)┌∩┐";
        resetForm();
        $('.new-input').remove();
    }
}

function resetForm() {
    // noinspection SyntaxError
    const input = $('.404-input');
    $('.new-input').removeClass('new-input');
    input.val('');
    $('.terminal').append('<p class="prompt">' + answer + '</p><p class="prompt_output new-input"></p>');

    $('.new-input').velocity(
        'scroll',
    ), {
        duration: 100,
    }
}

function pentagram() {
    $('.terminal').append("<div class='imgPrint'>" +
        "<p class='lr_out'>___________________ssssssss__________________ </p>" +
        "<p class='lr_out'>____________sssss____________sssss____________ </p>" +
        "<p class='lr_out'>_________ssss____________________ssss________ </p>" +
        "<p class='lr_out'>_______sss__s____________________s__sss______ </p>" +
        "<p class='lr_out'>_____sss_____ss________________ss_____sss_____ </p>" +
        "<p class='lr_out'>____ss_______sssss__________sssss_______ss_____ </p>" +
        "<p class='lr_out'>___ss_________s___ss______ss___s________ss___ </p>" +
        "<p class='lr_out'>__ss__________ss____ssssss____ss__________ss__ </p>" +
        "<p class='lr_out'>_sss___________ss___s____s___ss___________sss_ </p>" +
        "<p class='lr_out'>_sss___________ss__s______s__ss___________sss_ </p>" +
        "<p class='lr_out'>_ss____________ssss________ssss____________ss_ </p>" +
        "<p class='lr_out'>_ss________sss__________________sss________ss_  </p>" +
        "<p class='lr_out'>_ss_____sss______ss________ss______sss______ss_ </p>" +
        "<p class='lr_out'>_sss__sssssssssssssssssssssssssssssssssss__sss_ </p>" +
        "<p class='lr_out'>__ss_______________s____ss______________sss__ </p>" +
        "<p class='lr_out'>___ss______________ss___ss_____________sss___ </p>" +
        "<p class='lr_out'>____ss______________s__ss_____________sss____ </p>" +
        "<p class='lr_out'>_______sss___________sss___________sss_______ </p>" +
        "<p class='lr_out'>_________ssss_________s_________sss__________ </p>" +
        "<p class='lr_out'>____________sssss_____s____sssss_____________ </p>" +
        "<p class='lr_out'>__________________ssssssss________________</p>" +


        "<p class='lr_out'>                                                              </p></div>");
    const lines = $('.imgPrint p');
    $.each(lines, function (index, line) {
        setTimeout(function () {
            $(line).css({
                "opacity": 1
            });

            textEffect($(line))
        }, index * 100);
    });
    $('.terminal').append('<p class="lr_out">' + answer + '</p><p class="prompt_output new-input"></p>');
    $('.new-input').velocity(
        'scroll'
    ), {
        duration: 100
    };
    setTimeout(function () {
        window.location.replace('errorLogs/main.php');
    }, 3500);
}

function showMiddleFinger() {
    $('.terminal').append("<div class='imgPrint'>" +
        "<p class='lr_out'>░░░░░░░░░░░░░▄▄▄▄▄▄▄░░░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░▄▀▀▀░░░░░░░▀▄░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░▄▀░░░░░░░░░░░░▀▄░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░▄▀░░░░░░░░░░▄▀▀▄▀▄░░░░░</p>" +
        "<p class='lr_out'>░░░░▄▀░░░░░░░░░░▄▀░░██▄▀▄░░░░</p>" +
        "<p class='lr_out'>░░░▄▀░░▄▀▀▀▄░░░░█░░░▀▀░█▀▄░░░</p>" +
        "<p class='lr_out'>░░░█░░█▄░░░░█░░░▀▄░░░░░▐░█░░░</p>" +
        "<p class='lr_out'>░░▐▌░░█▀░░░▄▀░░░░░▀▄▄▄▄▀░░█░░</p>" +
        "<p class='lr_out'>░░▐▌░░█░░░▄▀░░░░░░░░░░░░░░█░░</p>" +
        "<p class='lr_out'>░░▐▌░░░▀▀▀░░░░░░░░░░░░░░░░▐▌░</p>" +
        "<p class='lr_out'>░░▐▌░░░░░░░░░░░░░░░▄░░░░░░▐▌░</p>" +
        "<p class='lr_out'>░░▐▌░░░░░░░░░▄░░░░░█░░░░░░▐▌░</p>" +
        "<p class='lr_out'>░░░█░░░░░░░░░▀█▄░░▄█░░░░░░▐▌░</p>" +
        "<p class='lr_out'>░░░▐▌░░░░░░░░░░▀▀▀▀░░░░░░░▐▌░</p>" +
        "<p class='lr_out'>░░░░█░░░░░░░░░░░░░░░░░░░░░█░░</p>" +
        "<p class='lr_out'>░░░░▐▌▀▄░░░░░░░░░░░░░░░░░▐▌░░</p>" +
        "<p class='lr_out'>░░░░░█░░▀░░░░░░░░░░░░░░░░▀░░░</p>" +
        "<p class='lr_out'>╦═╗╔═╗╔══║░║╔═╗░░╦═╗╦░╦═╗░░╦░</p>" +
        "<p class='lr_out'>║░║╠═╣╠═░║░║║░║░░║░║║░║░║░░║░</p>" +
        "<p class='lr_out'>╩═╝║░║║░░╚═╝╩╩╝░░╩═╝╩░╩═╝░░╩░</p>" +
        "<p class='lr_out'>═╦║░║╔═╗═╦═░░╔═╗╔═╗╔═╗╦═╗░╔═╗</p>" +
        "<p class='lr_out'>░║║░║╚═╗░║░░░╠╦╝╠╣░╠═╣║░║░░╔╝</p>" +
        "<p class='lr_out'>╚╝╚═╝╚═╝░║░░░║╚═╚═╝║░║╩═╝░░▄░</p>" +
        "<p class='lr_out'>                                                              </p></div>");
    const lines = $('.imgPrint p');
    $.each(lines, function (index, line) {
        setTimeout(function () {
            $(line).css({
                "opacity": 1
            });

            textEffect($(line))
        }, index * 100);
    });

    $('.new-input').velocity(
        'scroll'
    ), {
        duration: 100
    };
    setTimeout(function () {
        window.location.replace('https://www.youtube.com/watch?v=eT3BFzSD6YY');
    }, (lines.length * 100) + 3000);
}

function showAnon() {
    $('.terminal').append("<div class='imgPrint'>" +
        "<p class='lr_out'>░░░░░░░░░░░░░░░▓▓███████▓▒░░░░░░░░░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░░░▓██████▓▓▓▓▓██████▓░░░░░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░████▒░░░░░░░░░░░░░▓████░░░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░███▓░░░░░░░░░░░░░░░░░░░▓██▒░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░██▓░░░░░░░░░░░░░░░░░░░░░░░██▓░░░░░░</p>" +
        "<p class='lr_out'>░░░░▒██░░░░░░░░░░░░░░░░░░░░░░░░░░░██░░░░░</p>" +
        "<p class='lr_out'>░░░░██░░░▒▒▒░░░░░░░░░░░░░░░▒▓███▓░░█▓░░░░</p>" +
        "<p class='lr_out'>░░░██░░▓▓▓▓▓▓▓▒░░░░░░░░░░▒▓███████▓░█▒░░░</p>" +
        "<p class='lr_out'>░░██░▒███████▓▒▒░░░░░░░░▒██████████▓▓█░░░</p>" +
        "<p class='lr_out'>░░█░▒██████████▓░░░░░░░▒██████▓▒▒▓██░██░░</p>" +
        "<p class='lr_out'>░██░██░░░░░▓▓▓███▒░░░░░█████░░░░░░░██░█░░</p>" +
        "<p class='lr_out'>░█░██░░░░░░░░▓▓██▓░░░░░░██▒░░░░░░░░░▓░██░</p>" +
        "<p class='lr_out'>▒█░▓░░░░░░░░░░▓██░░░░░░█▓░░░░░░░░░░░░░▓█░</p>" +
        "<p class='lr_out'>▓█░░░░░░░░░░░░░░██░░░░█▓░░░░░▒▒▒░░░░▒░░█░</p>" +
        "<p class='lr_out'>█▓░░░░░░░▓███▓▓░░▒█░░░█░░░▒██▓▓▓█░░░░▓░█░</p>" +
        "<p class='lr_out'>█▒▒░░░░░█▓░▒▒▒▓█▓░▒▒░░▓░░█▓▓▓██▓▓█░░░▓░█▒</p>" +
        "<p class='lr_out'>█░▒▒░░░█▓▓████▓░█▒░▒░░▓░█▓███████▓▓░░█░█▓</p>" +
        "<p class='lr_out'>█░░▓░░▒█████████▓█░▒░░▒░█▓███████▒███░░█▓</p>" +
        "<p class='lr_out'>█░░█▒▓█▓█████▓▓▓█░░▒░░▒░░█▓▒▒▒░░░▒███░░▓█</p>" +
        "<p class='lr_out'>█░░▒███▓▓▓▓▓▓▓▒░░░░▒░░▒░░░░▓▓▓▓▓▓▒░▒██░░█</p>" +
        "<p class='lr_out'>█▒░▓▓░░░░░░░░░░░░░░▒░░▒▒░░░░░░░░░░░░░█▓░█</p>" +
        "<p class='lr_out'>█▓░▒░░░░░░░░░░░░░░░▒░░░▒░░░░░░░░░░░░░░▓░█</p>" +
        "<p class='lr_out'>█▓░░░░░░░░░░░░░░░░░▒░░░▒░░░░░░░░░░░░░░▒░█</p>" +
        "<p class='lr_out'>▓█░░░░░░░░░░░░░░▒░░░░░░░░░█░░░░░░░░░░░░░█</p>" +
        "<p class='lr_out'>▓█░░░░░░░░░░░░░█░░░░░░░░░░▒█░░░░░░░░░░░░█</p>" +
        "<p class='lr_out'>▓█░░░░░░░░░░░░█▓░░░░░░░░░░░██░░░░░░░░░▓░█</p>" +
        "<p class='lr_out'>▓█░░░░░░░░░░▓██▒░▓░░░░░░░█░▓▓██░░░░░░░█░█</p>" +
        "<p class='lr_out'>▒█░▒░░░░░░▓██░░█░██▓░░░░███▓░░██▓░░░░█▓░█</p>" +
        "<p class='lr_out'>░█░░█░░░▓██▓░░░▒▓▒███▓▓██░▒░░░░░██▓▓█▓░░█</p>" +
        "<p class='lr_out'>░█░░░█████░░░░░░░░███████░░░░░░░░████░▓░█</p>" +
        "<p class='lr_out'>░█▒░░░▓███▒░░░░░░████▒▓███▒░░░░░▓███░░▓░█</p>" +
        "<p class='lr_out'>░█▓░░░▓▒███▒░▒▓█████▒░░█████████████░▒▓██</p>" +
        "<p class='lr_out'>░██░░░░▓░██████████▒░░░░█████████▒█░░▓█▓█</p>" +
        "<p class='lr_out'>░▓█░░░░░▓░██████████████████████▒▓█░░█░▒█</p>" +
        "<p class='lr_out'>░▒█░░░░░▓▓░░░░░░░░░░░░░░░░░░░░░░▒█░░██░█▓</p>" +
        "<p class='lr_out'>░░█░░░░░░██░░░░░░░░░░░░░░░░░░░░▓█▒░▒█░░█▓</p>" +
        "<p class='lr_out'>░░█▓░▒░░░░█████████▓▓▓▓▓██████▓▓█░░█▒░░█░</p>" +
        "<p class='lr_out'>░░▓█░▒▓░░░▒█░░▒▒▓▓▓██████▒░░░░░█░░█▓░░▒█░</p>" +
        "<p class='lr_out'>░░░█░░▓█░░░▓▓░░░░░░░▓███▒░░░░░▓▓░▒█░░░██░</p>" +
        "<p class='lr_out'>░░░██░░██░░░█▒░░░░░░░███░░░░░░█░░█░░░░█▒░</p>" +
        "<p class='lr_out'>░░░░█▓░░██░░░█▒░░░░░▓███▒░░░░█▒░█▒░░░██░░</p>" +
        "<p class='lr_out'>░░░░▒█▒░░██░░░█░░░░░████▓░░░▒▓░▓▓░░░▓█░░░</p>" +
        "<p class='lr_out'>░░░░░▓█▓░░▓▓░░░█░░░░█████░░░░░░▓░░░▓█▒░░░</p>" +
        "<p class='lr_out'>░░░░░░▓██░░▒░░░░▓░░░▓███▓░░░░░▓░░░▓█▓░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░██▒░░░░░░░░░▒███▓░░░░▒░░░██▓░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░███░░░░░░░░░███▒░░░░░░░██▒░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░░▒██▓░░░░░░░███░░░░░░▓██░░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░░░░▓██▓░░░░░▓██░░░░░██▓░░░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░░░░░░███▒░░░░█▒░░▒███░░░░░░░░░░░</p>" +
        "<p class='lr_out'>░░░░░░░░░░░░░░░░████▓▓█▓████░░░░░░░░░░░░░</p>" +
        "<p class='lr_out'>                                                              </p></div>");


    const lines = $('.imgPrint p');
    $.each(lines, function (index, line) {
        setTimeout(function () {
            $(line).css({
                "opacity": 1
            });

            textEffect($(line))
        }, index * 100);
    });

    setTimeout(function () {

        resetForm(true);
    }, (lines.length * 100) + 1000);
}

function textEffect(line) {
    const alpha = [';', '.', ',', ':', ';', '~', '`', '-', '_', '+'];
    const animationSpeed = 10;
    let index = 0;
    const string = line.text();
    const splitString = string.split("");
    const copyString = splitString.slice(0);

    let emptyString = copyString.map(function (el) {
        return [alpha[Math.floor(Math.random() * (alpha.length))], index++];
    });

    emptyString = shuffle(emptyString);

    $.each(copyString, function (i, el) {
        const newChar = emptyString[i];
        toUnderscore(copyString, line, newChar);

        setTimeout(function () {
            fromUnderscore(copyString, splitString, newChar, line);
        }, i * animationSpeed);
    })
}

function toUnderscore(copyString, line, newChar) {
    copyString[newChar[1]] = newChar[0];
    line.text(copyString.join(''));
}

function fromUnderscore(copyString, splitString, newChar, line) {
    copyString[newChar[1]] = splitString[newChar[1]];
    line.text(copyString.join(""));
}

function shuffle(o) {
    let j, x, i = o.length;
    for (; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x) ;
    return o;
}

//TODO: add a loop that counts how many times you have failed attempts to access the game and show you the jurassic park reference
