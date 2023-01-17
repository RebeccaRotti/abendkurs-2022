// - Selektoren
$('p').html("hier <strong>steht ein</strong> Absatz");
$('.headline')[0].innerText = "überschrift";
console.log($('p'));
$('#paragraph').text('Hier<strong> steht </strong>mein Text');

let red = $('.red');
for (let i = 0; i < red.length; i++) {
    red[i].style.color = 'red';
}
$('.red').text('Diese Absätze sind Rot');

// - Manipulation
$('input[name=userInput]').val('hier steht dein Text');

$('.first').append(' *Am Ende eingefügter Text*');
$('.second').prepend('*zu Beginn eingefügter Text* ');

// - Events
function mouseoutExample() {
    alert('Mouseout');
}
function mousedownExample() {
    alert('Mousedown');
}
/*$('#paragraph').on({
    mouseout: mouseoutExample,
    mousedown: mousedownExample
});*/

// - Spezielle Effekte
function hide() {
    $('#rectangle').hide();
}
function show() {
    $('#rectangle').show();
}
function toggle(){
    $('#rectangle').toggle();
}
$('.toggle').click(toggle);

$('.fadeToggle').click(function () {
   $('#rectangle').fadeToggle("slow", function () {
       $('#output').text('FadeToggle effect is finish');
       outputToggle();
   });
});
function outputToggle() {
    $('#output').show();
    setTimeout(function(){
        $('#output').hide();
    }, 2000);
}

$('.animate').click(function () {
    $('#rectangle').animate({
        width: '500px',
        height: '50px',
        // backgroundColor: 'red' // works only with jQuery UI
    }, 3000);
});




