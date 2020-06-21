function addItem() {
    var inputs = document.getElementsByClassName("input-information");
    var categoryList = document.getElementById("category");
    var difficultyList = document.getElementById("difficulty");
    var question, rightAnswer, wrongAnswer, category, difficulty;
    question = inputs[0].value;
    rightAnswer = inputs[1].value;
    wrongAnswer = inputs[2].value;
    function getSelectedOption(sel) {
        var opt;
        for (var i = 0, len = sel.options.length; i < len; i++) {
            opt = sel.options[i];
            if (opt.selected === true) {
                break;
            }
        }
        return opt;
    }

    category = getSelectedOption(categoryList).value;
    difficulty = getSelectedOption(difficultyList).value;
    // console.log(question);
    // console.log(rightAnswer);
    // console.log(wrongAnswer);
    // console.log(category);
    // console.log(difficulty);

    var xmlhttp = new XMLHttpRequest;

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    }
    var v = {
        "question": question, "rightAnswer": rightAnswer, "wrongAnswer": wrongAnswer,
        "category": category, "difficulty": difficulty
    };
    xmlhttp.open("POST", 'addQuestion.php');
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(JSON.stringify(v));


}