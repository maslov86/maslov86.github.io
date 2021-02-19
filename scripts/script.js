/*************** Изменение формата даты Datepicker ***************/

$("#datepicker").datepicker({
  dateFormat: "dd.mm.yy"
});

const inputRanges = document.querySelectorAll('.inputRange');
const inputNumbers = document.querySelectorAll('.inputNumber');
const inputRadioNo = document.getElementById("no");
const inputRadioYes = document.getElementById("yes");

for(let i = 0; i < inputNumbers.length; i++) {
    dynamicRange(inputNumbers[i],inputRanges[i]);
}

window.onload = () => {
    setAvailability(true);
}

inputRadioNo.oninput = () =>{
    setAvailability(true);
}

inputRadioYes.oninput = () =>{
    setAvailability(false);
}

/* Функция для динамической работы ползунков вместе с полями input[type='number'] */

function dynamicRange(inputNumber, inputRange) {
    inputNumber.oninput = () =>{
        let valueRange = inputNumber.value;
        inputRange.value = valueRange;

        let percent = (valueRange*100)/inputRange.max;
        inputRange.style.background = "-webkit-linear-gradient(left, rgb(123,161,41) 0%, rgb(123,161,41)"+ percent +"%, black "+ percent +"%, black 100%)";
        
        if(inputNumber.value < 1000) {
           inputNumber.value = 1000;
           } else if (inputNumber.value > 3000000) {
               inputNumber.value = 3000000;
           }
    }
    
    inputRange.oninput = () =>{
        let valueNumber = inputRange.value;
        inputNumber.value = valueNumber;
        
        let percent = (valueNumber*100)/inputRange.max;
        inputRange.style.background = "-webkit-linear-gradient(left, rgb(123,161,41) 0%, rgb(123,161,41)"+ percent +"%, black "+ percent +"%, black 100%)";
    }
}

/******** Блокировка/разблокировка полей при выборе radio кнопкок ********/

function setAvailability(boolValue) {
    document.getElementById("deposit_replenishment_sum").disabled = boolValue;
    document.getElementById("deposit_replenishment_sum_range").disabled = boolValue;
}

/******************************* AJAX *******************************/

$(document).ready(function() {
    
    $('#calcForm').submit(function(event) {
        
        event.preventDefault();
        
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                document.getElementById('response').textContent = result;
            }
        });
    });
});