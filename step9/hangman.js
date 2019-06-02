function randomWord() {
    var words = ["moon","home","mega","blue","send","frog","book","hair","late",
        "club","bold","lion","sand","pong","army","baby","baby","bank","bird","bomb","book",
        "boss","bowl","cave","desk","drum","dung","ears","eyes","film","fire","foot","fork",
        "game","gate","girl","hose","junk","maze","meat","milk","mist","nail","navy","ring",
        "rock","roof","room","rope","salt","ship","shop","star","worm","zone","cloud",
        "water","chair","cords","final","uncle","tight","hydro","evily","gamer","juice",
        "table","media","world","magic","crust","toast","adult","album","apple",
        "bible","bible","brain","chair","chief","child","clock","clown","comet","cycle",
        "dress","drill","drink","earth","fruit","horse","knife","mouth","onion","pants",
        "plane","radar","rifle","robot","shoes","slave","snail","solid","spice","spoon",
        "sword","table","teeth","tiger","torch","train","water","woman","money","zebra",
        "pencil","school","hammer","window","banana","softly","bottle","tomato","prison",
        "loudly","guitar","soccer","racket","flying","smooth","purple","hunter","forest",
        "banana","bottle","bridge","button","carpet","carrot","chisel","church","church",
        "circle","circus","circus","coffee","eraser","family","finger","flower","fungus",
        "garden","gloves","grapes","guitar","hammer","insect","liquid","magnet","meteor",
        "needle","pebble","pepper","pillow","planet","pocket","potato","prison","record",
        "rocket","saddle","school","shower","sphere","spiral","square","toilet","tongue",
        "tunnel","vacuum","weapon","window","sausage","blubber","network","walking","musical",
        "penguin","teacher","website","awesome","attatch","zooming","falling","moniter",
        "captain","bonding","shaving","desktop","flipper","monster","comment","element",
        "airport","balloon","bathtub","compass","crystal","diamond","feather","freeway",
        "highway","kitchen","library","monster","perfume","printer","pyramid","rainbow",
        "stomach","torpedo","vampire","vulture"];

    return words[Math.floor(Math.random() * words.length)];
}

// function hangman() {
//
//     var word=randomWord();
//     console.log(word);
//     var hiddingword="";
//     for (var i=1;i<word.length;i++){
//      hiddingword+="_ ";
//     }
//     hiddingword+="_";
//
//
//     document.getElementById("guess").onclick=function (event) {
//         event.preventDefault();
//         var letter = document.getElementById("letter").value;
//                 if (letter.length === 1 && isalpha(letter)) {
//                     document.getElementById("alert").innerHTML = "";
//                     if(word.indexOf(letter)!==-1){
//                         for (i=0;i<word.length;i++){
//                             if(word.charAt(i)===letter){
//                                 hiddingword=hiddingword.substr(0,i*2)+letter+hiddingword.substr(i*2+1);
//                             }
//                         }
//                         if(hiddingword.indexOf("_")===-1){
//                             document.getElementById("alert").innerHTML = "You Win!";
//                         }
//                     }
//                     else{
//                         var pic=document.getElementById("images").src
//                         var new_pic=getpic(pic);
//                         document.getElementById("images").src=new_pic;
//                         if (new_pic==="images/hm6.png") {
//                             document.getElementById("alert").innerHTML = "You guessed poorly!";
//
//                         }
//
//
//                     }
//
//                 }
//                 else {
//                     document.getElementById("alert").innerHTML = "You must enter a letter!";
//                 }
//         document.getElementById("guessingword").innerHTML=hiddingword;
//         document.getElementById("letter").value="";
//             }
//     document.getElementById("guessingword").innerHTML=hiddingword;
//
//
// }

function isalpha(c) {
    return (((c >= 'a') && (c <= 'z')) || ((c >= 'A') && (c <= 'Z')));
}

function getpic(previous) {
    if (previous.indexOf("images/hm0.png")!==-1){
        return "images/hm1.png"
    }
    if (previous.indexOf("images/hm1.png")!==-1){
        return "images/hm2.png"
    }
    if (previous.indexOf("images/hm2.png")!==-1){
        return "images/hm3.png"
    }
    if (previous.indexOf("images/hm3.png")!==-1){
        return "images/hm4.png"
    }
    if (previous.indexOf("images/hm4.png")!==-1){
        return "images/hm5.png"
    }
    if (previous.indexOf("images/hm5.png")!==-1){
        return "images/hm6.png"
    }

}


function hangman(){
    // Pick a random word
    var word = randomWord();
    console.log(word);

    // Make a "guess" string with underbars
    // where each letter will go. We will fill
    // this in with letters as we find them.
    var guess = '';
    for(var i=0; i<word.length;  i++) {
        guess += '_';
    }

    // The HTML for the page
    var html = '<p id="image"><img id="images" width="125" height="300" src="images/hm0.png"></p>';
    var img = 0;




    html += '<p id="guess"></p>';
    html += '<form>';
    html += '<input type="hidden" id="word" value="' + word + '">';
    html += '<p><label for="letter">Letter: </label><input type="text" id="letter"></p>';
    html += '<p><input type="submit" id="try" value="Guess!"> <input type="submit" id="new" value="New Game"> </p>';
    html += '<p id="message">&nbsp;</p>';
    html += '</form>';

    document.getElementById("play-area").innerHTML = html;

    setGuess(guess);

    document.getElementById("try").onclick = function(event) {
        event.preventDefault();
        var letter = document.getElementById("letter").value;
        if (letter.length === 1 && isalpha(letter)) {
            document.getElementById("message").innerHTML = "";
            if (word.indexOf(letter) !== -1) {
                for (i = 0; i < word.length; i++) {
                    if (word.charAt(i) === letter) {
                        guess = guess.substr(0, i) + letter + guess.substr(i + 1);
                    }
                }
                if (guess.indexOf("_") === -1) {
                    document.getElementById("message").innerHTML = "You Win!";
                }
            }
            else{
                var pic=document.getElementById("images").src;
                var new_pic=getpic(pic);
                document.getElementById("images").src=new_pic;
                if (new_pic==="images/hm6.png") {
                    setGuess(word);
                    document.getElementById("message").innerHTML = "You guessed poorly!";
                    return;

                }


            }
        }
        else {
            document.getElementById("message").innerHTML = "You must enter a letter!";
        }

        setGuess(guess);
        document.getElementById("letter").value="";
    }
    document.getElementById("new").onclick = function(event){
        event.preventDefault();
        hangman(event);

    }
    setGuess(guess);
}

// Set the guess in the from
function setGuess(guess) {
    var g = '';
    for(var i=0; i<guess.length; i++) {
        g += guess.charAt(i) + ' ';
    }

    document.getElementById("guess").innerHTML = g;
}
