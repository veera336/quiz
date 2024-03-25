const questions = [
    {
        question: "What is the next fraction in the series: 1/2, 2/4, 3/8, 4/16, ...?",
        answer: [
            { text: "5/32", correct: true },
            { text: "5/24", correct: false },
            { text: "6/32", correct: false },
            { text: "5/64", correct: false },
        ]
    },
    {
        question: "What is the sum of 1/2, 1/4, and 1/8?",
        answer: [
            { text: "7/8", correct: true },
            { text: "3/4", correct: false },
            { text: "1/2", correct: false },
            { text: "5/8", correct: false },
        ]
    },
    {
        question: "If you fold a paper in half 3 times, how many layers are there?",
        answer: [
            { text: "8", correct: true },
            { text: "6", correct: false },
            { text: "4", correct: false },
            { text: "7", correct: false },
        ]
    },
    {
        question: "What is the next number in the series: 3, 9, 27, 81, ...?",
        answer: [
            { text: "243", correct: true },
            { text: "162", correct: false },
            { text: "108", correct: false },
            { text: "324", correct: false },
        ]
    },
    {
        question: "Which word does NOT belong with the others?",
        answer: [
            { text: "novel", correct: false },
            { text: "poetry", correct: false },
            { text: "fiction", correct: false },
            { text: "dictionary", correct: true },
        ]
    },
    {
        question: "What is the next fraction in the series: 1/1, 1/2, 2/3, 3/5, 5/8, ...?",
        answer: [
            { text: "8/13", correct: true },
            { text: "5/13", correct: false },
            { text: "13/21", correct: false },
            { text: "8/21", correct: false },
        ]
    },
    {
        question: "What is half of a quarter of 400?",
        answer: [
            { text: "50", correct: true },
            { text: "100", correct: false },
            { text: "200", correct: false },
            { text: "25", correct: false },
        ]
    },
    {
        question: "If you are running a race and you pass the person in 2nd place, what place are you in?",
        answer: [
            { text: "2nd", correct: true },
            { text: "1st", correct: false },
            { text: "3rd", correct: false },
            { text: "None of the above", correct: false },
        ]
    },
    {
        question: "What does 'C' represent in Roman numerals?",
        answer: [
            { text: "100", correct: true },
            { text: "50", correct: false },
            { text: "500", correct: false },
            { text: "1000", correct: false },
        ]
    },
    {
        question: "Which of the following is NOT a prime number?",
        answer: [
            { text: "21", correct: true },
            { text: "13", correct: false },
            { text: "7", correct: false },
            { text: "2", correct: false },
        ]
    }
];

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");
const submitButton = document.getElementById("submit-btn");
const playAgainButton = document.getElementById("playagain-btn");

let currentQuestionIndex = 0;
let score = 0;

function startQuiz(){
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Next";
    submitButton.style.display = "none"; // Hide the Submit button
    playAgainButton.style.display = "none"; // Hide the Play Again button
    showQuestion();
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question; // Remove the extra period after currentQuestion.question

    currentQuestion.answer.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButtons.appendChild(button);
        if (answer.correct) {
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click", selectAnswer);
    });
}



function resetState(){
    nextButton.style.display = "none";
    while(answerButtons.firstChild){
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e){
    const selectedBtn = e.target;
    const iscorrect = selectedBtn.dataset.correct === "true";
    if(iscorrect){
        selectedBtn.classList.add("correct");
        score++;
    }else{
        selectedBtn.classList.add("incorrect");
    }
    Array.from(answerButtons.children).forEach(button => {
        if(button.dataset.correct === "true"){
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    nextButton.style.display = "block";
}

function showScore() {
    resetState();
    questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`; // Corrected template literal
    nextButton.style.display = "none"; // Hide the Next button
    submitButton.style.display = "block"; // Show the Submit button
    playAgainButton.style.display = "block"; // Show the Play Again button
}


function   handelNextButton(){
    currentQuestionIndex++;
    if(currentQuestionIndex < questions.length){
        showQuestion();
    }else{
        showScore();
    }
}


nextButton.addEventListener("click", ()=>{
    if(currentQuestionIndex < questions.length){
        handelNextButton();
    }else{
        startQuiz()
    }
});
submitButton.addEventListener("click", () => {
    // Handle the submission of the score here
    // You can use AJAX or fetch to send the score to your server
    // For now, let's just display a message
    alert(`Score submitted: ${score}`);
});

submitButton.addEventListener("click", () => {
    // Send the score to the PHP script
    fetch('fsubmit-score.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `score=${score}`,
    })
    .then(response => {
        if (response.ok) {
            // Score submitted successfully
            alert(`Score submitted: ${score}`);
        } else {
            // Handle error
            console.error('Error submitting score');
        }
    })
    .catch(error => {
        console.error('Network error:', error);
    });
});

playAgainButton.addEventListener("click", () => {
    // Restart the quiz
    startQuiz();
});

startQuiz();
