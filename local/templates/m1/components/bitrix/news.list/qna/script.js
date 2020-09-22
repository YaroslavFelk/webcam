$(document).ready(function(){
    //раскрытие ответов на вопросы в соотв. блоке
    const questionBlock = $('.qna__question-block');
    console.log(questionBlock)
    questionBlock.each(function() {
        let questionToggle = $(this).children('.qna__question-toggle');

        questionToggle.on('click', function() {
            $(this).parent().toggleClass('qna__question-block--open');
            $(this).next('p').slideToggle(500);
        });
    })
})