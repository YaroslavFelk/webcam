$(document).ready(function(){
    //калькулятор
    const result = document.querySelector('.calculator__form-value');
    const basePrice = Number(result.textContent);

    function render() {
        let experience = document.querySelectorAll("input[name=CALC_1]:checked")[0]
            ? document.querySelectorAll("input[name=CALC_1]:checked")[0].value
            : 1;
        let language = document.querySelectorAll("input[name=CALC_2]:checked")[0]
            ? document.querySelectorAll("input[name=CALC_2]:checked")[0].value
            : 1;
        let hours = document.querySelectorAll("input[name=CALC_3]:checked")[0]
            ? document.querySelectorAll("input[name=CALC_3]:checked")[0].value
            : 1;
        result.innerHTML = basePrice * experience * language * hours
    }

    $('.calculator').click(function(e){
        e.stopPropagation()
        render()
    });
});