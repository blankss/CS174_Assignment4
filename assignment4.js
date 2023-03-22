function validateInput() {
    const inputArrayValue = [];
    inputArrayValue.push(document.forms["inputs"]["valueOne"].value);
    inputArrayValue.push(document.forms["inputs"]["valueTwo"].value);
    inputArrayValue.push(document.forms["inputs"]["valueThree"].value);
    inputArrayValue.push(document.forms["inputs"]["valueFour"].value);

    const inputArrayLabel = [];
    inputArrayLabel.push(document.forms["inputs"]["labelOne"].value);
    inputArrayLabel.push(document.forms["inputs"]["labelTwo"].value);
    inputArrayLabel.push(document.forms["inputs"]["labelThree"].value);
    inputArrayLabel.push(document.forms["inputs"]["labelFour"].value);

    const errorsValues = [];
    const errorsLabels = [];
    let position;
    
    for (let i = 0; i < inputArrayValue.length; i ++) {
        position = i + 1;
        if (isNaN(inputArrayValue[i]) || inputArrayValue[i]==="" || inputArrayValue[i]===null || inputArrayValue[i]===" ") {
            errorsValues.push(position);
        }
    }

    position = 0;
    for (let j = 0; j < inputArrayLabel.length; j ++) {
        position = j + 1;
        if (inputArrayLabel[j]==="" || inputArrayLabel[j]===null || inputArrayLabel===" ") {
            errorsLabels.push(position);
        }
    }

    if (errorsValues.length == 0 && errorsLabel.length == 0) {
        return true;
    }

    let errorStr = "";
    for (let i = 0; i < errorsLabels.length; i ++) {
        errorStr += 'Please input something for Label ' + errorsLabels[i] + '.<br />';
    }
    errorStr += "<br />"
    for (let i = 0; i < errorsValues.length; i ++) {
        errorStr += 'Value for input ' + errorsValues[i] + ' is invalid.<br />';
    }
    document.getElementById("errorInputs").innerHTML = errorStr;
    return false;
    
}