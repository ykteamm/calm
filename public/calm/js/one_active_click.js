// var question = document.getElementsByClassName('card_active');
//
// for (var i = 0; i < question.length; i++) {
//     question[i].addEventListener('click', function() {
//         // Barcha elementlardan 'active_add' sınıfini olib tashlash
//         for (var j = 0; j < question.length; j++) {
//             if (question[j] !== this) {
//                 question[j].classList.remove('active_add_card');
//             }
//         }
//
//         // 'active_add' sınıfini qo'shish yoki o'chirish
//         if (this.classList.contains('active_add_card')) {
//             this.classList.remove('active_add_card');
//         } else {
//             this.classList.add('active_add_card');
//         }
//     });
// }

document.addEventListener('DOMContentLoaded', function () {
    var cards = document.getElementsByClassName('card_active');

    var submit  = document.getElementById('question');

    for (var i = 0; i < cards.length; i++) {
        cards[i].addEventListener('click', function () {
            // Remove 'active_add_card' class and set input's checked to false for all elements
            for (var j = 0; j < cards.length; j++) {
                if (cards[j] !== this) {
                    cards[j].classList.remove('active_add_card');
                    var checkbox = cards[j].querySelector('input[type="checkbox"]');
                    if (checkbox) {
                        checkbox.checked = false;
                    }
                }
            }

            // Toggle 'active_add_card' class and set input's checked accordingly
            if (this.classList.contains('active_add_card')) {
                this.classList.remove('active_add_card');
                submit.classList.add('d-none')
                var thisCheckbox = this.querySelector('input[type="checkbox"]');
                if (thisCheckbox) {
                    thisCheckbox.checked = false;
                }
            } else {
                submit.classList.remove('d-none')
                this.classList.add('active_add_card');
                var thisCheckbox = this.querySelector('input[type="checkbox"]');
                if (thisCheckbox) {
                    thisCheckbox.checked = true;
                }
            }
        });
    }
});

