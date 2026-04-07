let playerScore = 0;
let komputerScore = 0;

function playerChoice(player) {
    document.getElementById('choice-container').style.display = 'none';
    document.getElementById('countdown').innerText = '3';

    let countdown = 3;
    const countdownInterval = setInterval(() => {
        countdown--; 
        if (countdown > 0) {
            document.getElementById('countdown'). innerText = countdown;
        } else {
            clearInterval(countdownInterval);
            document.getElementById('countdown').innerText = '';
            showResult(player);
        }
    }, 1000)
    
}

function showResult(player) {
    const choices = ['gunting' , 'batu' , 'kertas'];
    const computer = choices[Math.floor(Math.random() * 3)];
    
    document.getElementById('result-container').style.display = 'block';
    document.getElementById('player-img').src = player + '.jpeg';
    document.getElementById('computer-img').src = computer + '.jpeg';

    let result = '';
    if (player === computer) {
        result = 'Seri!';
    } else if(
        (player === 'gunting' && computer === 'kertas') ||
        (player === 'batu' && computer === 'gunting') ||
        (player === 'kertas' && computer === 'batu')
    ) {
        result = 'Kamu Menang!';
        playerScore++;
    } else  {
        result = 'Kamu kalah!';
        komputerScore++;
    }

    document.getElementById('game-result').innerText = result;
    document.getElementById('player-score').innerText = playerScore;
    document.getElementById('computer-score').innerText = komputerScore;
}

function resetGame() {
    document.getElementById('choice-container').style.display = 'block';
    document.getElementById('result-container').style.display = 'none';
}