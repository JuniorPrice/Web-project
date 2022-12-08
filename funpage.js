window.addEventListener('DOMContentLoaded', () => {                         //to execute the game code once the page loded
    const tiles = Array.from(document.querySelectorAll('.tile'));           //create arrays to holde expectid conditions 
    const playerDisplay = document.querySelector('.display-player');
    const resetButton = document.querySelector('#reset');
    const announcer = document.querySelector('.announcer');                 //hold elemetn  that display the result

    let board = ['', '', '', '', '', '', '', '', ''];                       //store the 9 boxs
    let currentPlayer = 'X';                                                //to control current player 
    let isGameActive = true;                                         

    const PLAYERX_WON = 'PLAYERX_WON';                                      //hold expectid results
    const PLAYERO_WON = 'PLAYERO_WON';
    const TIE = 'TIE';


    /*
        Indexes within the board
        [0] [1] [2]
        [3] [4] [5]
        [6] [7] [8]
    */

    const winningConditions = [                                             //to control and help to decide winning
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6]
    ];

    function handleResultValidation() {                                     //function to decide if the player win 
        let roundWon = false;                                               //hold boolean if win
        for (let i = 0; i <= 7; i++) {                                      //if statment to check if win or not
            const winCondition = winningConditions[i];
            const a = board[winCondition[0]];
            const b = board[winCondition[1]];
            const c = board[winCondition[2]];
            if (a === '' || b === '' || c === '') {
                continue;
            }
            if (a === b && b === c) {
                roundWon = true;                                            //player win
                break;
            }
        }

    if (roundWon) {                                                        //activ if win
            announce(currentPlayer === 'X' ? PLAYERX_WON : PLAYERO_WON); 
            isGameActive = false;                                          //end of the game 
            return;
        }

    if (!board.includes(''))                                               //in case there is no winner
        announce(TIE);
    }

    const announce = (type) => {                                           //to display the result of the game        
        switch(type){
            case PLAYERO_WON:                                              //player O win
                announcer.innerHTML = 'Player <span class="playerO">O</span> Won';
                break;
            case PLAYERX_WON:                                              //player X win
                announcer.innerHTML = 'Player <span class="playerX">X</span> Won';
                break;
            case TIE:
                announcer.innerText = 'Tie';
        }
        announcer.classList.remove('hide');
    };

    const isValidAction = (tile) => {                                      //return if the box has been selected or not
        if (tile.innerText === 'X' || tile.innerText === 'O'){
            return false;
        }

        return true;
    };

    const updateBoard =  (index) => {
        board[index] = currentPlayer;
    }

    const changePlayer = () => {                                           //chenge the player
        playerDisplay.classList.remove(`player${currentPlayer}`);
        currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
        playerDisplay.innerText = currentPlayer;                     
        playerDisplay.classList.add(`player${currentPlayer}`);
    }

    const userAction = (tile, index) => {                                  //react with user actions
        if(isValidAction(tile) && isGameActive) {                          //chech if the the game still running and the box is valid to select
            tile.innerText = currentPlayer;                                //book the box for user's action
            tile.classList.add(`player${currentPlayer}`);
            updateBoard(index);                                            //stor the player how select this box
            handleResultValidation();                                      //decide if there is a winner 
            changePlayer();                                                //change the player 
        }
    }
    
    const resetBoard = () => {                                             //react with reset button to clear the board
        board = ['', '', '', '', '', '', '', '', ''];                      //clear the array that hold user selections
        isGameActive = true;                                               //set the game condition as ready to play
        announcer.classList.add('hide');

        if (currentPlayer === 'O') {                                       //set player X to start the game 
            changePlayer();
        }

        tiles.forEach(tile => {                                            //clear boxs
            tile.innerText = '';
            tile.classList.remove('playerX');
            tile.classList.remove('playerO');
        });
    }

    tiles.forEach( (tile, index) => {                                     //react with user clicks to call userAction() function
        tile.addEventListener('click', () => userAction(tile, index));
    });

    resetButton.addEventListener('click', resetBoard);                    //set button to call resetBoard() function
});