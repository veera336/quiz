const questions = [
    {
        question: "What will be the output of the following code?int Integer = 24;char String=‘I’;System.out.print(Integer);System.out.print(String);",
        answer: [
            { text:"Compile Error", correct: false},
            { text:"Throws Exception", correct: false},
            { text:"I", correct: false},
            { text:"24 I", correct: true},
        ]
    },
    {
        question: "Select the Valid Statement",
       answer: [
           { text:"char[] ch = new char(5)", correct: false},
           { text:"char[] ch = new char[5]", correct: true},
           { text:"char[] ch = new char()", correct: false},
           { text:"char[] ch = new char[]", correct: false},
       ] 
    },
    {
        question: "when an array is passed to a method, what does the method receive?",
       answer: [
           { text:"the reference of the array", correct: true},
           { text:"a copy of the array", correct: false},
           { text:"length of an array", correct: false},
           { text:"copy of the first elements", correct: false},
       ] 
    },
    {
        question: "Which of the following is not a Java features?",
       answer: [
           { text:"Dynamic", correct: false},
           { text:"Architecture Neutral", correct: false},
           { text:"Use of pointers", correct: true},
           { text:"Object-oriented", correct: false},
       ] 
    },
    {
        question: "_____ is used to find and fix bugs in the Java programs.",
       answer: [
           { text:"Dynamic", correct: false},
           { text:"JRE", correct: false},
           { text:"JDK", correct: false},
           { text:"JDB", correct: true},
       ] 
    },
    {
        question: " Who invented Java Programming?",
       answer: [
           { text:"Guido van Rossum", correct: false},
           { text:"James Gosling", correct: true},
           { text:"Dennis Ritchie", correct: false},
           { text:"Bjarne Stroustrup", correct: false},
       ] 
    },
    {
        question: " Which statement is true about Java?",
       answer: [
           { text:"Java is a sequence-dependent programming language", correct: false},
           { text:"Java is a code dependent programming language", correct: false},
           { text:"Java is a platform-dependent programming language", correct: false},
           { text:"Java is a platform-independent programming language", correct: true},
       ] 
    },
    {
        question: " Which one of the following is not a Java feature?",
       answer: [
           { text:"Object-oriented", correct: false},
           { text:"Use of pointers", correct: true},
           { text:"Portable", correct: false},
           { text:"Dynamic and Extensible", correct: false},
       ] 
    },
    {
        question: " Which of these cannot be used for a variable name in Java?",
       answer: [
           { text:"identifier & keyword", correct: false},
           { text:"identifier", correct: false},
           { text:"keyword", correct: true},
           { text:"none of the mentioned", correct: false},
       ] 
    },
    {
        question: " What is the extension of java code files?",
       answer: [
           { text:".js", correct: false},
           { text:".txt", correct: false},
           { text:".class", correct: false},
           { text:".java", correct: true},
       ] 
    },
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
    fetch('asubmit-scoreexp2.php', {
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
