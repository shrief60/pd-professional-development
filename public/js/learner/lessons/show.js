$(window).blur(() => {
    player.pause();
});
const getLessonQuestions = url => {

    return new Promise((resolve) => {
        axios.get(url)
            .then(response => resolve(response.data.questions))
    });
}

const handleQuestions = questions => {
    let questionsStatus = questions.map(question => {
        return {
            id: question.id,
            correct: false
        }
    });

    let $questionModal = $('#question-modal');
    $questionModal.modal({
        backdrop: 'static',
        keyboard: false,
        'show': false
    });

    setInterval(() => {

        if (!player.playing) return;

        let currentTime = Math.round(player.currentTime);

        let question = questions.find(question => question.lesson_time == currentTime);

        if (!question) return;

        let questionStatus = questionsStatus.find(status => status.id == question.id);

        if (questionStatus.correct) return;

        player.pause();

        player.fullscreen.exit();

        let template = `<h3 class="question"> ${question.body} </h3>`;
        if (question.type == 'mcq') {
            question.answers.forEach(answer => {
                template += `
                <button class="btn answer-btn" question="${question.id}" answer="${answer.id}">
                    ${answer.body}
                </button>`;
            });

        } else if (question.type == 'text') {
            template += `
            <input class="form-control" />
            <button class="btn answer-text" question="${question.id}">
                Add Answer
            </button>
        `
        }

        $questionModal.find('.modal-body').html(template);

        $questionModal.modal('show');

    }, 1000);

    $(document).on('click', '.answer-btn', function () {

        let $this = $(this);
        let questionId = parseInt($this.attr('question'));
        let answerId = parseInt($this.attr('answer'));
        let question = questions.find(question => question.id == questionId);
        let index = questionsStatus.findIndex(status => status.id == question.id);
        let status = {
            id: question.id,
            correct: true,
        };
        axios.post(`/${questionId}/${answerId}`)

            .then(response => {
                let result = response.data.result;
                $questionModal.modal('hide');
                if (result) {
                    swal({
                        title: 'Correct answer!',
                        text: `Correct answer, you earned ${question.grade} points`,
                        type: 'success',
                        confirmButtonText: 'Great!'
                    }).then((result) => {
                        if (result.value) {
                            player.fullscreen.enter();
                            player.play();
                        }
                    });
                } else {
                    Swal({
                        title: 'Wrong answer!',
                        text: "Your answer is wrong",
                        type: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Return to the backward point!'
                    }).then((result) => {
                        if (result.value) {
                            player.currentTime = question.lesson_backward_time;
                            status.correct = false;
                        }
                        player.fullscreen.enter();
                        player.play();
                    });
                }
                questionsStatus[index] = status;
            });
    });

    $(document).on('click', '.answer-text', function () {

        let $this = $(this);
        let questionId = $this.attr('question');
        let answer = $this.prev('input').val();
        let question = questions.find(question => question.id == questionId);
        axios.post(`/${question.id}/answers`, {
                answer
            })
            .then(() => {
                $questionModal.modal('hide');
                let index = questionsStatus.findIndex(status => status.id == question.id);
                let status = {
                    id: question.id,
                    showed: true,
                };
                questionsStatus[index] = status;
                swal({
                    title: 'Answer added!',
                    text: `We will revise your answer to check if it's correct or not.`,
                    type: 'success',
                    confirmButtonText: 'Great!'
                }).then((result) => {
                    if (result.value) {
                        player.play();
                    }
                });

            });
    });

}

if (typeof questionsURL !== 'undefined') {
    getLessonQuestions(questionsURL)
        .then(questions => handleQuestions(questions))
}


const player = new Plyr('#player');

$(document).on('click', '.unit-toggler', function () {

    let $this = $(this);

    let $unitLessons = $this.parent('.unit-details').next('.unit-lessons');

    let showed = $unitLessons.hasClass('show');

    if (showed) {
        hideUnitLesson($unitLessons);
    } else {

        let $currentUnitLessons = $('.unit-lessons.show');

        if ($currentUnitLessons.length) {
            hideUnitLesson($currentUnitLessons)
                .then(() => showUnitLesson($unitLessons));
        } else {
            showUnitLesson($unitLessons);
        }
    }
});

const showUnitLesson = $unitLessons => {
    return new Promise((resolve) => {
        $unitLessons.slideDown('slow', function () {
            $(this).addClass('show');
            let $img = $(this).siblings('.unit-details').find('img');
            let src = $img.attr('src');
            $img.fadeOut('', function () {
                $(this).attr('src', src.replace('down', 'up')).fadeIn('', () => resolve());
            });
        });
    });
}

const hideUnitLesson = $unitLessons => {
    return new Promise((resolve) => {
        $unitLessons.slideUp('slow', function () {
            $(this).removeClass('show');
            let $img = $(this).siblings('.unit-details').find('img');
            let src = $img.attr('src');
            $img.fadeOut('', function () {
                $(this).attr('src', src.replace('up', 'down')).fadeIn('', () => resolve());
            });
        });
    });
}
