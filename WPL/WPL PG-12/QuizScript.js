function checkAnswers() {
    const correctAnswers = {
        q1: 'B', 
        q2: 'C', 
        q3: 'C', 
        q4: 'C' 
    };
    
    let score = 0;
    const totalQuestions = Object.keys(correctAnswers).length;
    const form = document.getElementById('quizForm');
    const resultsDiv = document.getElementById('results');

    for (let i = 1; i <= totalQuestions; i++) {
        const questionName = 'q' + i;
        
        const selectedOption = form.elements[questionName].value; 
        
        if (selectedOption === correctAnswers[questionName]) {
            score++; 
        }
    } 
    resultsDiv.innerHTML = `
        <p>Quiz Completed!</p>
        <p>Your Score: ${score} out of ${totalQuestions}</p>
        <p>${(score / totalQuestions) * 100}% Correct</p>
    `;
}